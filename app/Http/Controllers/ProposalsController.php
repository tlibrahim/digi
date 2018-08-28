<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions;
use App\Positions;
use App\Proposal;
use App\Quotation;

use App\Http\Controllers\UsersController;

use Exception;

class ProposalsController extends Controller
{
    public function index() {
    	if ( UsersController::myPermitedTrigger('complete_proposal') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit Proposal Page');
        }
    	return view('proposals.home');
    }

    public function getCurrentProposals() {
    	$positions = Permissions::where('trigger' ,'complete_proposal')->first()->positions()->distinct()->pluck('position_id')->toArray();
    	$dep_ids = Positions::whereIn('id' ,$positions)->distinct()->pluck('departement_id')->toArray();
    	$quots = Proposal::whereIn('departement_id' ,$dep_ids)->where('is_complete' ,0)->get();
    	$code = view('proposals.table' ,compact('quots'))->render();
    	return response(['code' => $code]);
    }

    public function loadProposal($id) {
    	try {
	    	$q = Proposal::findOrFail($id);
	    	$proposal = $q->proposal;
	    	$name = $q->quotation->company->name;
	    	$code = view('proposals.proposal' ,compact('proposal' ,'name'))->render();
	    	return response(['code' => $code ,'status' => 'ok']);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }
}
