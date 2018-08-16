<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Service '{{ @$service_name }}' For Company '{{ @$company_name }}' History</h4>
</div>
<form style="max-height:700px;overflow-y:scroll;">
	<div class="modal-body">
		@if(count($tasks) > 0)
			@foreach($tasks as $task)
				@php
					$executions = @$task->executions()->where('type' ,'data')->get();
					$gallery = @$task->executions()->where(function($q){$q->where('type' ,'file')->orWhere('type' ,'array');})->get();
				@endphp
				@if ( count($executions) > 0 )
					<div class="col-md-12">	
						<h3>{{ @$task->task->name }}</h3>
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<td width="50%"><h4>Task Input</h4></td>
									<td width="50%"><h4>Task Value</h4></td>
								</tr>
							</thead>
							<tbody>
								@foreach($executions as $exec)
									<tr>
										<td style="font-weight: bold">{{ str_replace('_' ,' ' ,@$exec->input) }}</td>
										<td>{{ @$exec->value }}</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						@if( count($gallery) > 0 )
							<button
								type="button"
								style="margin-bottom: 10px;"
								onclick="loadGallery('{{ url("task-manager-gallery/".@$task->id.'/yes') }}')"
								class="btn btn-primary">
								Load Gallery
							</button>
						@endif
					</div>
					@if(!$loop->last)
					<div class="col-md-12"><hr></div>
					@endif
				@endif
			@endforeach
		@else
			<div class="col-md-12">
				<div class="alert alert-warning">
				  	<strong>Warning!</strong> There's no history for this task.
				</div>
			</div>
		@endif
	</div>
</form>
<div class="clearfix"></div>
<div class="modal-footer">
	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
</div>