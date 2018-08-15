@php
	$currentTask = \App\Http\Controllers\TaskManagerController::currentTask(@$task->id ,@$task->quotation_id ,@$task->service_id ,@$task->serialize_level ,@$task->q_q_s_id);
	$progress = \App\Http\Controllers\TaskManagerController::taskProgress(@$task->quotation_id ,@$task->service_id ,@$task->q_q_s_id);
@endphp
<td class="text-center">{{ @$task->id }}</td>
<td>{{ @$task->quotation->company->name }}</td>
<td>{{ @$task->service->name }}</td>
<td>{{ @$task->task->name }}</td>
<td>{{ @$task->end_date }}</td>
<td class="progress">
	<div class="progress-bar-parent">
		<div class="progress-bar-child" style="width:{{ @$progress }}%">{{ @$progress }}%</div>
	</div>
</td>
<td>
	@if($currentTask)
		<button class="btn btn-default btn-confirm" title="Task Confirm" {{ @$task->is_done == 1 ? 'disabled' : '' }}
			onclick="taskConfirm(event ,'{{ url("task-manager-confirm/".@$task->id) }}')">
			<i class="si si-check"></i>
		</button>
	@endif
	<button class="btn btn-default btn-execute" title="Execute Task" {{ @$task->is_done == 1 ? 'disabled' : '' }}
		@if(@$task->serialize_level == 1)
		@else
			{{ $currentTask ? '' : 'disabled' }}
		@endif
		onclick="loadPopUp('{{ url("task-manager-load/".@$task->task_id."/".@$task->id) }}')">
		<i class="si si-note"></i>
	</button>
	@if(@$task->executions()->where(function($q) {$q->where('type' ,'array')->orWhere('type' ,'file');})->get()->count() > 0)
		<button class="btn btn-default btn-gallery" title="Task Files Gallery" {{ @$task->is_done == 1 ? 'disabled' : '' }}
			onclick="loadPopUp('{{ url("task-manager-gallery/".@$task->id) }}')">
			<i class="si si-docs"></i>
		</button>
	@endif
	<button class="btn btn-default btn-history" title="Task History"
		onclick="loadPopUp('{{ url("task-manager-history/".@$task->id) }}')">
	    <i class="si si-feed"></i>
	</button>
</td>