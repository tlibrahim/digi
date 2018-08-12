<td class="text-center">{{ @$task->id }}</td>
<td>{{ @$task->quotation->company->name }}</td>
<td>{{ @$task->service->name }}</td>
<td>{{ @$task->task->name }}</td>
<td>{{ @$task->end_date }}</td>
<td>
	@if(@$task->is_done == 0)
		@php
	    	$currentTask = \App\Http\Controllers\TaskManagerController::currentTask(@$task->id ,@$task->quotation_id ,@$task->service_id ,@$task->serialize_level);
	    @endphp
	    @if($currentTask)
			<button class="btn btn-default" title="Task Confirm"
			    onclick="taskConfirm('{{ url("task-manager-confirm/".@$task->id) }}')">
				<i class="si si-check"></i>
			</button>
		@endif
		<button class="btn btn-default" title="Execute Task"
		    @if(@$task->serialize_level == 1)
		    @else
		    	{{ $currentTask ? '' : 'disabled' }}
		    @endif
		    onclick="loadPopUp('{{ url("task-manager-load/".@$task->task_id."/".@$task->id) }}')">
			<i class="si si-note"></i>
		</button>
	@endif
	@if(@$task->executions()->where(function($q) {$q->where('type' ,'array')->orWhere('type' ,'file');})->get()->count() > 0)
		<button class="btn btn-default" title="Task Files Gallery"
			onclick="loadPopUp('{{ url("task-manager-gallery/".@$task->id) }}')">
			<i class="si si-docs"></i>
		</button>
	@endif
	<button class="btn btn-default" title="Task History"
	    onclick="loadPopUp('{{ url("task-manager-history/".@$task->task_id."/".@$task->id) }}')">
		<i class="si si-feed"></i>
	</button>
</td>