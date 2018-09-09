			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Create New Offer</h4>
      		</div>
      		<form method="post" action="{{ url('offers/add') }}" onsubmit="addEditOffer(event);return false">
	      		<div class="modal-body">
					@csrf
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Name</label>
							<input type="text" required placeholder="Name" name="name" class="form-control">
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Status</label>
							<select required name="status" class="form-control">
								<option value="1">Active</option>
								<option value="0">Disabled</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Type</label>
							<select required name="type" class="form-control" onchange="changeType(event)">
								<option value="Free Service">Free Service</option>
								<option value="Discount Service">Discount Service</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Description</label>
							<textarea required placeholder="Description" name="description" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Total</label>
							<input type="text" disabled placeholder="Total" name="total" class="form-control">
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Total Discount</label>
							<input type="numer" min="0" max="100" disabled placeholder="Total Discount" name="total_discount" class="form-control">
						</div>
					</div>
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Offer For Type</label>
							<select name="offer_type" class="form-control" onchange="loadPlanOrService(event)">
								<option>Select Type</option>
								<option value="plans">Plans</option>
								<option value="services">Services</option>
							</select>
						</div>
					</div>
					<div id="plans-or-services">
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


