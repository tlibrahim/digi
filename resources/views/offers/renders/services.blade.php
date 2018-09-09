<div id="offer-services">
	@if($offer)
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
				<i class="fa fa-times" onclick="cancelService(event ,{{ @$service->id }})"></i>
			</div>
		@endforeach
	@endif
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
@if($is_add_more)
<div class="form-group col-md-12">
	<div class="col-md-12">
		<button type="button" class="btn btn-info" onclick="addMoreService()">Add More</button>
	</div>
</div>
@endif