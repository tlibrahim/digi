<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Add New Connection</h4>
</div>
<form style="height:600px;overflow-y:scroll;" method="POST" action="{{ url('connections/add') }}">
	@csrf
	<div class="modal-body">
		<div class="form-group">
			<label>Name</label>
			<input required type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Company Name</label>
			<input required type="text" name="company_name" class="form-control">
		</div>
		<div class="form-group">
			<label>Position</label>
			<input required type="text" name="position" class="form-control">
		</div>
		<div class="form-group">
			<label>Phone</label>
			<input required type="text" name="phone" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input required type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Connection Reference</label>
			<select required name="connection_reference_id" class="form-control">
				@foreach($refs as $r)
					<option value="{{ @$r->id }}">{{ @$r->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Related To</label>
			<select name="related_type" class="form-control" onchange="changeRelatedType(event)">
				<option value="">Select One</option>
				<option value="plans">Plans</option>
				<option value="offers">Offers</option>
				<option value="services">Services</option>
			</select>
		</div>
		<div id="related-type-div" class="form-group"></div>
		<div class="clearfix"></div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary pull-right" style="margin-bottom: 15px;">Save</button>
		</div>
	</div>
</form>
<div class="clearfix"></div>
<div class="modal-footer">
	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
</div>