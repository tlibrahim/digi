			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Create Quotation</h4>
      		</div>
      		<form method="post" action="{{ url('potentials-quotation/add') }}" onsubmit="addEditQuotation(event);return false">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="company_id" id="company-id-quotation">
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
							<label>With Contract</label>
							<select name="with_contract" class="form-control">
								<option {{ @$quot->with_contract == 0 ? 'selected' : '' }} value="0">Without Contract</option>
								<option {{ @$quot->with_contract == 1 ? 'selected' : '' }} value="1">With Contract</option>
							</select>
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