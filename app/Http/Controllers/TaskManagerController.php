<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TaskAssign;
use App\TaskExecution;
use App\Tasks;
use App\Companies;

use Exception;
use Storage;

class TaskManagerController extends Controller
{
    public function index() {
    	return view('task-manager.home');
    }

    public function loadTasks($v) {
        if ($v == 0) {
            $tasks = auth()->user()->tasks()->where('is_done' ,$v)->get();
        } else {
            $tasks = auth()->user()->tasks()->where('is_done' ,$v)->where('updated_at' ,'like' ,'%'.date('Y-m').'%')->get();
        }
        return response(['code'=>view('task-manager.renders.table' ,compact('tasks' ,'v'))->render()]);
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

    public function taskHistory($assign_id) {
    	try {
    		$assign = TaskAssign::findOrFail($assign_id);
    		$service_name = $assign->service->name;
    		$company_name = $assign->quotation->company->name;
    		$quot_id = $assign->quotation_id;
    		$ser_id = $assign->service_id;
    		$tasks = TaskAssign::where('quotation_id' ,$quot_id)
    					->where('service_id' ,$ser_id)
    					// ->where('serialize_level' ,'<' ,$assign->serialize_level)
    					->where('is_done' ,1)
    					->get();
    		$code = view('task-manager.pop-up.history' ,compact('tasks' ,'service_name' ,'company_name'))->render();
    		return response(['status' => 'ok' ,'code' => $code]);
    	} catch (Exception $e) {
    		return response(['status' => 'error']);
    	}
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
    				if ($oldValues->value != '[]') {
	    				$oldValues->update(['value' => str_replace(']' ,','.$array.']' ,$oldValues->value) ]);
	    			} else {
	    				$oldValues->update(['value' => str_replace(']' ,$array.']' ,$oldValues->value) ]);
	    			}
    			}
    		} else {
	    		if(!$oldValues) {
		    		$data = ['task_assign_id' => $assign_id ,'input' => $key ,'value' => $this->upload($value) ,'type' => 'file'];
		    		TaskExecution::create($data);
		    	} else {
		    		try {
		    			Storage::delete('public/task-manager/'.$oldValues->value);
		    		} catch (Exception $e) {
		    			echo 'file not found';
		    		}
		    		$oldValues->update(['value' => $this->upload($value)]);
		    	}
	    	}
    	}
    	return back()->with('status' ,'Task Executed Successfully!')->with('page_number' ,$page);
    }

    public function taskGallery($assign_id ,$with_del = null) {
    	try {
    		$assign = TaskAssign::findOrFail($assign_id);
    		$name = Tasks::find($assign->task_id)->name;
    		$images = [];
    		$arr_files = $assign->executions()->where('type' ,'array')->get();
    		$files = $assign->executions()->where('type' ,'file')->get();
    		foreach($arr_files as $f) {
    			$json_files = json_decode($f->value);
    			foreach($json_files as $j_f) {
    				if ($j_f != '') {
    					$images[] = ['id' => $f->id ,'file' => $j_f];
    				}
    			}
    		}
    		foreach($files as $f) {
    			if ($f != '') {
    				$images[] = ['id' => $f->id ,'file' => $f->value];
    			}
    		}
    		$code = view('task-manager.pop-up.gallery' ,compact('images' ,'name' ,'with_del'))->render();
    		return response(['status' => 'ok' ,'code' => $code]);
    	} catch (Exception $e) {
    		return response(['status' => 'error' ,'msg' => 'Can`t Find This Gallery']);
    	}
    }

    public function deleteFile() {
    	try {
	    	$data = request()->all();
	    	$fileName = $data['file'];
	    	$exec = TaskExecution::findOrFail($data['id']);
	    	if ($exec->type == 'file') {
	    		$exec->update(['value' => '']);
	    		Storage::delete('public/task-manager/'.str_replace(url('storage/task-manager').'/' ,'' ,$fileName) );
	    	} else if ($exec->type == 'array') {
	    		if (stripos($exec->value ,',"'.$fileName.'"')) {
	    			$exec->update(['value' => str_replace(',"'.$fileName.'"' ,'' ,$exec->value)]);
	    		} else if (stripos($exec->value ,'"'.$fileName.'",')) {
	    			$exec->update(['value' => str_replace('"'.$fileName.'",' ,'' ,$exec->value)]);
	    		} else {
	    			$exec->update(['value' => str_replace('"'.$fileName.'"' ,'' ,$exec->value)]);
	    		}
	    		Storage::delete('public/task-manager/'.str_replace(url('storage/task-manager').'/' ,'' ,$fileName) );
	    	}
	    	return response(['status' => 'ok']);
	    } catch (Exception $e) {
    		return response(['status' => 'error']);
    	}
    }

    public function taskConfirm($assign_id) {
    	try {
    		$task = TaskAssign::findOrFail($assign_id);
    		$inputs = Tasks::findOrFail($task->task_id)->inputs;
    		$executions = $task->executions;

    		if (count($inputs) != count($executions)) {
    			return response(['status' => 'confirm']);
    		}
    		if ($task->executions()->where(function($q){$q->where('value' ,'')->orWhere('value' ,'[]');})->get()->count() > 0) {
    			return response(['status' => 'confirm']);
    		}

    		$task->update(['is_done' => 1]);
    		$code = view('task-manager.renders.tr' ,compact('task'))->render();
            $prog = TaskManagerController::taskProgress($task->quotation_id, $task->service_id).'%';
    		return response(['status' => 'ok' ,'code' => $code ,'progress' => $prog ,'id' => $assign_id ]);
    	} catch (Exception $e) {
    		return response(['status' => 'error']);
    	}
    }

    private function upload($file) {
    	$name = time().'-'.str_random(8).'.'.$file->getClientOriginalExtension();
    	$file->storeAs('public/task-manager' ,$name);
    	return url('storage/task-manager/'.$name);
    }

    public static function currentTask($task_assign_id ,$quotation_id ,$service_id ,$serialize_level ,$qnt_lvl) {
    	$check = TaskAssign::where('quotation_id' ,$quotation_id)->where('service_id' ,$service_id)->where('serialize_level' ,'<' ,$serialize_level)->where('is_approved' ,0)->where('qnt_lvl' ,$qnt_lvl)->get();
    	return count($check) > 0 ? false : true;
    }

    public static function taskProgress($quot_id ,$ser_id ,$qnt_lvl) {
    	$c_task_assigns = TaskAssign::where('quotation_id' ,$quot_id)->where('service_id' ,$ser_id)->where('qnt_lvl' ,$qnt_lvl)->get()->count();
    	$done_task_assigns = TaskAssign::where('quotation_id' ,$quot_id)->where('service_id' ,$ser_id)->where('is_done' ,1)->where('qnt_lvl' ,$qnt_lvl)->get()->count();
    	return $done_task_assigns * 100 / $c_task_assigns;
    }
}
