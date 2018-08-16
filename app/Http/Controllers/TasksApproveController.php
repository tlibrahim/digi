<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

use App\Quotation;
use App\TaskAssign;
use App\TaskApproveComments;

use Exception;

class TasksApproveController extends Controller
{
	private $my_tasks_assign_id;
	public function __construct() {
		$this->my_tasks_assign_id = UsersController::myTaskApproveUsers();
	}

    public function index() {
    	return view('task-approve.home');
    }

    public function loadQuots($v) {
    	$quots = Quotation::whereIn('id' ,
    						TaskAssign::whereIn('id' ,$this->my_tasks_assign_id)
    									->where('is_director_declined' ,$v)
    									->where('director_approve' ,0)
    									->distinct()
    									->pluck('quotation_id')->toArray()
    						)->get();
    	return response(['code' => view('task-approve.renders.table' ,compact('quots' ,'v'))->render()]);
    }

    public function loadQuotTasks($quot_id ,$declined) {
    	try {
	    	$tasks = TaskAssign::whereIn('id' ,$this->my_tasks_assign_id)
	    						->where('is_director_declined' ,$declined)
	    						->where('quotation_id' ,$quot_id)
    							->where('director_approve' ,0)
	    						->get();
	    	$company_name = Quotation::find($quot_id)->company->name;
	    	return response(['code' => view('task-approve.renders.tasks' ,compact('tasks' ,'company_name' ,'declined'))->render() ,'status' => 'ok']);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function loadComments($assign_id ,$declined) {
    	try {
    		$task = TaskAssign::findOrFail($assign_id);
    		$comments = $task->comments()->orderBy('id' ,'desc')->where('type' ,$declined == 0 ? 'T.L. Comment' : 'Director Comment')->get();
    		$name = $task->task->name;
    		return response(['code' => view('task-approve.renders.task-comments' ,compact('name' ,'comments'))->render() ,'status' => 'ok']);
    	} catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function postTaskAssignApprove($assign_id ,$v) {
    	try {
	    	$assign = TaskAssign::findOrFail($assign_id);
	    	$assign->update(['user_approved_id' => auth()->user()->id ,'is_approved' => $v ,'is_done' => $v]);
	    	if ( request()->has('comment') ) {
	    		TaskApproveComments::create(['task_assign_id' => $assign_id ,'user_decline_id' => auth()->user()->id ,'comment' => request('comment') ,'type' => 'T.L. Comment']);
	    	}
	    	return response([
	    		'status' => 'ok' ,
	    		'msg' =>$v == 1 ? 'Task Approved' : 'Task Declined' ,
	    		'icon' => $v == 1 ? 'success' : 'error',
	    		'id' => $assign_id
	    	]);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }
}
