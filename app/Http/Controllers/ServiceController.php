<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services;
use App\ServiceTasks;
use App\Tasks;

use Exception;

class ServiceController extends Controller
{
	public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		$services = Services::all();
		return view('services.index' ,compact('services'));
	}

	public function addGet() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		$tasks = Tasks::all();
		return view('services.add' ,compact('tasks'));
	}

	public function addPost() {
		$service = Services::create(request()->all());
		if (request()->has('tasks')) {
			foreach(request('tasks') as $t) {
				ServiceTasks::create(['task_id' => $t, 'service_id' => $service->id]);
			}
		}
		return redirect('services')->with('status' ,'Service Created Successfully!');
	}

	public function editGet($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		try {
			$service = Services::findOrFail($id);
			$tasks = Tasks::all();
			return view('services.edit' ,compact('service' ,'tasks'));
		} catch (Exception $e) {
			return back()->with('error' ,'Service Not Found');
		}
	}

	public function editPost($id) {
		try {
			$service = Services::findOrFail($id);
			$service->update(request()->all());
			if ($service->tasks) {
				foreach($service->tasks as $t) {
					$t->delete();
				}
			}
			if (request()->has('tasks')) {
				foreach(request('tasks') as $t) {
					ServiceTasks::create(['task_id' => $t, 'service_id' => $service->id]);
				}
			}
			return back()->with('status' ,'Service Updated Successfully!');
		} catch (Exception $e) {
			return back()->with('error' ,'Service Not Found');
		}
	}

	public function delete($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		try {
			$service = Services::findOrFail($id);
			if ($service->tasks) {
				foreach($service->tasks as $t) {
					$t->delete();
				}
			}
			$service->delete();
			return redirect('services')->with('status' ,'Service Deleted Successfully!');
		} catch (Exception $e) {
			return back()->with('error' ,'Service Not Found');
		}
	}
}
