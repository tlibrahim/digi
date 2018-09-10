<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Edit Connection '{{ @$con->name }}'</h4>
</div>
<form style="height:600px;overflow-y:scroll;" method="POST" action="{{ url('connections/edit/'.@$con->id) }}">
	@csrf
	<div class="modal-body">
		<div class="form-group">
			<label>Name</label>
			<input value="{{ @$con->name }}" required type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>Company Name</label>
			<input value="{{ @$con->company_name }}" required type="text" name="company_name" class="form-control">
		</div>
		<div class="form-group">
			<label>Position</label>
			<input value="{{ @$con->position }}" required type="text" name="position" class="form-control">
		</div>
		<div class="form-group">
			<label>Phone</label>
			<input value="{{ @$con->phone }}" required type="text" name="phone" class="form-control">
		</div>
		<div class="form-group">
			<label>Email</label>
			<input value="{{ @$con->email }}" required type="email" name="email" class="form-control">
		</div>
		<div class="form-group">
			<label>Connection Reference</label>
			<select required name="connection_reference_id" class="form-control">
				@foreach($refs as $r)
					<option {{ @$con->connection_reference_id == @$r->id ? 'selected' : '' }} value="{{ @$r->id }}">{{ @$r->name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group">
			<label>Related To</label>
			<select name="related_type" class="form-control" onchange="changeRelatedType(event ,'{{ @$con->id }}')">
				<option value="">Select One</option>
				<option {{ @$con->related_type == 'plans' ? 'selected' : '' }} value="plans">Plans</option>
				<option {{ @$con->related_type == 'offers' ? 'selected' : '' }} value="offers">Offers</option>
				<option {{ @$con->related_type == 'services' ? 'selected' : '' }} value="services">Services</option>
			</select>
		</div>
		<div id="related-type-div" class="form-group">
			@if(@$con->related_type == 'plans')
				@php
					$plans = \App\Plans::where('is_deleted' ,0)->get();
				@endphp
				<div class="form-group">
					<label>Plans</label>
					<select class="form-control select2" name="related_type_id">
						@foreach($plans as $p)
							<option {{ @$con->related_type_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->title }}</option>
						@endforeach
					</select>
				</div>
			@elseif(@$con->related_type == 'offers')
				@php
					$offers = \App\Offers::where('is_deleted' ,0)->where('status' ,1)->get();
				@endphp
				<div class="form-group">
					<label>Offers</label>
					<select class="form-control select2" name="related_type_id">
						@foreach($offers as $p)
							<option {{ @$con->related_type_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
						@endforeach
					</select>
				</div>
			@elseif(@$con->related_type == 'services')
				@php
					$services = \App\Services::all();
				@endphp
				<div class="form-group">
					<label>Services</label>
					<select class="form-control select2" name="related_type_id">
						@foreach($services as $p)
							<option {{ @$con->related_type_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
						@endforeach
					</select>
				</div>
			@endif
		</div>
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