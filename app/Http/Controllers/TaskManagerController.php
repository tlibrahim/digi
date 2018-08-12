<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskAssign;
use App\TaskExecution;
use App\Tasks;

use Exception;
use Storage;

class TaskManagerController extends Controller
{
    public function index() {
    	$tasks = auth()->user()->tasks;
    	return view('task-manager.home' ,compact('tasks'));
    }

    public function loadTask($task_id ,$assign_id) {
    	try {
    		$assign = TaskAssign::find($assign_id);
    	    $task = Tasks::findOrFail($task_id);
    	    $code = view('task-manager.pop-up.task' ,compact('task' ,'assign_id' ,'assign'))->render();
    		return response(['status' => 'ok' ,'code' => $code]);
    	} catch (Exception $e) {
    		return response(['status' => 'error' ,'msg' => 'Task Not Found']);
    	}
    }

    public function taskHistory($task_id ,$assign_id) {

    }

    public function executeTask($task_id ,$assign_id) {
    	$assign = TaskAssign::find($assign_id);
    	$inputs = $_REQUEST;
    	$files = request()->file();
    	$page = $inputs['page_number'];
    	unset($inputs['_token']);
    	unset($inputs['page_number']);
    	foreach ($inputs as $key => $value) {
    		$oldValues = $assign->executions()->where('input' ,$key)->first();
    		if(!$oldValues) {
    			$data = ['task_assign_id' => $assign_id ,'input' => $key ,'value' => $value ,'type' => 'data'];
    			TaskExecution::create($data);
    		} else {
    			$oldValues->update(['value' => $value]);
    		}
    	}
    	foreach ($files as $key => $value) {
    		$oldValues = $assign->executions()->where('input' ,$key)->first();
    		if (is_array($value)) {
    			$array = '';
    			if(!$oldValues) {
    				$array = '[';
    			}
    			foreach($value as $k => $v) {
    				$array .= '"'.$this->upload($v).'"';
    				if ($k != count($value) - 1) {
    					$array .= ',';
    				}
    			}
    			if (!$oldValues){
    				$array .= ']';
    				$data = ['task_assign_id' => $assign_id ,'input' => $key ,'value' => $array ,'type' => 'array'];
	    			TaskExecution::create($data);
    			} else {
    				$oldValues->update(['value' => str_replace(']' ,','.$array.']' ,$oldValues->value) ]);
    			}
    		} else {
	    		if(!$oldValues) {
		    		$data = ['task_assign_id' => $assign_id ,'input' => $key ,'value' => $this->upload($value) ,'type' => 'file'];
		    		TaskExecution::create($data);
		    	} else {
		    		Storage::delete('public/task-manager/'.$oldValues->value);
		    		$oldValues->update(['value' => $this->upload($value)]);
		    	}
	    	}
    	}
    	return back()->with('status' ,'Task Executed Successfully!')->with('page_number' ,$page);
    }

    public function taskGallery($assign_id) {
    	try {
    		$assign = TaskAssign::findOrFail($assign_id);
    		$name = Tasks::find($assign->task_id)->name;
    		$images = [];
    		$arr_files = $assign->executions()->where('type' ,'array')->get();
    		$files = $assign->executions()->where('type' ,'file')->get();
    		foreach($arr_files as $f) {
    			$json_files = json_decode($f->value);
    			foreach($json_files as $j_f) {
    				$images[] = ['id' => $f->id ,'file' => $j_f];
    			}
    		}
    		foreach($files as $f) {
    			$images[] = ['id' => $f->id ,'file' => $f->value];
    		}
    		$code = view('task-manager.pop-up.gallery' ,compact('images' ,'name'))->render();
    		return response(['status' => 'ok' ,'code' => $code]);
    	} catch (Exception $e) {
    		return response(['status' => 'error' ,'msg' => 'Can`t Find This Gallery']);
    	}
    }

    public function taskConfirm($assign_id) {
    	try {
    		$task = TaskAssign::findOrFail($assign_id);
    		$task->update(['is_done' => 1]);
    		$code = view('task-manager.renders.tr' ,compact('task'))->render();
    		return response(['status' => 'ok' ,'code' => $code]);
    	} catch (Exception $e) {
    		return response(['status' => 'error']);
    	}
    }

    private function upload($file) {
    	$name = time().'-'.str_random(8).'.'.$file->getClientOriginalExtension();
    	$file->storeAs('public/task-manager' ,$name);
    	return $name;
    }

    public static function currentTask($task_assign_id ,$quotation_id ,$service_id ,$serialize_level) {
    	$check = TaskAssign::where('quotation_id' ,$quotation_id)->where('service_id' ,$service_id)->where('serialize_level' ,'<' ,$serialize_level)->where('is_done' ,0)->get();
    	return count($check) > 0 ? false : true;
    }
}
