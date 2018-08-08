<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskAssign;
class TaskManagerController extends Controller
{
    public function index() {
    	$tasks = auth()->user()->tasks;
    	return view('task-manager.home' ,compact('tasks'));
    }

    public static function currentTask($task_assign_id ,$quotation_id ,$service_id ,$serialize_level) {
    	$check = TaskAssign::where('quotation_id' ,$quotation_id)->where('service_id' ,$service_id)->where('serialize_level' ,'<' ,$serialize_level)->where('is_done' ,0)->get();
    	return count($check) > 0 ? false : true;
    }
}
