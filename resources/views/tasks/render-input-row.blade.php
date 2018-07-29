						<div style="position: relative;" class="col-md-12">
							<div class="col-md-6">
								<div class="form-group">
									<label>Input Title :</label>
									<input type="text" name="inputs[]" class="form-control" placeholder="Input Title">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Input Type :</label>
									<select class="form-control" name="inputnames[]">
										<option>Select One</option>
										@foreach($inputs as $in)
										<option value="{{ $in->id }}">{{ $in->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<i class="fa fa-times" onclick="removeInputRow(event)"></i>
						</div>