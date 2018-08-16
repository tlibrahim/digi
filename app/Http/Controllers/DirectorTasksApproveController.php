<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

use App\Quotation;
use App\TaskAssign;
use App\TaskApproveComments;
use App\QuotationServiceQuantity;

use Exception;
use DB;

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

    public function loadDeclinedQuots() {
    	$qqs = QuotationServiceQuantity::where('is_approved' ,1)->get();
    	return response(['code' => view('director-task-approve.renders.declined-table' ,compact('qqs'))->render()]);
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
    		$customer = false;
    		return response(['code' => view('director-task-approve.renders.task-comments' ,compact('name' ,'comments' ,'customer'))->render() ,'status' => 'ok']);
    	} catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function loadDeclinedQuotsComments($qqs_id) {
    	try {
    		$comments = QuotationServiceQuantity::find($qqs_id)->comments()->orderBy('id' ,'desc')->get();
    		$name = QuotationServiceQuantity::find($qqs_id)->quotation->company->name;
    		$customer = true;
    		return response(['code' => view('director-task-approve.renders.task-comments' ,compact('name' ,'comments' ,'customer'))->render() ,'status' => 'ok']);
    	} catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function postTaskAssignApprove($assign_id ,$v) {
    	try {
	    	$assign = TaskAssign::findOrFail($assign_id);
	    	$assign->update(['is_approved' => $v ,'director_approve' => $v ,'is_director_declined' => !$v]);
	    	if ( request()->has('comment') ) {
	    		TaskApproveComments::create(['task_assign_id' => $assign_id ,'user_decline_id' => auth()->user()->id ,'comment' => request('comment') ,'type' => 'Director Comment']);
	    	}
	    	$completed = $this->completeQSQ($assign->quotation_id ,$assign->service_id ,$assign->q_q_s_id);
	    	return response([
	    		'status' => 'ok' ,
	    		'msg' =>$v == 1 ? 'Task Approved' : 'Task Declined' ,
	    		'icon' => $v == 1 ? 'success' : 'error',
	    		'id' => $assign_id,
	    		'completed' => $completed
	    	]);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    private function completeQSQ($quot_id ,$ser_id ,$qsq_id) {
    	$task_number = TaskAssign::where('quotation_id' ,$quot_id)
	    							->where('service_id' ,$ser_id)
	    							->where('q_q_s_id' ,$qsq_id)
	    							->get()->count();
	    $approved_task_number = TaskAssign::where('quotation_id' ,$quot_id)
	    							->where('service_id' ,$ser_id)
	    							->where('q_q_s_id' ,$qsq_id)
	    							->where('director_approve' ,1)
	    							->get()->count();
	    if ( $approved_task_number == $task_number ) {
	    	QuotationServiceQuantity::find($qsq_id)->update(['completed' => 1]);
	    	return 1;
	    }
	    return 0;
    }
}
