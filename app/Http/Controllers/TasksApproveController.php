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
    	$quots = Quotation::whereIn('id' ,TaskAssign::whereIn('id' ,$this->my_tasks_assign_id)->distinct()->pluck('quotation_id')->toArray() )->get();
    	return response(['code' => view('task-approve.renders.table' ,compact('quots'))->render()]);
    }

    public function loadQuotTasks($quot_id) {
    	try {
	    	$tasks = TaskAssign::whereIn('id' ,$this->my_tasks_assign_id)->where('quotation_id' ,$quot_id)->get();
	    	$company_name = Quotation::find($quot_id)->company->name;
	    	return response(['code' => view('task-approve.renders.tasks' ,compact('tasks' ,'company_name'))->render() ,'status' => 'ok']);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function loadComments($assign_id) {
    	try {
    		$task = TaskAssign::findOrFail($assign_id);
    		$comments = $task->comments()->orderBy('id' ,'desc')->get();
    		$name = $task->task->name;
    		return response(['code' => view('task-approve.renders.task-comments' ,compact('name' ,'comments'))->render() ,'status' => 'ok']);
    	} catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    // public function taskAssignApprove($assign_id) {
    // 	try {
	   //  	$assign = TaskAssign::findOrFail($assign_id);
	   //  	$check = $assign->is_approved;
	   //  	$assign->update(['user_approved_id' => auth()->user()->id ,'is_approved' => $check == 0 ? 1 : 0]);
	   //  	$_class = $check == 0 ? 'btn-success' : 'btn-warning';
	   //  	$class = $check == 0 ? 'btn-warning' : 'btn-success';
	   //  	$text = $check == 0 ? 'Decline This Task' : 'Approve This Task';
	   //  	return response([
	   //  		'status' => 'ok' ,
	   //  		'msg' => $check == 0 ? 'Task Approved' : 'Task Declined' ,
	   //  		'icon' => $check == 0 ? 'success' : 'error',
	   //  		'class' => $class,
	   //  		'_class' => $_class,
	   //  		'text' => $text,
	   //  		'id' => $assign_id
	   //  	]);
	   //  } catch (Exception $e) {
	   //  	return response(['status' => 'error']);
	   //  }
    // }

    public function postTaskAssignApprove($assign_id ,$v) {
    	try {
	    	$assign = TaskAssign::findOrFail($assign_id);
	    	$assign->update(['user_approved_id' => auth()->user()->id ,'is_approved' => $v ,'is_done' => $v]);
	    	if ( request()->has('comment') ) {
	    		TaskApproveComments::create(['task_assign_id' => $assign_id ,'user_decline_id' => auth()->user()->id ,'comment' => request('comment')]);
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
