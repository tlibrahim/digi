<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\Positions;
use App\Permissions;
use App\PermissionPositions;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $permissions = Permissions::all();
        return view('permissions.home' ,compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $departements = Department::all();
        return view('permissions.add' ,compact('departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $perm = Permissions::create($request->all());
        foreach(request('positions') as $p) {
            PermissionPositions::create(['position_id' => $p ,'permission_id' => $perm->id]);
        }
        return redirect('permissions')->with('status' ,'Permission Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $departements = Department::all();
        $permission = Permissions::find($id);
        return view('permissions.edit' ,compact('departements' ,'permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $perm = Permissions::find($id);
        $perm->update($request->all());
        foreach ($perm->positions as $pos) {
            $pos->delete();
        }

        foreach(request('positions') as $p) {
            PermissionPositions::create(['position_id' => $p ,'permission_id' => $perm->id]);
        }
        return back()->with('status' ,'Permission Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $perm = Permissions::find($id);
        foreach ($perm->positions as $pos) {
            $pos->delete();
        }
        $perm->delete();
        return back()->with('status' ,'Permission Deleted Successfully!');
    }
}
