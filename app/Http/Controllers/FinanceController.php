<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Companies;
use App\Quotation;
use App\Services;
use App\Contracts;

class FinanceController extends Controller
{
    public function index() {
    	return view('finance.index');
    }

    public function quotation($com_id) {
    	$quot = Companies::find($com_id)->quotations()->where('is_collected' ,0)->first();
        $services = Services::all();
        $code = view('finance.pop-up.quot' ,compact('services' ,'quot'))->render();
        return response(['code' => $code]);
    }

    public function viewQuot($quot_id) {
    	$quot = Quotation::find($quot_id);
        $code = view('finance.pop-up.view-quot' ,compact('quot'))->render();
        return response(['code' => $code]);
    }

    public function loadQuots($key) {
    	$collect = UsersController::myPermitedTrigger('finance' ,'collect_money');
    	$companies = Companies::where('progress' ,100)->pluck('id')->toArray();
    	if ($key == 'collect') {
    		$quotations = Quotation::whereIn('company_id' ,$companies)->where('is_collected' ,1)->get();
    	} else {
    		$contracts = Contracts::where('is_signed' ,1)->pluck('quotation_id')->toArray();
    		$quotations = Quotation::whereIn('company_id' ,$companies)->where('with_contract' ,0)->where('is_collected' ,0)/*->where('is_proposal_completed' ,1)*/->get();
    		$quotContr = Quotation::whereIn('id' ,$contracts)->where('is_collected' ,0)/*->where('is_proposal_completed' ,1)*/->get();
    		$quotations = $quotations->merge($quotContr);
    	}
    	return response(['code' => view('finance.quotations' ,compact('collect' ,'quotations' ,'key'))->render()]);
    }
}
