<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Offers;
use App\OfferPlans;
use App\OfferServices;
use App\OffersHistory;
use App\OfferPlansHistory;
use App\OfferServicesHistory;
use App\Plans;
use App\Services;

use Exception;

class OffersController extends Controller
{
    public function index() {
    	$offers = Offers::where('is_deleted' ,0)->get();
    	return view('offers.index' ,compact('offers'));
    }

    public function loadOffer($id = null) {
    	try {
	    	if (!$id) {
	    		$code = view('offers.pop-up.add')->render();
	    		return response(['status' => 'ok' ,'code' => $code]);
	    	} else {
	    		$offer = Offers::findOrFail($id);
	    		$code = view('offers.pop-up.edit' ,compact('offer'))->render();
	    		return response(['status' => 'ok' ,'code' => $code]);
	    	}
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function renderPlanOrServices($type ,$offer_id = null) {
    	$offer_plans = [];
    	$offer = null;
    	if ($offer_id) {
    		try {
    			$offer = Offers::findOrFail($offer_id);
    			$offer_plans = $offer->plans()->pluck('plan_id')->toArray();
    		} catch (Exception $e) {
    			return response(['status' => 'error']);
    		}
    	}
    	try {
	    	if ($type == 'plans') {
	    		$plans = Plans::where('status' ,1)->where('is_deleted' ,0)->get();
	    		return response(['status' => 'ok' ,'code' => view('offers.renders.plan' ,compact('plans' ,'offer_plans'))->render()]);
	    	} else {
	    		$services = Services::all();
	    		$is_add_more = true;
	    		return response(['status' => 'ok' ,'code' => view('offers.renders.services' ,compact('services' ,'is_add_more' ,'offer'))->render()]);
	    	}
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function moreServices() {
    	try {
	    	$services = Services::all();
	    	$is_add_more = false;
	    	$offer = null;
	    	return response(['status' => 'ok' ,'code' => view('offers.renders.services' ,compact('services' ,'is_add_more' ,'offer'))->render()]);
	    } catch (Exception $e) {
	    	return response(['status' => 'error']);
	    }
    }

    public function statusChange($id) {
        try {
            $offer = Offers::findOrFail($id);
            $msg = $offer->status == 1 ? 'Offer  Disabled' : 'Offer Activated';
            $icon = $offer->status == 1 ? 'warning' : 'success';
            $offer->update(['status' => $offer->status == 1 ? 0 : 1]);
            return response(['status' => 'ok' ,'msg' => $msg ,'icon' => $icon]);
        } catch (Exception $e) {
            return response(['status' => 'error']);
        }
    }

    public function add() {
    	try {
	    	$offer = Offers::create(request()->all());
	    	if ( request('offer_type') == 'plans' ) {
		    	foreach(request('plans') as $p) {
		    		try {
		    			OfferPlans::create(['offer_id' => $offer->id ,'plan_id' => $p]);
		    		} catch (Exception $e) {
				    	echo 'no plan(s) selected';
				    }
		    	}
		    	
	    	} else {
	    		foreach(request('services') as $key => $ser_id) {
	    			try {
		    			OfferServices::create(['offer_id' => $offer->id ,'service_id' => $ser_id ,'quantity' => request('quantites')[$key] ?:0]);
			    	} catch (Exception $e) {
			    		echo 'no service(s) selected';
			    	}
			    }
	    	}
	    	return response(['status' => 'ok' ,'msg' => 'Offer Created Successfully!' ,'icon' => 'success']);
	    } catch (Exception $e) {
            return response(['status' => 'error']);
        }
    }

    public function edit($id) {
    	try {
    		//this part of code to get the current values of offer object then store to history
    		$data = Offers::findOrFail($id)->toArray();
    		$data['offer_id'] = $id;
    		unset($data['id']);
    		OffersHistory::create($data);
    		//end of history part

    		$offer = Offers::findOrFail($id);
    		$offer->update(request()->all());

    		//this 2 loops to store plans & services for this object to histroy then delete from original table
    		foreach($offer->plans as $plan) {
    			OfferPlansHistory::create(['offer_id' => $id ,'plan_id' => @$plan->plan_id]);
    			$plan->delete();
    		}
    		foreach($offer->services as $service) {
    			OfferServicesHistory::create(['offer_id' => $id ,'service_id' => @$service->service_id ,'quantity' => @$service->quantity]);
    			$service->delete();
    		}
    		//end fo plans & services history

    		//this area to handle incomd=e request for plans & services to store in it's original tables
    		if ( request('offer_type') == 'plans' ) {
		    	foreach(request('plans') as $p) {
		    		try {
		    			OfferPlans::create(['offer_id' => $offer->id ,'plan_id' => $p]);
		    		} catch (Exception $e) {
				    	echo 'no plan(s) selected';
				    }
		    	}
		    	
	    	} else {
	    		foreach(request('services') as $key => $ser_id) {
	    			try {
		    			OfferServices::create(['offer_id' => $offer->id ,'service_id' => $ser_id ,'quantity' => request('quantites')[$key] ?:0]);
			    	} catch (Exception $e) {
			    		echo 'no service(s) selected';
			    	}
			    }
	    	}
	    	//end

    		return response(['status' => 'ok' ,'msg' => 'Offer Updated Successfully!' ,'icon' => 'success']);
    	} catch (Exception $e) {
    		return response(['status' => 'error']);
    	}
    }

    public function delete($id) {
    	try {
    		Offers::findOrFail($id)->update(['is_deleted' => 1]);
    		return response(['status' => 'ok' ,'msg' => 'Offer Deleted Successfully!' ,'icon' => 'success']);
    	} catch (Exception $e) {
            return response(['status' => 'error']);
        }
    }
}


