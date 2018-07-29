<?php

namespace App\Http\Controllers;

use App\Plans;
use App\PlanServices;
use App\Services;
use App\PlansHistory;
use App\PlanServicesHistory;

class PlansController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function index() {
        if ( \App\Http\Controllers\UsersController::myPermitedTrigger('plans') == 0 ) {
            return redirect('/')->with('msg' ,'You Are Not Authorized To Visit This Page');
        }
    	$plans = Plans::all();
    	return view('plans.index' ,compact('plans'));
    }

    public function renderPlans() {
        $plans = Plans::all();
        return view('plans.render-data-table' ,compact('plans'))->render();
    }

    public function renderLoaders($key ,$id = null) {
    	$services = Services::all();
    	switch ($key) {
    		case 'edit':
    			$plan = Plans::find($id);
    			$code = view('plans.pop-up.edit-plan' ,compact('services' ,'plan'))->render();
    			break;
    		default:
    			$code = view('plans.pop-up.plan' ,compact('services'))->render();
    			break;
    	}
    	return response(['code' => $code ,'status' => 'ok']);
    }

    public function renderService() {
    	$services = Services::all();
    	return response([
    		'code' => view('plans.pop-up.render-service' ,compact('services'))->render()
    	]);
    }

    public function add() {
        $plan = Plans::create(request()->all());
        if (request()->has('services')) {
            foreach(request('services') as $key => $s) {
                if ($s) {
                    PlanServices::create([
                        'plan_id' => $plan->id,
                        'service_id' => @$s,
                        'quantity' => request('quantites')[$key] ?: null
                    ]);
                }
            }
        }
        return response(['status' => 'ok' ,'code' => $this->renderPlans() ,'msg' => 'Plan Created Successfully!']);
    }

    public function delete($id) {
        $plan = Plans::find($id);

        //this part to handle history transaction
        $plan_hist = PlansHistory::create([
            'transaction' => 'delete',
            'title' => $plan->title,
            'description' => $plan->description,
            'price' => $plan->price,
            'plan_id' => $id,
            'transaction_date' => $plan->updated_at
        ]);
        //this part to handle history transaction
        
        if ($plan->services) {
            //this part to handle history transaction
            foreach($plan->services as $s) {
                PlanServicesHistory::create(['plan_history_id' => $plan_hist->id ,'service_id' => @$s->service_id ,'quantity' => @$s->quantity]);
            }
            //this part to handle history transaction

            foreach($plan->services as $s) {
                @$s->delete();
            }
        }
        $plan->delete();
        return response(['status' => 'ok' ,'code' => $this->renderPlans()]);
    }

    public function deleteService($id) {
        PlanServices::find($id)->delete();
        return response(['status' => 'ok' ,'code' => $this->renderPlans()]);
    }

    public function edit($id) {
        $plan = Plans::find($id);

        //this part to handle history transaction
        $plan_hist = PlansHistory::create([
            'transaction' => 'edit',
            'title' => $plan->title,
            'description' => $plan->description,
            'price' => $plan->price,
            'plan_id' => $id,
            'transaction_date' => $plan->updated_at
        ]);
        //this part to handle history transaction

        if ($plan->services) {
            //this part to handle history transaction
            foreach($plan->services as $s) {
                PlanServicesHistory::create(['plan_history_id' => $plan_hist->id ,'service_id' => @$s->service_id ,'quantity' => @$s->quantity]);
            }
            //this part to handle history transaction

            foreach($plan->services as $s) {
                @$s->delete();
            }
        }
        $plan->fill(request()->all());
        $plan->updated_at = date('Y-m-d H:i:s');
        $plan->save();
        if (request()->has('services')) {
            foreach(request('services') as $key => $s) {
                if ($s) {
                    PlanServices::create([
                        'plan_id' => $plan->id,
                        'service_id' => @$s,
                        'quantity' => request('quantites')[$key] ?: null
                    ]);
                }
            }
        }
        return response(['status' => 'ok' ,'code' => $this->renderPlans() ,'msg' => 'Plan Updated Successfully!']);
    }
}
