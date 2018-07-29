			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Create Plan</h4>
      		</div>
      		<form method="post" action="{{ url('plans/add') }}" onsubmit="addEditPlan(event);return false">
	      		<div class="modal-body">
					@csrf
					<div class="form-group col-md-12">
						<div class="col-md-12">
							<label>Title</label>
							<input type="text" required placeholder="Title" name="title" class="form-control">
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
							<label>Price</label>
							<input type="text" required placeholder="Price" name="price" class="form-control">
						</div>
					</div>
					<div id="plan-add-services">
						<div class="form-group col-md-12" style="position: relative;">
							<div class="col-md-12">
								<label>Services</label>
							</div>
							<div class="col-md-7">
								<select required name="services[]" class="form-control">
									<option>Select Task</option>
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