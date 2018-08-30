<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\UsersController;

use App\Companies;
use App\Company_User;
use App\Industries;
use App\Profiling;
use App\ProfilingProd;
use App\ProfilingSites;
use App\ProfilingSocials;
use App\ProfilingRef;
use App\Feedbacks;

use App\ProposalSelectedForm;
use App\ProposalForms;
use App\Levels;
use App\Management;
use App\PostTypes;
use App\Technologies;
use App\LookAndFeels;
use App\Content;
use App\PromoteStatus;
use App\FeedbackForms;
use App\CrmUser;
use App\Positions;
use App\Department;
use App\UserPositions;
use App\Services;
use App\MeetingFeedback;
use App\Quotation;
use App\QuotationServices;
use App\Proposal;
use App\Privlage;

use Exception;
use Storage;

use Mail;
use App\Jobs\SendVerificationEmail;

class PotentialsController extends Controller {
    public function index() {
        $myPermissions = UsersController::myPermissions('potential');
        $industries = Industries::all();
        return view('potentials.home' ,compact('industries' ,'myPermissions'));
    }
    
    public function loadPotentials($start = 15 ,$end = 45) {
        $myPermissions = UsersController::myPermissions('potential');
        $potentials = Companies::where('progress' ,'<' ,$end)->where('progress' ,'>=' ,$start)->get();
        if ($end == 46) {
            $n = 1;
        } else if ($end == 86) {
            $n = 2;
        } else {
            $n = 3;
        }
        // $feedbacks = FeedbackForms::all();
        // $industries = Industries::all();
        // $prilleges = Privlage::all();

        // $bd_id = Department::where('name' ,'Business Development')->get()->first()->id;

        // $position_ids = Positions::where('departement_id' ,$bd_id)->pluck('id')->toArray();
        // $user_ids = UserPositions::whereIn('position_id' ,$position_ids)->pluck('user_id')->toArray();
        // $users = CrmUser::whereIn('id' ,$user_ids)->get();
        // $meeting_form_id = FeedbackForms::where('name' ,'like' ,'%Meeting%')->first()->id;
        $code = view('potentials.table' ,
                      compact('potentials' ,'myPermissions' ,'n'))->render();
        return response(['code' => $code]);
    }
    
    public function loadPotentialProfiling($com_id) {
        $p = Companies::find($com_id);
        $levels = Levels::all();
        $manage = Management::all();
        $types = PostTypes::all();
        $techs = Technologies::all();
        $looks = LookAndFeels::all();
        $content = Content::all();
        $promotes = PromoteStatus::all();
        
        $code = view('potentials.pop-up.profiling.profile' ,compact('p' ,'levels' ,'techs' ,'manage' ,'types' ,'looks' ,'content' ,'promotes'))->render();
        return response(['code' => $code]);
    }
    
    public function loadPotentialFeedback($com_id) {
        $p = Companies::find($com_id);
        $feedbacks = FeedbackForms::all();
        
        $code = view('potentials.pop-up.feedbacks.add-feedback' ,compact('p' ,'feedbacks'))->render();
        return response(['code' => $code]);
    }

    public function create() {
        $industries = Industries::all();
        return view('potentials.add' ,compact('industries'));
    }

    public function store(Request $request) {
        $data = $request->all();
        $data['email'] = str_random(8).'@gmail.com';
        Companies::create($data);
        return back()->with('status' ,'Company Created Successfully!');
    }

    public function edit($id) {
        $potential = Companies::find($id);
        $industries = Industries::all();
        return view('potentials.edit' ,compact('potential' ,'industries'));
    }

    public function update(Request $request, $id) {
        Companies::find($id)->update($request->all());
        return response(['status' => 'ok' ,'icon' => 'success' ,'msg' => 'Company Updated Successfully!' ,'code' => $this->renderCompanyTr($id) ,'id' => $id]);
    }

    public function destroy($id) {
        try {
            Companies::findOrFail($id)->delete();
            return response(['status' => 'ok' ,'msg' => 'Potential Deleted Successfully!' ,'icon' => 'success']);
        } catch (Exception $e) {
            return response(['status' => 'error' ,'msg' => 'Can`t Delete This Potential Now!' ,'icon' => 'error']);
        }
    }

    public function postConnection($pot_id) {
        $this->validate(request() ,[
            'email' => 'required',
            'firstname' => 'required' ,
            'lastname' => 'required' ,
            'position' => 'required' ,
            'phone' => 'required'
        ]);
        try {
            Companies::find($pot_id)->update(request()->all());
            return back()->with('status' ,'Connection Updated Successfully!');
        } catch (Exception $e) {
            return back()->with('error' ,'Email Must Be Unique');
        }
    }

    public function addConnection($pot_id) {
        try {
            $data = request()->all();
            $data['confirmation_code'] = str_random(30);
            $data['verification_code'] = str_random(8);
            
            $u = Company_User::create($data);
            $perc = $this->calcPerc($u->company_id);
            return response(['icon' => 'success' ,'msg' => 'Connection Created Successfully!' ,'perc' => $perc ,'id' => $u->company_id]);
        } catch (Exception $e) {
            return response(['icon' => 'error' ,'msg' => 'Email is already token!']);
        }
    }

    public function editConnection($pot_id ,$con_id) {
        try {
            Company_User::find($con_id)->update(request()->all());
            return response(['msg' => 'Connection Updated Successfully!' ,'icon' => 'success']);
        } catch (Exception $e) {
            return response(['icon' => 'error' ,'msg' => 'Email is already token']);
        }
    }

    public function deleteConnection($con_id) {
        $con = Company_User::find($con_id);
        $c = Companies::find($con->company_id);
        $con->delete();
        $perc = 15;
        if ($c->connections()->count() > 0) {
            $perc += 15;
        }
        if ($c->feedbacks()->count() > 0) {
            $perc += 15;
        }
        if ($c->profile()->count() > 0) {
            $perc += 15;
        }
        if ($c->quotations()->count() > 0) {
            $perc = 100;
        }
        $perc = $perc.'%';
        return response(['msg' => 'Connection Deleted Successfully!' ,'id' => $con->company_id ,'perc' => $perc]);
    }

    public function postProfiling($pot_id) {
        $profile = Profiling::firstOrCreate(['potential_id' => $pot_id]);
        $data = request()->all();
        if ( request()->has('seo_check') ) {
            $data['seo_check'] = 1;
        } else {
            $data['seo_check'] = 0;
        }
        if ( request()->has('sem_check') ) {
            $data['sem_check'] = 1;
        } else {
            $data['sem_check'] = 0;
        }
        if ( request()->has('gdn_check') ) {
            $data['gdn_check'] = 1;
        } else {
            $data['gdn_check'] = 0;
        }
        $profile->update($data);

        if ($profile->refs) {
            foreach($profile->refs as $r) {
                $r->delete();
            }
        }
        if (request()->has('refs')) {
            foreach(request('refs') as $r) {
                $data = $r;
                $data['profiling_id'] = $profile->id;
                if ($data['reference']) {
                    ProfilingRef::create($data);
                }
            }
        }

        if ($profile->sites) {
            foreach($profile->sites as $r) {
                $r->delete();
            }
        }
        if (request()->has('websites')) {
            foreach(request('websites') as $r) {
                $data = $r;
                $data['profiling_id'] = $profile->id;
                if ($data['link']) {
                    ProfilingSites::create($data);
                }
            }
        }

        if ($profile->products) {
            foreach($profile->products as $r) {
                $r->delete();
            }
        }
        if (request()->has('products')) {
            foreach(request('products') as $r) {
                $data = $r;
                $data['profiling_id'] = $profile->id;
                if ($data['product']) {
                    ProfilingProd::create($data);
                }
            }
        }

        if ($profile->socials) {
            foreach($profile->socials as $r) {
                $r->delete();
            }
        }
        if (request()->has('socials')) {
            foreach(request('socials') as $r) {
                $data = $r;
                $data['profiling_id'] = $profile->id;
                if ($data['name']) {
                    ProfilingSocials::create($data);
                }
            }
        }

        $levels = Levels::all();
        $manage = Management::all();
        $types = PostTypes::all();
        $techs = Technologies::all();
        $looks = LookAndFeels::all();
        $content = Content::all();
        $promotes = PromoteStatus::all();
        $p = Companies::find($pot_id);
        return response([
            'status' => 'ok',
            'id' => $p->id,
            'perc' => $this->calcPerc($p->id),
            'formBody' => view('potentials.pop-up.profiling.render.profile-form-body' ,compact(
                'levels' ,'manage' ,'types' ,'techs' ,'looks' ,'content' ,'promotes' ,'p'
            ))->render()
        ]);
    }

    public function uploadLogo($profile_id ,$pot_id) {
        if ($profile_id != 'undefined') {
            $profile = Profiling::find($profile_id);
        } else {
            $profile = Profiling::create(['potential_id' => $pot_id]);
        }
        try {
            Storage::delete('public/profiling-logos/'.$profile->logo);
        } catch (Exception $e) {
            echo 'exceptions baby';
        }
        $profile->update(['logo' => request()->file('logo')]);
        return response(['status' => 'ok']);
    }

    public function removeFromProfiling($key ,$id) {
        if ( $key == 'socials' ) {
            ProfilingSocials::find($id)->delete();
            return response(['status' => 'ok']);
        } else if ( $key == 'sites' ) {
            ProfilingSites::find($id)->delete();
            return response(['status' => 'ok']);
        } else if ( $key == 'refs' ) {
            ProfilingRef::find($id)->delete();
            return response(['status' => 'ok']);
        } else if ( $key == 'prods' ) {
            ProfilingProd::find($id)->delete();
            return response(['status' => 'ok']);
        }
        return response(['status' => 'error']);
    }

    public function renderRow($key) {
        $manage = Management::all();
        $types = PostTypes::all();
        $techs = Technologies::all();
        $looks = LookAndFeels::all();
        $content = Content::all();
        $promotes = PromoteStatus::all();
        if ( $key == 'socials' ) {
            $code = view('potentials.pop-up.profiling.render.social-row' ,compact('manage' ,'types' ,'content' ,'promotes'))->render();
        } else if ( $key == 'sites' ) {
            $code = view('potentials.pop-up.profiling.render.site-row' ,compact('techs' ,'looks' ,'content'))->render();
        } else if ( $key == 'refs' ) {
            $code = view('potentials.pop-up.profiling.render.ref-row')->render();
        } else if ( $key == 'prods' ) {
            $code = view('potentials.pop-up.profiling.render.prod-row')->render();
        }
        return response(['code' => $code]);
    }

    public function addFeedback($pot_id) {
        $data = request()->all();
        $values = '';
        foreach($data as $key => $val) {
            if ($key != 'feedback_form_id' && $key != 'potential_id' && $key != '_token') {
                $values .= implode(" " ,explode("_" ,$key)).' : <span>'.$val.'</span>;';
            }
        }
        $data['values'] = $values;
        $f = Feedbacks::create($data);
        return response([
            'icon' => 'success' ,
            'msg' => 'Feedback Created Successfully!' ,
            'id' => $f->potential_id ,
            'perc' => $this->calcPerc($f->potential_id) ,
            'code' => $this->renderCompanyTr($f->potential_id)
        ]);
    }

    public function assignUser($pot_id) {
        Companies::find($pot_id)->update(request()->all());
        return back()->with('status' ,'Potential Assigned Successfully!');
    }

    public function loadProfileView($p_id) {
        $p = Companies::find($p_id);
        return response([
            'code' => view('potentials.pop-up.profiling.render.view-profile-render' ,compact('p'))->render()
        ]);
    }

    public function active($id) {
        $com = Companies::find($id);
        if ($com->isverified == 0) {
            $com->isverified = 1;
            $com->save();
            $users = $com->connections()->where('confirmed' ,0)->get();
            foreach($users as $u) {
                dispatch(new SendVerificationEmail($u));
            }
            return response(['msg' => 'Company "'.$com->name.'" Verified Successfully!', 'icon' => 'success']);
        } else {
            $com->isverified = 0;
            $com->save();
            return response(['msg' => 'Company "'.$com->name.'" Unverified!', 'icon' => 'error']);
        }
    }
    
    public function getQuotation($com_id) {
        $quot = Companies::find($com_id)->quotations()->where('is_collected' ,0)->first();
        $services = Services::all();
        $code = view('potentials.quotation.quotation' ,compact('services' ,'quot'))->render();
        return response(['code' => $code]);
    }
    
    public function addQuotation() {
        if(request('quot_id')){
            $quot = Quotation::find(request('quot_id'));
            $quot->update(request()->all());
            if ($quot->services) {
                foreach($quot->services as $s) {
                    @$s->delete();
                }
            }
            $services = request('services');
            $services_code = '';
            foreach($services as $k => $s) {
                if ( $s != 'Select Service' ) {
                    $ser = QuotationServices::create(['quotation_id' => $quot->id, 'service_id' => $s, 'quantity' => request('quantites')[$k]?:0 ]);
                    $services_code .= '<span class="label label-success" style="margin:2px">('. @$ser->quantity .') '.@$ser->service->name .'</span>';
                }
            }
            return response([
                'status' => 'ok' ,
                'msg' => 'Quotation Updated Successfully!' ,
                'icon' => 'success' ,
                'perc' => $this->calcPerc(request('company_id')) ,
                'id' => request('company_id') ,
                'quot_id' => $quot->id ,
                'is_collected' => $quot->is_collected ,
                'services' => $services_code ,
                'total' => $quot->total ,
                'disc' => $quot->total_offer ,
                'total_disc' => $quot->total_offer > 0 ? $quot->total - ($quot->total * $quot->total_offer)/100 : $quot->total ,
                'collect_date' => $quot->collect_date
            ]);
        } else {
            $quot = Quotation::create(request()->all());
            $services = request('services');
            $services_code = '';
            foreach($services as $k => $s) {
                if ( $s != 'Select Service' ) {
                    $ser = QuotationServices::create(['quotation_id' => $quot->id, 'service_id' => $s, 'quantity' => request('quantites')[$k]?:0 ]);
                    $services_code .= '<span class="label label-success" style="margin:2px">('. @$ser->quantity .') '.@$ser->service->name .'</span>';
                }
            }
            return response([
                'status' => 'ok' ,
                'msg' => 'Quotation Created Successfully!' ,
                'icon' => 'success' ,
                'perc' => $this->calcPerc(request('company_id')) ,
                'id' => request('company_id') ,
                'quot_id' => $quot->id ,
                'is_collected' => $quot->is_collected ,
                'services' => $services_code ,
                'total' => $quot->total ,
                'disc' => $quot->total_offer ,
                'total_disc' => $quot->total_offer > 0 ? $quot->total - ($quot->total * $quot->total_offer)/100 : $quot->total ,
                'collect_date' => $quot->collect_date
            ]);
        }
    }
    
    public function delQuotSer($ser_id) {
        $ser = QuotationServices::find($ser_id);
        $ser->delete();
        $services = '';
        $q = $ser->quotation;
        foreach(@$q->services as $s) {
            $services .= '<span class="label label-success" style="margin:2px">('. @$s->quantity .') '.@$s->service->name .'</span>';
        }
        
        return response(['status' => 'ok' ,'msg' => 'Service Deleted Successfully!' ,'icon' => 'success' ,'quot_id' => $ser->quotation_id ,'services' => $services]);
    }
    
    public function addMeetingFeedback() {
        if (request('meeting_feedback_id')) {
            $meet = MeetingFeedback::find(request('meeting_feedback_id'));
            $meet->update(request()->all());
            $key = 'Updated';
        } else {
            $meet = MeetingFeedback::create(request()->all());
            $key = 'Created';
        }
        $response = [
                'status' => 'ok',
                'msg' => 'Proposal '.$key.' Successfully!',
                'icon' => 'success',
                'id' => $meet->company_id,
                'perc' => $this->calcPerc($meet->company_id),
                'code' => $this->renderTasksTd($meet->company_id)
            ];
        return response($response);
    }
    
    public function addProposal() {
        if (request('proposal_id')) {
            $prop = Proposal::find(request('proposal_id'));
            $prop->update(request()->all());
            if($prop->selectedForms()->count() > 0) {
                foreach($prop->selectedForms as $selected_form) {
                    $selected_form->delete();
                }
            }
            foreach(request('form_ids') as $f) {
                ProposalSelectedForm::create(['form_id' => $f, 'proposal_id' => $prop->id]);
            }
            $key = 'Updated';
        } else {
            $prop = Proposal::create(request()->all());
            foreach(request('form_ids') as $f) {
                ProposalSelectedForm::create(['form_id' => $f, 'proposal_id' => $prop->id]);
            }
            $key = 'Created';
        }
        
        $response = [
                'status' => 'ok',
                'msg' => 'Proposal '.$key.' Successfully!',
                'icon' => 'success',
                'id' => request('company_id'),
                'perc' => $this->calcPerc(request('company_id')),
                'code' => $this->renderTasksTd(request('company_id'))
            ];
        return response($response);
    }
    
    private function renderCompanyTr($com_id) {
        $myPermissions = UsersController::myPermissions('potential');
        $p = Companies::find($com_id);
        $prilleges = Privlage::all();
        $levels = Levels::all();
        $manage = Management::all();
        $types = PostTypes::all();
        $techs = Technologies::all();
        $looks = LookAndFeels::all();
        $content = Content::all();
        $promotes = PromoteStatus::all();
        $feedbacks = FeedbackForms::all();
        $industries = Industries::all();
        $meeting_form_id = FeedbackForms::where('name' ,'like' ,'%Meeting%')->first()->id;
        
        return view('potentials.pop-up.company-tr' ,
                            compact('p' ,'myPermissions' ,'prilleges' ,'levels' ,
                                    'manage' ,'techs' ,'types' ,'looks' ,'content' ,'promotes' ,'feedbacks' ,'industries' ,'meeting_form_id')
                    )->render();
    }
    
    private function renderTasksTd($com_id) {
        $myPermissions = UsersController::myPermissions('potential');
        $p = Companies::find($com_id);
        $prilleges = Privlage::all();
        $levels = Levels::all();
        $manage = Management::all();
        $types = PostTypes::all();
        $techs = Technologies::all();
        $looks = LookAndFeels::all();
        $content = Content::all();
        $promotes = PromoteStatus::all();
        $feedbacks = FeedbackForms::all();
        $industries = Industries::all();
        $meeting_form_id = FeedbackForms::where('name' ,'like' ,'%Meeting%')->first()->id;
        
        return view('potentials.pop-up.tasks-td' ,
                            compact('p' ,'myPermissions' ,'prilleges' ,'levels' ,
                                    'manage' ,'techs' ,'types' ,'looks' ,'content' ,'promotes' ,'feedbacks' ,'industries' ,'meeting_form_id')
                    )->render();
    }
    
    private function calcPerc($com_id) {
        $c = Companies::find($com_id);
        $perc = 15;
        if ($c->connections()->count() > 0) {
            $perc += 15;
        }
        if ($c->feedbacks()->count() > 0) {
            $perc += 15;
        }
        if ($c->profile()->count() > 0) {
            $perc += 15;
        }
        if ($c->quotations()->count() > 0 ) {
            $perc = 100;
        }
        $c->progress = $perc;
        $c->save();
        return $c->progress.'%';
    }
    
    public function loadPopUp($key ,$com_id) {
        $p = Companies::find($com_id);
        switch ($key) {
            case 'feedbacks':
                return response(['status' => 'ok' ,'code' => view('potentials.pop-up.feedbacks.view-feedback' ,compact('p'))->render()]);
                break;
            case 'connections':
                $prilleges = Privlage::all();
                $myPermissions = UsersController::myPermissions('potential');
                return response(['status' => 'ok' ,'code' => view('potentials.pop-up.connections.connections' ,compact('p' ,'prilleges' ,'myPermissions'))->render()]);
                break;
            case 'connection':
                $prilleges = Privlage::all();
                return response(['status' => 'ok' ,'code' => view('potentials.pop-up.connections.connection' ,compact('p' ,'prilleges'))->render()]);
                break;
            case 'proposal':
                $quot = $p->quotations()->where('is_collected' ,0)->first();
                $departments = Department::where('is_proposal' ,1)->get();
                $proposal_forms = ProposalForms::all();
                return response(['status' => 'ok' ,'code' => view('potentials.pop-up.proposal' ,compact('p' ,'departments' ,'quot' ,'proposal_forms'))->render()]);
                break;
            case 'meeting-feedback':
                return response(['status' => 'ok' ,'code' => view('potentials.pop-up.meeting-feedback' ,compact('p'))->render()]);
                break;
            case 'edit-potential':
                $industries = Industries::all();
                return response(['status' => 'ok' ,'code' => view('potentials.pop-up.edit-potential' ,compact('p' ,'industries'))->render()]);
                break;
            case 'quotations':
                $quotations = $p->quotations;
                return response(['status' => 'ok' ,'code' => view('potentials.quotation.quotations' ,compact('quotations'))->render()]);
                break;
        }
    }
}



