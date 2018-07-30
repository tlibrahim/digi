<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Levels;
use Exception;
class LevelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('levels') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $levels = Levels::all();
        return view('levels.home' ,compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('levels' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        return view('levels.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Levels::create($request->all());
        return redirect('levels')->with('status' ,'Level Created Successfully!');
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
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('levels' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $level = Levels::find($id);
        return view('levels.edit' ,compact('level'));
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
        Levels::find($id)->update($request->all());
        return back()->with('status' ,'Level Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('levels' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            Levels::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error' ,'Can`t delete this level ,it`s related to other data');
        }
        return redirect('levels')->with('status' ,'Level Deleted Successfully!');
    }
}
