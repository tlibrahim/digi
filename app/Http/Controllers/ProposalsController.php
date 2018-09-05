<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permissions;
use App\Positions;
use App\Proposal;
use App\ProposalData;
use App\ProposalForms;
use App\Quotation;

use App\Http\Controllers\UsersController;

use Exception;
use Storage;

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

    public function loadProposal($id ,$form_id) {
    	// try {
	    	$proposal = Proposal::findOrFail($id);
	    	$name = $proposal->quotation->company->name;
            $form = ProposalForms::findOrFail($form_id);
            if ( count($proposal->proposal_data) <= 0 ) {
	    	      $code = view('proposals.new-proposal' ,compact('proposal' ,'name' ,'form'))->render();
            } else {
                $code = view('proposals.proposal' ,compact('proposal' ,'name' ,'form'))->render();  
            }
	    	return response(['code' => $code ,'status' => 'ok']);
	    // } catch (Exception $e) {
	    // 	return response(['status' => 'error']);
	    // }
    }

    public function addProposal($id ,$form_id) {
        try {
            $proposal = Proposal::findOrFail($id);
            $inputs = $_REQUEST;
            $files = request()->file();
            unset($inputs['_token']);
            $retMsg = 'Proposal Created Successfully!';
            foreach ($inputs as $in_name => $values) {
                foreach($values as $key => $value) {
                    $oldValues = $proposal->proposal_data()->where('input' ,$in_name)->where('data_index' ,$key)->first();
                    if(!$oldValues) {
                        $data = ['proposal_id' => $id ,'input' => $in_name ,'value' => $value ,'type' => 'data' ,'form_id' => $form_id ,'data_index' => $key];
                        ProposalData::create($data);
                    } else {
                        $retMsg = 'Proposal Updated Successfully!';
                        $oldValues->update(['value' => $value]);
                    }
                }
            }
            foreach ($files as $in_name => $values) {
                foreach($values as $key => $value) {
                    $oldValues = $proposal->proposal_data()->where('type' ,'file')->where('input' ,$in_name)->where('data_index' ,$key)->first();
                    if(!$oldValues) {
                        $data = ['proposal_id' => $id ,'input' => $in_name ,'value' => $this->upload($value) ,'type' => 'file' ,'form_id' => $form_id ,'data_index' => $key];
                        ProposalData::create($data);
                    } else {
                        try {
                            Storage::delete('public/proposal-manager/'.str_replace(url('storage/proposal-manager').'/' ,'' ,$oldValues->value));
                        } catch (Exception $e) {
                            echo 'file not found';
                        }
                        $oldValues->update(['value' => $this->upload($value)]);
                        $retMsg = 'Proposal Updated Successfully!';
                    }
                }
            }
            return back()->with('success' ,$retMsg);
        } catch (Exception $e) {
            return back()->with('error' ,'This Proposal Not Found Yet');
        }
    }

    private function upload($file) {
        $name = time().'-'.str_random(8).'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/proposal-manager' ,$name);
        return url('storage/proposal-manager/'.$name);
    }

    public function loadGallery($id ,$form_id) {
        try {
            $proposal = Proposal::findOrFail($id);
            $images = $proposal->proposal_data()->where('type' ,'file')->where('form_id' ,$form_id)->get();
            $name = $proposal->quotation->company->name;
            $form = ProposalForms::findOrFail($form_id);
            $code = view('proposals.proposal-gallery' ,compact('proposal' ,'name' ,'form' ,'images'))->render();
            return response(['code' => $code ,'status' => 'ok']);
        } catch (Exception $e) {
            return response(['status' => 'error']);
        }
    }

    public function addMore($proposal_id ,$form_id) {
        try {
            $form = ProposalForms::findOrFail($form_id);
            $inputs = $form->inputs()->where('in_add_more' ,1)->get();
            $inputs_number = count($form->inputs);
            if ( count($inputs) != $inputs_number ) {
                $code = view('proposals.more-inputs' ,compact('inputs'))->render();
            } else {
                $code = view('proposals.more-inputs-as-form' ,compact('inputs'))->render();
            }
            return response(['code' => $code ,'status' => 'ok']);
        } catch (Exception $e) {
            return response(['status' => 'error']);
        }
    }
}
