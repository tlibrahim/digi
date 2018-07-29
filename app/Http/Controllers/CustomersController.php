<?php

namespace App\Http\Controllers;
use App\Http\Controllers\UsersController;

use Exception;
use App\Companies;
use App\Lead_Source;
use App\Customer_lead;
use App\CompaniesModerator;

class CustomersController extends Controller
{
	public function __construct() {
		$this->middleware('auth');
	}

    public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('customers') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
        $myPermissions = UsersController::userPermissions('Digital & Social Media');
        $companies = Companies::where('isverified' ,1)->get();
    	return view('customers.home' ,compact('companies' ,'myPermissions'));
    }

    public function loadProjects($com_id) {
        $sources = Lead_Source::all();
        $projects = Companies::find($com_id)->projects;
        return response(['code' => view('customers.pop-up.add-lead' ,compact('sources' ,'projects' ,'com_id'))->render()]);
    }

    public function addCustomer($ajax = null) {
        try {
            $lead = Customer_lead::create(request()->all());
            if ($ajax == null) {
                return response(['status' => 'ok']);
            } else {
                $code = '<tr>';
                $code .=  '<td>'.$lead->id.'</td>';
                $code .=  '<td>'.$lead->name.'</td>';
                $code .=  '<td>'.$lead->phone.'</td>';
                $code .=  '<td>'.$lead->need_type.'</td>';
                $code .=  '<td>'.$lead->project->name.'</td>';
                $code .=  '<td>'.$lead->source->name.'</td>';
                $code .=  '<td>'.$lead->message.'</td>';
                $code .= '</tr>';
                return response(['status' => 'ok' ,'code' => $code]);
            }
        } catch (Exception $e) {
            return response(['status' => 'error']);
        }
    }

    public function companyLeads($com_id) {
        $leads = Companies::find($com_id)->leads;
        $sources = Lead_Source::all();
        $projects = Companies::find($com_id)->projects;
        return view('customers.company-leads' ,compact('leads' ,'sources' ,'projects' ,'com_id'));
    }

    public function moderator($com_id) {
        $com = CompaniesModerator::where('company_id' ,$com_id)->where('created_at' ,'like' ,'%'.date('Y-m-d').'%')->first();
        if ($com) {
            $msg = $com->start == 1 ? 'Let`s end moderation' : 'Let`s begin moderation';
            $icon = $com->start == 1 ? 'error' : 'success';
            $com->update(['updated_at' => date('Y-m-d H-i-s') ,'start' => $com->start == 1 ? 0 : 1]);
            return response(['msg' => $msg ,'icon' => $icon]);
        } else {
            CompaniesModerator::create(['crm_user_id' => auth()->user()->id ,'company_id' => $com_id]);
            return response(['msg' => 'Let`s begin moderation' ,'icon' => 'success']);
        }
    }
}
