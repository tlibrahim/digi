<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Tasks;
use App\TaskPositions;
use App\TaskServices;
use App\TaskInputs;
use App\Services;
use App\Positions;
use App\InputNames;
use App\Department;

use Exception;

class TasksController extends Controller
{
    public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$tasks = Tasks::all();
    	return view('tasks.index' ,compact('tasks'));
    }

    public function create() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$department = Department::all();
        $services = Services::all();
        $inputs = InputNames::all();
    	return view('tasks.add' ,compact('department' ,'inputs' ,'services'));
    }

    public function store(){
    	$task = Tasks::create(request()->all());
        $inputs = request('inputnames');
        if(count($inputs) > 0){
            foreach($inputs as $key => $value) {
                try{
                    TaskInputs::create(['task_id' => $task->id, 'input_name_id' => $value, 'input_title' => request('inputs')[$key]]);
                } catch (Exception $e) {
                    continue;
                }
            }
        }
        $positions = request('positions');
        if(count($positions) > 0){
            foreach($positions as $p) {
                try{
                    TaskPositions::create(['task_id' => $task->id, 'position_id' => $p]);
                } catch (Exception $e) {
                    continue;
                }
            }
        }
        // $services = request('services');
        // if(count($services) > 0){
        //     foreach($services as $p) {
        //         try{
        //             TaskServices::create(['task_id' => $task->id, 'service_id' => $p]);
        //         } catch (Exception $e) {
        //             continue;
        //         }
        //     }
        // }
    	return redirect('tasks')->with('status' ,'Task Created Successfully!');
    }

    public function delete($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	try {
    		$task = Tasks::findOrFail($id);
        } catch (Exception $e) {
            return back()->with('error' ,'This Task Not Available');
        }
        try {
            foreach($task->inputs as $in){
                @$in->delete();
            }
            foreach($task->positions as $in){
                @$in->delete();
            }
            // foreach($task->services as $in){
            //     @$in->delete();
            // }
    		$task->delete();
    	} catch (Exception $e) {
    		return back()->with('error' ,'Can`t delete this task ,it`s related to other data');
    	}
    	return back()->with('status' ,'Task Deleted Successfully!');
    }

    public function deleteinput($input_id) {
        TaskInputs::find($input_id)->delete();
        return;
    }

    public function edit($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$department = Department::all();
        $inputs = InputNames::all();
        $services = Services::all();
    	try {
    		$task = Tasks::findOrFail($id);
    	} catch (Exception $e) {
    		return back()->with('error' ,'This Task Not Available');
    	}
    	return view('tasks.edit' ,compact('task' ,'department' ,'inputs' ,'services'));
    }

    public function update($id) {
		try {
    		$task = Tasks::findOrFail($id);
    		$task->update(request()->all());

            foreach($task->inputs as $in){
                @$in->delete();
            }
            foreach($task->positions as $in){
                @$in->delete();
            }
            // foreach($task->services as $in){
            //     @$in->delete();
            // }

            $inputs = request('inputnames');
            if($inputs){
                foreach($inputs as $key => $value) {
                    try{
                        TaskInputs::create(['task_id' => $task->id, 'input_name_id' => $value, 'input_title' => request('inputs')[$key]]);
                    } catch (Exception $e) {
                        continue;
                    }
                }
            }
            $positions = request('positions');
            if(count($positions) > 0){
                foreach($positions as $p) {
                    try{
                        TaskPositions::create(['task_id' => $task->id, 'position_id' => $p]);
                    } catch (Exception $e) {
                        continue;
                    }
                }
            }
            // $services = request('services');
            // if(count($services) > 0){
            //     foreach($services as $p) {
            //         try{
            //             TaskServices::create(['task_id' => $task->id, 'service_id' => $p]);
            //         } catch (Exception $e) {
            //             continue;
            //         }
            //     }
            // }
    	} catch (Exception $e) {
    		return back()->with('error' ,'This Task Not Available');
    	}
    	return back()->with('status' ,'Task Updated Successfully!');
    }

    public function renderInputRow(){
        $inputs = InputNames::all();
        return response(['code' => view('tasks.render-input-row' ,compact('inputs'))->render()]);
    }

    public function taskapproved(){
        $positions = Positions::all();
        return view('tasks.tasksapproved', compact('positions'));
    }

    public function gettasks(Request $request){
        $pos = Input::get('keyname');
        $y = Positions::find($pos)->departement_id;
        $all = Positions::where('departement_id', $y)->pluck('id')->toArray();
        $alltasks = Tasks::whereIn('position_id', $all)->get();

        return $alltasks;
    }

    public function checktask(Request $request){
        $id = Input::get('taskid');
        $t = Tasks::findOrFail($id);
        $u = Input::get('checked');
        if($u == 1){
            $t->approved = 1;
            $t->save();
        }
        else{
            $t->approved = 0;
            $t->save();
        }
        return $t->approved;
    }
}
