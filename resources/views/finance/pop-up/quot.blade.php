			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Quotation</h4>
      		</div>
      		<form method="post" action="{{ url('potentials-quotation/add') }}" onsubmit="addEditQuotation(event);return false">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="company_id" value="{{ @$quot->company->id }}">
					<input type="hidden" name="quot_id" value="{{ @$quot->id }}">
					<div id="plan-add-services">
					    @if(@$quot->services)
					        @foreach(@$quot->services as $s)
        						<div class="form-group col-md-12" style="position: relative;">
        							<div class="col-md-12">
        								<label>Services</label>
        							</div>
        							<div class="col-md-7">
        								<select required name="services[]" class="form-control">
        									<option>Select Service</option>
        									@foreach($services as $t)
        									<option {{ @$s->service_id == @$t->id ? 'selected' : '' }} value="{{ @$t->id }}">{{ @$t->name }}</option>
        									@endforeach
        								</select>
        							</div>
        							<div class="col-md-5">
        								<input type="number" min="0" name="quantites[]" placeholder="Quantity" class="form-control" value="{{ @$s->quantity }}">
        							</div>
        							<i class="fa fa-times" onclick="cancelService(event ,{{ @$s->id }})"></i>
        						</div>
					        @endforeach
					    @endif
						<div class="form-group col-md-12" style="position: relative;">
							<div class="col-md-12">
								<label>Services</label>
							</div>
							<div class="col-md-7">
								<select required name="services[]" class="form-control">
									<option>Select Service</option>
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
							<button type="button" class="btn btn-info" onclick="addService()">Add Service</button>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Total Price</label>
							<input name="total" class="form-control" placeholder="Total Price" value="{{ @$quot->total }}"/>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Total Offer 'percentage'</label>
							<input type="number" min="0" max="100" name="total_offer" class="form-control" placeholder="Total Offer" value="{{ @$quot->total_offer }}"/>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Money Collect</label>
							<select name="is_collected" class="form-control">
								<option {{ @$quot->is_collected == 0 ? 'selected' : '' }} value="0">Not Collected</option>
								<option {{ @$quot->is_collected == 1 ? 'selected' : '' }} value="1">Collected</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Collect Date</label>
							<input class="form-control date" name="collect_date" value="{{ @$quot->collect_date }}"/>
						</div>
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