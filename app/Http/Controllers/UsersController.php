<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CrmUser;
use App\Positions;
use App\UserPositions;
use App\Department;
use App\PermissionPositions;
use App\Permissions;
use App\TaskAssign;
use App\TaskPositions;

use Exception;

class UsersController extends Controller
{
    public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$users = CrmUser::all();
    	return view('users.index' ,compact('users'));
    }

    public function addGet() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$positions = Positions::all();
        $departements = Department::all();
    	return view('users.add' ,compact('positions' ,'departements'));
    }

    public function addPost() {
    	$this->validate(request() ,[
    		'email' => 'unique:crm_users'
    	]);
    	$data = request()->all();
    	$data['http_cred'] = request()->header('User-Agent');
    	$data['ip_address'] = request()->ip();
    	$data['added_by'] = auth()->user()->id;
    	$user = CrmUser::create($data);
    	if (request()->has('positions')) {
    		foreach(request('positions') as $pos) {
    			UserPositions::create(['position_id' => $pos, 'user_id' => $user->id]);
    		}
    	}
    	return redirect('users')->with('status' ,'User Created Successfully!');
    }

    public function editGet($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	try {
    		$user = CrmUser::findOrFail($id);
    		$positions = Positions::all();
            $departements = Department::all();
    		return view('users.edit' ,compact('user' ,'positions' ,'departements'));
    	} catch (Exception $e) {
    		return back()->with('error' ,'User Not Found');
    	}
    }

    public function editPost($id) {
    	try {
    		$user = CrmUser::findOrFail($id);
            $data = request()->all();
        	$data['http_cred'] = request()->header('User-Agent');
        	$data['ip_address'] = request()->ip();
        	$data['edited_by'] = auth()->user()->id;
            if (request('password') == '') {
                unset($data['password']);
            }
    		$user->update($data);
    		if ($user->positions->count() > 0) {
    			foreach($user->positions as $p) {
    				$p->delete();
    			}
    		}
    		if (request()->has('positions')) {
	    		foreach(request('positions') as $pos) {
	    			UserPositions::create(['position_id' => $pos, 'user_id' => $user->id]);
	    		}
	    	}
    		return back()->with('status' ,'User Updated Found');
    	} catch (Exception $e) {
    		return back()->with('error' ,'User Not Found');
    	}
    }

    public function delete($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	try {
    		$user = CrmUser::findOrFail($id);
        } catch (Exception $e) {
            return back()->with('error' ,'User Not Found');
        }
        try {
    		if ($user->positions->count() > 0) {
    			foreach($user->positions as $p) {
    				$p->delete();
    			}
    		}
    		$user->delete();
    		return redirect('users')->with('status' ,'User Deleted Found');
        } catch (Exception $e) {
            return back()->with('error' ,'Can`t delete this user ,it`s related to othder data');
        }
    }

    public static function userPermissions($departement_name = null ,$suffix = null) {
        if ($departement_name != null) {
            $dep_id = Department::where('name' ,$departement_name)->get()->first()->id;
            $positionIds = Positions::where('departement_id' ,$dep_id)->pluck('id')->toArray();
        } else {
            $positionIds = Positions::pluck('id')->toArray();
        }
        $userPositions = auth()->user()->positions()->whereIn('position_id' ,$positionIds)->pluck('position_id')->toArray();
        $userPermissionIds = PermissionPositions::whereIn('position_id' ,$userPositions)->distinct()->pluck('permission_id')->toArray();
        $userPermissions = Permissions::whereIn('id' ,$userPermissionIds);
        if ($suffix != null) {
            $userPermissions = $userPermissions->where('trigger_category' ,$suffix)->pluck('trigger')->toArray();
        } else {
            $userPermissions = $userPermissions->pluck('trigger')->toArray();
        }
        return $userPermissions;
    }

    public static function myPermissionsTrigger() {
        $userPositions = auth()->user()->positions()->pluck('position_id')->toArray();
        $userPermissionIds = PermissionPositions::whereIn('position_id' ,$userPositions)->distinct()->pluck('permission_id')->toArray();
        $userPermissions = Permissions::whereIn('id' ,$userPermissionIds);
        return $userPermissions->distinct()->pluck('trigger_category')->toArray();
    }

    public static function myPermitedTrigger($cat ,$fnc = null) {
        $userPositions = auth()->user()->positions()->pluck('position_id')->toArray();
        $userPermissionIds = PermissionPositions::whereIn('position_id' ,$userPositions)->distinct()->pluck('permission_id')->toArray();
        $userPermissions = Permissions::whereIn('id' ,$userPermissionIds);
        $perm = $userPermissions->where('trigger_category' ,$cat);
        if ($fnc) {
            return $userPermissions->where('trigger' ,$fnc)->first()?1:0;
        }
        return $userPermissions->first()?1:0;
    }

    public static function myPermissions($cat) {
        $userPositions = auth()->user()->positions()->pluck('position_id')->toArray();
        $userPermissionIds = PermissionPositions::whereIn('position_id' ,$userPositions)->distinct()->pluck('permission_id')->toArray();
        $userPermissions = Permissions::whereIn('id' ,$userPermissionIds);
        return $userPermissions->where('trigger_category' ,$cat)->pluck('trigger')->toArray();
    }

    public static function myTaskApproveUsers($key = 'task_approve') {
        $taskApprovePermission = Permissions::where('trigger_category' ,$key)->first();
        $taskPositionsIds = $taskApprovePermission->positions()->pluck('position_id')->toArray();
        $depIds = Positions::whereIn('id' ,$taskPositionsIds)->distinct()->pluck('departement_id')->toArray();
        $posIds = Positions::whereIn('departement_id' ,$depIds)->distinct()->pluck('id')->toArray();
        $usersIds = UserPositions::whereIn('position_id' ,$posIds)->distinct()->pluck('user_id')->toArray();
        $myApprovedTasksIds = TaskPositions::whereIn('position_id' ,$posIds)->distinct()->pluck('task_id')->toArray();
        if ($key == 'task_approve') {
            $tasks_assign_ids = TaskAssign::whereIn('user_id' ,$usersIds)->whereIn('task_id' ,$myApprovedTasksIds)->where('is_done' ,1)->distinct()->pluck('id')->toArray();
        } else {
            $tasks_assign_ids = TaskAssign::whereIn('user_id' ,$usersIds)->whereIn('task_id' ,$myApprovedTasksIds)->where('is_done' ,1)->where('is_approved' ,1)->distinct()->pluck('id')->toArray();
        }
        return $tasks_assign_ids;
    }
}



