<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\CrmUser;
use App\Tasks;
use App\TaskPositions;
use App\TaskAssign;
use App\Positions;
use App\UserPositions;
use App\QuotationServices;
use App\Quotation;

use App\Http\Controllers\UsersController;
use Auth;

class TaskAssignController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index() {
        if ( UsersController::myPermitedTrigger('tasks_assign') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        
        $myPos = Auth::user()->positions()->pluck('position_id')->toArray();
        $myLeadDep = Positions::whereIn( 'id' ,$myPos )->where('type' ,'Team Leader')->pluck('departement_id')->toArray();
        $myDepPositions = Positions::whereIn('departement_id' ,$myLeadDep)->pluck('id')->toArray();

        $taskIds = TaskPositions::whereIn('position_id' ,$myDepPositions)->distinct()->pluck('task_id')->toArray();

        $serviceIds = Tasks::whereIn('id' ,$taskIds)->distinct()->pluck('service_id')->toArray();
        $quotIds = QuotationServices::whereIn('service_id' ,$serviceIds)->distinct()->pluck('quotation_id')->toArray();
        $quots = Quotation::whereIn('id' ,$quotIds)->where('is_collected' ,1)->get();

    	return view('tasks.assign.index' ,compact('quots'));
    }

    public function quotation($quot_id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'assign') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        
        $myPos = Auth::user()->positions()->pluck('position_id')->toArray();
        $myLeadDep = Positions::whereIn( 'id' ,$myPos )->where('type' ,'Team Leader')->pluck('departement_id')->toArray();
        $myDepPositions = Positions::whereIn('departement_id' ,$myLeadDep)->pluck('id')->toArray();

        $quot = Quotation::find($quot_id);
        $services = [];
        foreach ($quot->services as $k => $s) {
            $data = [];
            $counter = 0;
            foreach($s->service->tasks as $i => $t) {
                $pos_ids = $t->positions()->whereIn('position_id' ,$myDepPositions)->pluck('position_id')->toArray();
                if (count($pos_ids) > 0) {
                    $counter = 1;
                    $user_ids = UserPositions::whereIn('position_id' ,$pos_ids)->pluck('user_id')->toArray();
                    $users = CrmUser::whereIn('id' ,$user_ids)->where('id' ,'!=' ,Auth::user()->id)->get();
                    $data['task']['tasks'][$i] = $t;
                    $data['task']['users'][$i] = $users;
                }
            }
            if ($counter != 0) {
                $data['service'] = $s->service;
                $data['quantity'] = $s->quantity;
                $services[$k] = $data;
            }
        }
        // dd($services);
        return view('tasks.assign.assign-form' ,compact('services' ,'quot_id' ,'quot'));
    }

    public function postQuotation($quot_id) {
        if ( request()->has('data') ) {
            foreach( request('data') as $d ) {
                $quot_task = Quotation::find($quot_id)->tasks_assign()->where('service_id' ,$d['service_id'])->where('task_id' ,$d['task_id'])->where('qnt_lvl' ,$d['qnt_lvl'])->first();
                if (!$quot_task) {
                    TaskAssign::create($d);
                } else {
                    $quot_task->update($d);
                }
            }
        }
        return back()->with('status' ,'Tasks Assigned Successfully');
    }
}
