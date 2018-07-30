<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FeedbackForms;
use Exception;

class FeedbackFormsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $feedbacks = FeedbackForms::all();
        return view('feedback-forms.home' ,compact('feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        return view('feedback-forms.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        FeedbackForms::create($request->all());
        return redirect('feedback-forms')->with('status' ,'Feedback Form Created Successfully!');
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
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $feedback = FeedbackForms::find($id);
        return view('feedback-forms.edit' ,compact('feedback'));
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
        FeedbackForms::find($id)->update($request->all());
        return back()->with('status' ,'Feedback Form Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            FeedbackForms::find($id)->delete();
        } catch (Exception $e) {
            return back()->with('error' ,'Can`t delete this feedback form ,it`s related to other data');
        }
        return redirect('feedback-forms')->with('status' ,'Feedback Form Deleted Successfully!');
    }

    public function renderFormBody($id) {
        return response(['code' => FeedbackForms::find($id)->form_html]);
    }
}
