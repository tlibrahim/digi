<!--<div id="edit-potentail-{{ @$p->id }}" class="modal fade" role="dialog">-->
<!--  	<div class="modal-dialog">-->
<!--    	<div class="modal-content">-->
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add Potential</h4>
      		</div>
      		<form method="post" action="{{ url('potentials/'.$p->id) }}" onsubmit="postEditPotential(event);return false">
	      		<div class="modal-body">
					@csrf
					<input name="_method" type="hidden" value="PUT">
					<div class="form-group" style="width: 100%">
						<label>Company Name</label>
						<input type="text" style="width: 100%" required placeholder="Company Name" value="{{ $p->name }}" name="name" class="form-control">
					</div>
					<div class="form-group" style="width: 100%">
						<label>Industry</label>
						<select class="form-control" name="industry_id" style="width: 100%">
							@foreach($industries as $i)
							<option {{ $i->id == $p->industry_id ? 'selected' : '' }} value="{{ @$i->id }}">{{ @$i->name }}</option>
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