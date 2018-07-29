<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubServices;
use App\Services;

use Exception;

class SubServiceController extends Controller
{
    public function index() {
    	$subServices = SubServices::all();
    	return view('sub-services.index' ,compact('subServices'));
    }

    public function addGet() {
    	$services = Services::all();
    	return view('sub-services.add' ,compact('services'));
    }

    public function addPost() {
    	SubServices::create(request()->all());
    	return redirect('subservices')->with('status' ,'Sub-Service Created Successfully!');
    }

    public function editGet($id) {
    	try {
    		$service = SubServices::findOrFail($id);
    		$services = Services::all();
    		return view('sub-services.edit' ,compact('service' ,'services'));
    	} catch (Exception $e) {
    		return back()->with('error' ,'Sub Service Not Found');
    	}
    }

    public function editPost($id) {
    	try {
    		SubServices::findOrFail($id)->update(request()->all());
    		return back()->with('status' ,'Sub Service Updated Successfully!');
    	} catch (Exception $e) {
    		return back()->with('error' ,'Sub Service Not Found');
    	}
    }

    public function delete($id) {
    	try {
    		SubServices::findOrFail($id)->delete();
    		return redirect('subservices')->with('status' ,'Sub Service Deleted Successfully!');
    	} catch (Exception $e) {
    		return back()->with('error' ,'Sub Service Not Found');
    	}
    }
}
