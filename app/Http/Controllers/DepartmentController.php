<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $departements = Department::all();
        return view('department.index' ,compact('departements'));
    }

    public function create() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        return view('department.adddepartment');
    }

    public function store() {
        Department::create(request()->all());
        return redirect('departements')->with('status' ,'Department Added Successfully!');
    }

    public function edit($department_id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $department = Department::find($department_id);
        return view('department.edit' ,compact('department'));
    }

    public function update($department_id) {
        Department::find($department_id)->update(request()->all());
        return back()->with('status' ,'Departement Updated Successfully!');

    }

    public function delete($department_id) {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        Department::find($department_id)->delete();
        return back()->with('status' ,'Departement Deleted Successfully!');
    }
}
