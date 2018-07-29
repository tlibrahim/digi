<!--<div id="add-connection-{{ @$p->id }}" class="modal fade" role="dialog">-->
<!--  	<div class="modal-dialog">-->
<!--    	<div class="modal-content">-->
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' Add Connection</h4>
      		</div>
      		<form method="post" action="{{ url('potentials/connection/'.@$p->id.'/add') }}" onsubmit="postAddConnection(event);return false">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="password">
					<input type="hidden" name="company_id" value="{{ @$p->id }}">
					<div class="form-group" style="width:100%">
						<label>Name</label>
						<input style="width:100%" type="text" placeholder="Name" name="name" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Phone</label>
						<input style="width:100%" type="text" placeholder="Phone" name="phone" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Email</label>
						<input style="width:100%" type="email" placeholder="Email" name="email" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>privillege</label>
						<select style="width:100%" name="privlage_id" class="form-control">
						    <option>Select One</option>
						    @foreach($prilleges as $p)
						    <option value="{{ @$p->id }}">{{ @$p->name }}</option>
						    @endforeach
						</select>
					</div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>
<!--		</div>-->
<!--	</div>-->
<!--</div>-->