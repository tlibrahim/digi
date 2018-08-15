<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

use App\Quotation;
use App\TaskAssign;
use App\TaskApproveComments;

use Exception;

class DirectorTasksApproveController extends Controller
{
    private $my_tasks_assign_id;
	public function __construct() {
		$this->my_tasks_assign_id = UsersController::myTaskApproveUsers('director_task_approve');
	}

    public function index() {
    	return view('director-task-approve.home');
    }

    public function loadQuots($v) {
    	$quots = Quotation::whereIn('id' ,TaskAssign::whereIn('id' ,$this->my_tasks_assign_id)->distinct()->pluck('quotation_id')->toArray() )->get();
    	return response(['code' => view('director-task-approve.renders.table' ,compact('quots'))->render()]);
    }

    public function loadQuotTasks($quot_id) {
    	try {
	    	$tasks = TaskAssign::whereIn('id' ,$this->my_tasks_assign_id)->where('quotation_id' ,$quot_id)->get();
	    	$company_name = Quotation::find($quot_id)->company->name;
	    	return response(['code' => view('director-task-approve.renders.tasks' ,compact('tasks' ,'company_name'))->render() ,'status' => 'ok']);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function loadComments($assign_id) {
    	try {
    		$task = TaskAssign::findOrFail($assign_id);
    		$comments = $task->comments()->orderBy('id' ,'desc')->where('type' ,'Director Comment')->get();
    		$name = $task->task->name;
    		return response(['code' => view('director-task-approve.renders.task-comments' ,compact('name' ,'comments'))->render() ,'status' => 'ok']);
    	} catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function postTaskAssignApprove($assign_id ,$v) {
    	try {
	    	$assign = TaskAssign::findOrFail($assign_id);
	    	$assign->update(['is_approved' => $v ,'director_approve' => $v]);
	    	if ( request()->has('comment') ) {
	    		TaskApproveComments::create(['task_assign_id' => $assign_id ,'user_decline_id' => auth()->user()->id ,'comment' => request('comment') ,'type' => 'Director Comment']);
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
