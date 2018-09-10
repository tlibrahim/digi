<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Connection;
use App\ConnectionReferences;
use App\Plans;
use App\Offers;
use App\Services;
use App\FeedbackForms;
use App\ConnectionFeedbacks;

use Exception;

class ConnectionController extends Controller {
	public function index() {
		$connections = Connection::where('is_deleted' ,0)->get();
		return view('connections.index' ,compact('connections'));
	}

	public function delete($id) {
		try {
			Connection::findOrFail($id)->update(['is_deleted' => 1]);
			return response(['status' => 'ok']);
		} catch (Exception $e) {
			return response(['status' => 'error']);
		}
	}

	public function renderRelated($key ,$id = null) {
		if ($id) {
			$con = Connection::find($id);
		} else {
			$con = null;
		}
		try {
			switch ($key) {
				case 'plans':
					$plans = Plans::where('is_deleted' ,0)->get();
					$code = view('connections.renders.plans' ,compact('plans' ,'con'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
				case 'offers':
					$offers = Offers::where('is_deleted' ,0)->where('status' ,1)->get();
					$code = view('connections.renders.offers' ,compact('offers' ,'con'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
				case 'services':
					$services = Services::all();
					$code = view('connections.renders.services' ,compact('services' ,'con'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
			}
		} catch (Exception $e) {
			return response(['status' => 'error']);
		}
	}

	public function popUpLoader($key ,$id = null) {
		try {
			if ($id) {
				$con = Connection::findOrFail($id);
			}
			switch ($key) {
				case 'add':
					$refs = ConnectionReferences::all();
					$code = view('connections.pop-up.add' ,compact('refs'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
				case 'edit':
					$refs = ConnectionReferences::all();
					$code = view('connections.pop-up.edit' ,compact('refs' ,'con'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
				case 'addfeedback':
					$feedbacks = FeedbackForms::all();
					$code = view('connections.pop-up.add-feedback' ,compact('feedbacks' ,'con'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
				case 'showfeedback':
					$code = view('connections.pop-up.view-feedback' ,compact('con'))->render();
					return response(['status' => 'ok' ,'code' => $code]);
					break;
			}
		} catch (Exception $e) {
			return response(['status' => 'error']);
		}
	}

	public function postAdd() {
		$con = Connection::create(request()->all());
		return back()->with('status' ,'Connection Created Successfully!');
	}

	public function postEdit($id) {
		$con = Connection::find($id)->update(request()->all());
		return back()->with('status' ,'Connection Updated Successfully!');
	}

	public function postAddFeedback() {
		try {
			$data = request()->all();
	        $values = '';
	        foreach($data as $key => $val) {
	            if ($key != 'feedback_form_id' && $key != 'connection_id' && $key != '_token') {
	                $values .= implode(" " ,explode("_" ,$key)).' : <span>'.$val.'</span>;';
	            }
	        }
	        $data['values'] = $values;
	        ConnectionFeedbacks::create($data);
	        return response(['status' => 'ok']);
		} catch (Exception $e) {
			return response(['status' => 'error']);
		}
	}
}
