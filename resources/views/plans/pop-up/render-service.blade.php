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