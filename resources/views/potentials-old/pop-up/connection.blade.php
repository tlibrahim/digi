<div id="connection-{{ @$p->id }}" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' Connection</h4>
      		</div>
      		<form method="post" action="{{ url('potentials/connection/'.@$p->id) }}">
	      		<div class="modal-body">
					@csrf
					<div class="form-group" style="width:100%">
						<label>First Name</label>
						<input style="width:100%" type="text" required placeholder="First Name" value="{{ @$p->firstname }}" name="firstname" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Last Name</label>
						<input style="width:100%" type="text" required placeholder="Last Name" value="{{ @$p->lastname }}" name="lastname" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Position</label>
						<input style="width:100%" type="text" required placeholder="Position" value="{{ @$p->position }}" name="position" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Phone</label>
						<input style="width:100%" type="text" required placeholder="Phone" value="{{ @$p->phone }}" name="phone" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Email</label>
						<input style="width:100%" type="email" required placeholder="Email" value="{{ @$p->email }}" name="email" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Address</label>
						<input style="width:100%" type="text" placeholder="Address" value="{{ @$p->address }}" name="address" class="form-control">
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