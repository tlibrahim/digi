
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' Show Connections</h4>
      		</div>
      		@foreach(@$p->connections()->orderBy('id' ,'desc')->get() as $c)
      		<div class="clearfix"></div>
      		<form method="post" action="{{ url('potentials/connection/'.@$p->id.'/edit'.'/'.@$c->id) }}" onsubmit="return editConnection(event);return false">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="company_id" value="{{ @$p->id }}">
					<div class="form-group" style="width:100%">
						<label> Name</label>
						<input style="width:100%" type="text" value="{{ @$c->name }}" placeholder=" Name" name="name" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Phone</label>
						<input style="width:100%" type="text" value="{{ @$c->phone }}" placeholder="Phone" name="phone" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>Email</label>
						<input style="width:100%" type="email" value="{{ @$c->email }}" placeholder="Email" name="email" class="form-control">
					</div>
					<div class="form-group" style="width:100%">
						<label>privillege</label>
						<select style="width:100%" name="privlage_id" class="form-control">
						    <option>Select One</option>
						    @foreach($prilleges as $p)
						    <option {{ @$c->privlage_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
						    @endforeach
						</select>
					</div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<a onclick="deleteConnection({{ @$c->id }} ,event)" class="btn btn-danger pull-left" style="margin-left: 0">Delete</a>
					</div>
				</div>
			</form>
			@endforeach
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>