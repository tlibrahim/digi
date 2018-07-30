<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industries;
use Exception;
class IndustriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('industries') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $industries = Industries::all();
        return view('industries.home' ,compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('industries' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        return view('industries.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Industries::create($request->all());
        return redirect('industries')->with('status' ,'Industry Created Successfully!');
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
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('industries' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $industry = Industries::find($id);
        return view('industries.edit' ,compact('industry'));
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
        Industries::find($id)->update($request->all());
        return back()->with('status' ,'Industry Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('industries' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            Industries::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error' ,'Can`t delete this industry ,it`s related to other data');
        }
        return redirect('industries')->with('status' ,'Industry Deleted Successfully!');
    }
}
