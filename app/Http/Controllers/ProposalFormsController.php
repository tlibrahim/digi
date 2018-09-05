<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\UsersController;

use App\ProposalForms;
use App\InputNames;
use App\ProposalFormInputs;

use Exception;

class ProposalFormsController extends Controller {
    public function index() {
        if ( UsersController::myPermitedTrigger('proposal_forms') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $proposals = ProposalForms::where('susspend' ,0)->get();
        return view('proposal-forms.index' ,compact('proposals'));
    }

    public function create() {
        if ( UsersController::myPermitedTrigger('proposal_forms' ,'add') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $inputs = InputNames::whereNotIn('name', ['Multiple Files' ,'Date Range'])->get();
        return view('proposal-forms.create' ,compact('inputs'));
    }

    public function store() {
        $this->validate(request() ,[
            'title' => 'required',
            'icon' => 'required',
            'inputnames.*' => 'required'
        ]);
        $proposal_form = ProposalForms::create(request()->all());
        $inputs = request('inputnames');
        if(count($inputs) > 0){
            foreach($inputs as $key => $value) {
                try{
                    ProposalFormInputs::create([
                        'proposal_form_id' => $proposal_form->id,
                        'input_name_id' => $value,
                        'input_title' => request('inputs')[$key]?:'',
                        'in_add_more' => request('inputsaddmore')[$key]?:0
                    ]);
                } catch (Exception $e) {
                    continue;
                }
            }
        }
        return redirect('proposal-forms')->with('success' ,'Form Create Successfully!');
    }

    public function edit($id) {
        if ( UsersController::myPermitedTrigger('proposal_forms' ,'edit') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            $form = ProposalForms::findOrFail($id);
            $inputs = InputNames::whereNotIn('name', ['Multiple Files' ,'Date Range'])->get();
            return view('proposal-forms.edit' ,compact('form' ,'inputs'));
        } catch (Exception $e) {
            return back()->with('error' ,'This Form Are Not Created Yet');
        }
    }

    public function update($id) {
        $this->validate(request() ,[
            'title' => 'required',
            'icon' => 'required',
            'inputnames.*' => 'required'
        ]);
        try {
            $proposal_form = ProposalForms::findOrFail($id);
            $proposal_form->update(request()->all());

            foreach($proposal_form->inputs as $in){
                @$in->delete();
            }

            $inputs = request('inputnames');
            if(count($inputs) > 0){
                foreach($inputs as $key => $value) {
                    try{
                        $prop_form_in = new ProposalFormInputs();
                        $prop_form_in->proposal_form_id = $proposal_form->id;
                        $prop_form_in->input_name_id = $value;
                        try {
                            $prop_form_in->input_title = request('inputs')[$key];
                        } catch (Exception $e) {
                            $prop_form_in->input_title = '';
                        }
                        try {
                            $d = request('inputsaddmore')[$key];
                            $prop_form_in->in_add_more = 1;
                        } catch (Exception $e) {
                            $prop_form_in->in_add_more = 0;
                        }
                        $prop_form_in->save();
                    } catch (Exception $e) {
                        continue;
                    }
                }
            }
            return back()->with('success' ,'Form Updated Successfully!');
        } catch (Exception $e) {
            return back()->with('error' ,'This Form Are Not Created Yet');
        }
    }

    public function destroy($id) {
        if ( UsersController::myPermitedTrigger('proposal_forms' ,'delete') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        try {
            ProposalForms::findOrFail($id)->update(['susspend' => 1]);
            return back()->with('success' ,'Form Deleted Successfully!');
        } catch (Exception $e) {
            return back()->with('error' ,'This Form Are Not Created Yet');
        }
    }

    public function renderInputRow(){
        $inputs = InputNames::whereNotIn('name', ['Multiple Files' ,'Date Range'])->get();
        return response(['code' => view('proposal-forms.render-input-row' ,compact('inputs'))->render()]);
    }
}
