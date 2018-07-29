<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Positions;
use App\Department;

//helpers

class PositionController extends Controller
{
	public function home() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		$positions = Positions::all();
		return view('positions.index' ,compact('positions'));
	}

	public function add() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		$departements = Department::all();
		return view('positions.add' ,compact('departements'));
	}

	public function addPost(){
		Positions::create(request()->all());
		return redirect('positions')->with('status' ,'Position Added Successfully!');
	}

	public function edit($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		$pos = Positions::find($id);
		$departements = Department::all();
		return view('positions.edit' ,compact('pos' ,'departements'));
	}

	public function editpost($id) {
		Positions::find($id)->fill(request()->all())->save();
		return back()->with('status' ,'Position Updated Successfully!');
	}

	public function delete($id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
		Positions::find($id)->delete();
		return back()->with('status' ,'Position Deleted Successfully!');
	}
}
