<div id="assign-potential-{{ @$p->id }}" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' Assign To User</h4>
      		</div>
      		<form method="post" action="{{ url('potentials/assign/'.@$p->id) }}">
	      		<div class="modal-body">
					@csrf
					<div class="form-group" style="width:100%">
						<label>Choose user</label>
						<select style="width:100%" required name="user_id" class="form-control">
							<option>Choose User</option>
							@foreach($users as $u)
							<option {{ @$u->id == @$p->user_id ? 'selected' : '' }} value="{{ @$u->id }}">{{ @$u->name }}</option>
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