<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubServiceValues;
use App\SubServices;

use Exception;

class SubServiceValuesController extends Controller
{
    public function index() {
    	$values = SubServiceValues::all();
    	return view('values.index' ,compact('values'));
    }

    public function addGet() {
    	$subServices = SubServices::all();
    	return view('values.add' ,compact('subServices'));
    }

    public function addPost() {
    	SubServiceValues::create(request()->all());
    	return redirect('values')->with('status' ,'Value Created Successfully!');
    }

    public function editGet($id) {
    	try {
	    	$value = SubServiceValues::findOrFail($id);
	    	$subServices = SubServices::all();
	    	return view('values.edit' ,compact('value' ,'subServices'));
	    } catch (Exception $e) {
	    	return back()->with('error' ,'Value Not Found');
	    }
    }

    public function editPost($id) {
    	try {
	    	SubServiceValues::findOrFail($id)->update(request()->all());
	    	return back()->with('status' ,'Value Updated Successfully!');
	    } catch (Exception $e) {
	    	return back()->with('error' ,'Value Not Found');
	    }
    }

    public function delete($id) {
    	try {
	    	SubServiceValues::findOrFail($id)->delete();
	    	return back()->with('status' ,'Value Deleted Successfully!');
	    } catch (Exception $e) {
	    	return back()->with('error' ,'Value Not Found');
	    }
    }
}
