<div class="form-group col-md-12">
	<div class="col-md-12">
		<label>Plans</label>
	</div>
	<div class="col-md-12">
		<select required name="plans[]" multiple class="form-control select2">
			@foreach($plans as $plan)
				<option value="{{ @$plan->id }}">{{ @$plan->title }}</option>
			@endforeach
		</select>
	</div>
</div>