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
		return view('services.add');
	}

	public function addPost() {
		Services::create(request()->all());
		return redirect('services')->with('status' ,'Service Created Successfully!');
	}

	public function editGet($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		try {
			$service = Services::findOrFail($id);
			return view('services.edit' ,compact('service'));
		} catch (Exception $e) {
			return back()->with('error' ,'Service Not Found');
		}
	}

	public function editPost($id) {
		try {
			$service = Services::findOrFail($id);
			$service->update(request()->all());
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
			Services::findOrFail($id)->delete();
		} catch (Exception $e) {
			return back()->with('error' ,'Service Not Found');
		}
	}
}
