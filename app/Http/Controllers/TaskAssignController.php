<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Tasks;
use App\TaskAssign;

class TaskAssignController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$tasks = TaskAssign::all();
    	return view('tasks.assign.index' ,compact('tasks'));
    }

    public function renderLoaders($key ,$id = null) {
    	$users = User::all();
    	$tasks = Tasks::all();
    	switch ($key) {
    		case 'edit':
    			$task = TaskAssign::find($id);
    			$code = view('tasks.assign.pop-up.edit-assign-task' ,compact('users' ,'tasks' ,'task'))->render();
    			break;
    		default:
    			$code = view('tasks.assign.pop-up.assign-task' ,compact('users' ,'tasks'))->render();
    			break;
    	}
    	return response(['code' => $code ,'status' => 'ok']);
    }

    public function add() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	TaskAssign::create(request()->all());
    	return back()->with('status' ,'Task Assigned Successfully!');
    }

    public function edit($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	TaskAssign::find($id)->update(request()->all());
    	return back()->with('status' ,'Assign Updated Successfully!');
    }

    public function delete($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	TaskAssign::find($id)->delete();
    	return back()->with('status' ,'Assign Deleted Successfully!');
    }
}
