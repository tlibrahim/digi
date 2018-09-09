			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Edit {{ @$offer->name }} Offer</h4>
      		</div>
      		<form method="post" action="{{ url('offers/edit/'.@$offer->id) }}" onsubmit="addEditOffer(event);return false">
	      		<div class="modal-body">
					@csrf
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Name</label>
							<input type="text" required placeholder="Name" name="name" class="form-control" value="{{ @$offer->name }}">
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Status</label>
							<select required name="status" class="form-control">
								<option {{ @$offer->status == 1 ? 'selected' : '' }} value="1">Active</option>
								<option {{ @$offer->status == 0 ? 'selected' : '' }} value="0">Disabled</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Type</label>
							<select required name="type" class="form-control" onchange="changeType(event)">
								<option {{ @$offer->type == 'Free Service' ? 'selected' : '' }} value="Free Service">Free Service</option>
								<option {{ @$offer->type == 'Discount Service' ? 'selected' : '' }} value="Discount Service">Discount Service</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Description</label>
							<textarea required placeholder="Description" name="description" class="form-control">{{ @$offer->description }}</textarea>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Total</label>
							<input type="text" disabled placeholder="Total" name="total" class="form-control" value="{{ @$offer->total }}">
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Total Discount</label>
							<input type="numer" min="0" max="100" disabled placeholder="Total Discount" name="total_discount" class="form-control" value="{{ @$offer->total_discount }}">
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Offer For Type</label>
							<select name="offer_type" class="form-control" onchange="loadPlanOrService(event ,'{{ @$offer->id }}')">
								<option>Select Type</option>
								<option {{ @$offer->offer_type == 'plans' ? 'selected' : '' }} value="plans">Plans</option>
								<option {{ @$offer->offer_type == 'services' ? 'selected' : '' }} value="services">Services</option>
							</select>
						</div>
					</div>
					<div id="plans-or-services">
						@if(@$offer->offer_type == 'plans')
							@php
								$plans = \App\Plans::where('is_deleted' ,0)->where('status' ,1)->get();
								$offer_plans = @$offer->plans()->pluck('plan_id')->toArray();
							@endphp
							<div class="form-group col-md-12">
								<div class="col-md-12">
									<label>Plans</label>
								</div>
								<div class="col-md-12">
									<select required name="plans[]" multiple class="form-control select2" style="width: 100%">
										@foreach($plans as $plan)
											<option {{ in_array(@$plan->id ,$offer_plans) ? 'selected' : '' }} value="{{ @$plan->id }}">{{ @$plan->title }}</option>
										@endforeach
									</select>
								</div>
							</div>
						@else
							@php
								$services = \App\Services::all();
								$offer_services = @$offer->services()->pluck('service_id')->toArray();
							@endphp
							<div id="offer-services">
								@foreach(@$offer->services as $service)
									<div class="form-group col-md-12" style="position: relative;">
										<div class="col-md-12">
											<label>Services</label>
										</div>
										<div class="col-md-7">
											<select required name="services[]" class="form-control">
												@foreach($services as $t)
													<option {{ @$service->service_id == @$t->id ? 'selected' : '' }} value="{{ @$t->id }}">{{ @$t->name }}</option>
												@endforeach
											</select>
										</div>
										<div class="col-md-5">
											<input value="{{ @$service->quantity }}" type="number" min="0" name="quantites[]" placeholder="Quantity" class="form-control">
										</div>
										<i class="fa fa-times" onclick="cancelService(event)"></i>
									</div>
								@endforeach
								<div class="form-group col-md-12" style="position: relative;">
									<div class="col-md-12">
										<label>Services</label>
									</div>
									<div class="col-md-7">
										<select required name="services[]" class="form-control">
											@foreach($services as $t)
												<option value="{{ @$t->id }}">{{ @$t->name }}</option>
											@endforeach
										</select>
									</div>
									<div class="col-md-5">
										<input type="number" min="0" name="quantites[]" placeholder="Quantity" class="form-control">
									</div>
									<i class="fa fa-times" onclick="cancelService(event)"></i>
								</div>
							</div>
							<div class="form-group col-md-12">
								<div class="col-md-12">
									<button type="button" class="btn btn-info" onclick="addMoreService()">Add More</button>
								</div>
							</div>
						@endif
					</div>
					<div class="clearfix"></div>
					<div class="col-md-12">
						<div class="clearfix"></div>
						<div class="modal-footer" style="padding: 15px 0">
							<div class="col-md-12">
								<button class="btn btn-primary pull-right">Save</button>
					        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					        </div>
						</div>
					</div>
				</div>
			</form>


