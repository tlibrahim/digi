<div id="add-potentail" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add Potential</h4>
      		</div>
      		<form method="post" action="{{ url('potentials') }}">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="isverified" value="0">
					<div class="form-group">
						<label>Company Name</label>
						<input type="text" required placeholder="Company Name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Industry</label>
						<select class="form-control" name="industry_id">
							@foreach($industries as $i)
							<option value="{{ @$i->id }}">{{ @$i->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>