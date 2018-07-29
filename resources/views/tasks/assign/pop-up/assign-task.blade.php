			<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Assign Task</h4>
      		</div>
      		<form method="post" action="{{ url('task-assign/add') }}">
	      		<div class="modal-body">
					@csrf
					<div class="form-group">
						<label>Title</label>
						<input type="text" required placeholder="Title" name="title" class="form-control">
					</div>
					<div class="form-group">
						<label>Description</label>
						<textarea required placeholder="Description" name="description" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<label>User</label>
						<select required name="user_id" class="form-control">
							<option>Select User</option>
							@foreach($users as $u)
							<option value="{{ @$u->id }}">{{ @$u->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Task</label>
						<select required name="task_id" class="form-control">
							<option>Select Task</option>
							@foreach($tasks as $t)
							<option value="{{ @$t->id }}">{{ @$t->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Client Plan</label>
						<select required name="client_plan_id" class="form-control">
							<option>Select Plan</option>
							<option value="1">Plan One</option>
							<option value="2">Plan Tow</option>
							<option value="3">Plan Three</option>
							<option value="4">Plan Four</option>
						</select>
					</div>
					<div class="form-group">
						<label>Task Deadline</label>
						<div class="input-group">
		                  	<div class="input-group-addon">
		                    	<i class="fa fa-calendar"></i>
		                  	</div>
		                  	<input name="end_date" type="text" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
		                </div>
					</div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>