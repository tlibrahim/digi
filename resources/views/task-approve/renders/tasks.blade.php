<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Company '{{ @$company_name }}' Task Manager</h4>
</div>
<form style="height:700px;overflow-y:scroll;">
	<div class="modal-body">
		@foreach($tasks as $task)
			@php
				$executions = @$task->executions()->where('type' ,'data')->get();
				$gallery = @$task->executions()->where(function($q){$q->where('type' ,'file')->orWhere('type' ,'array');})->get();
			@endphp
			@if ( count($executions) > 0 )
				<div id="task-container-{{ @$task->id }}">
					<div class="col-md-12">	
						<h3>{{ @$task->task->name }} <span>@if(@$task->is_done == 1 && @$task->is_approved == 1) (Status :'APPROVED') @endif</span></h3>
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
								Gallery <i class="fa fa-picture-o"></i>
							</button>
						@endif
						<button
							type="button"
							style="margin-bottom: 10px;"
							onclick="approveTask('{{ url("task-approve-confirm/".@$task->id.'/1') }}' ,true)"
							class="btn btn-success">
							Approve <i class="fa fa-check"></i>
						</button>
						<button
							type="button"
							style="margin-bottom: 10px;"
							onclick="approveTask('{{ url("task-approve-confirm/".@$task->id.'/0') }}' ,false)"
							class="btn btn-warning">
							Decline <i class="fa fa-times"></i>
						</button>
						@if( @$task->comments()->count() > 0 )
							<button
								type="button"
								style="margin-bottom: 10px;"
								onclick="loadComments('{{ url("task-approve-load-comments/".@$task->id) }}')"
								class="btn btn-info">
								<i class="fa fa-comments"></i>
							</button>
						@endif
					</div>
					@if(!$loop->last)
					<div class="col-md-12"><hr></div>
					@endif
				</div>
			@endif
		@endforeach
	</div>
</form>
<div class="clearfix"></div>
<div class="modal-footer">
	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
</div>