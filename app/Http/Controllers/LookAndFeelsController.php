<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\LookAndFeels;
use Exception;

class LookAndFeelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('look_and_feels') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $looks = LookAndFeels::all();
        return view('look-and-feels.home' ,compact('looks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('look-and-feels.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('look_and_feels' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        LookAndFeels::create($request->all());
        return redirect('look-and-feels')->with('status' ,'Look And Feel Created Successfully!');
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
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('look_and_feels' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $look = LookAndFeels::find($id);
        return view('look-and-feels.edit' ,compact('look'));
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
        LookAndFeels::find($id)->update($request->all());
        return back()->with('status' ,'Look And Feel Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('look_and_feels' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            LookAndFeels::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error' ,'Can`t delete this look and feel ,it`s related to other data');
        }
        return redirect('look-and-feels')->with('status' ,'Look And Feel Deleted Successfully!');
    }
}