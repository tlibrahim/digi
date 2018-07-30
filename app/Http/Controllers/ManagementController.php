<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Management;
use Exception;

class ManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('management') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $management = Management::all();
        return view('management.home' ,compact('management'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('management.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('management' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        Management::create($request->all());
        return redirect('management')->with('status' ,'Management Created Successfully!');
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
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('management' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $management = Management::find($id);
        return view('management.edit' ,compact('management'));
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
        Management::find($id)->update($request->all());
        return back()->with('status' ,'Management Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('management' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            Management::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error' ,'Can`t delete this management ,it`s related to other data');
        }
        return redirect('management')->with('status' ,'Management Deleted Successfully!');
    }
}
