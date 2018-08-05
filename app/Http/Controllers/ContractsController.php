<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Quotation;
use App\Contracts;

use Storage;

class ContractsController extends Controller
{
    public function index() {
    	// $myPermissions = UsersController::myPermissions('contracts');
    	// $com_ids = Quotation::where('with_contract' ,1)->pluck('company_id')->toArray();
    	// $companies = Companies::whereIn('id' ,$com_ids)->get();
    	return view('contracts.home');
    }

    public function loadSignedContracts() {
    	$contracts = Contracts::where('is_signed' ,1)->get();
    	$code = view('contracts.signed-table' ,compact('contracts'))->render();
    	return response(['code' => $code]);
    }

    public function loadContractsQuot() {
    	$myPermissions = UsersController::myPermissions('contracts');
        $companies = Companies::where('progress' ,100)->pluck('id')->toArray();
    	$quots = Quotation::where('with_contract' ,1)->where('is_collected' ,0)->whereIn('company_id' ,$companies)->get();
    	$code = view('contracts.quot-table' ,compact('myPermissions' ,'quots'))->render();
    	return response(['code' => $code]);
    }

    public function add() {
    	$this->validate(request() ,[
    		'pdf' => 'required|mimes:pdf'
    	]);
    	Contracts::create(request()->all());
    	return back()->with('status' ,'Contract Created Successfully!');
    }

    public function loadEdit($con_id) {
    	$cont = Contracts::find($con_id);
    	$com_ids = Quotation::where('with_contract' ,1)->pluck('company_id')->toArray();
    	return response(['code' => view('contracts.pop-up.edit-contract' ,compact('cont'))->render()]);
    }

    public function loadAdd($quotation_id) {
    	$name = Quotation::find($quotation_id)->company->name;
    	return response(['code' => view('contracts.pop-up.add-contract' ,compact('quotation_id' ,'name'))->render()]);
    }

    public function edit($con_id) {
    	$this->validate(request() ,[
    		'pdf' => 'nullable|mimes:pdf'
    	]);
    	$con = Contracts::find($con_id);
    	if (request()->hasFile('pdf')) {
    		Storage::delete('public/contracts/'.$con->pdf);
    	}
    	$con->update(request()->all());
    	return back()->with('status' ,'Contract Updated Successfully!');
    }

    public function signContract($cont_id) {
    	$cont = Contracts::find($cont_id);
    	$cont->is_signed = $cont->is_signed == 1 ? 0 : 1;
    	$msg = $cont->is_signed == 1 ? 'Contract is signed' : 'Contract is unsigned';
    	$icon = $cont->is_signed == 1 ? 'success' : 'error';
    	$cont->save();
    	return response(['status' => 'ok' ,'msg' => $msg ,'icon' => $icon ,'sign' => $cont->is_signed]);
    }
}
