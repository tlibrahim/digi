<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">{{ @$assign->executions()->count() > 0 ? 'Update' : '' }} Task '{{ @$task->name }}'</h4>
</div>
<form method="post" action="{{ url('task-manager-execute/'.@$task->id.'/'.@$assign_id) }}" enctype="multipart/form-data" onsubmit="return taskExecute(event)">
	<div class="modal-body">
		@csrf
		@foreach(@$task->inputs as $in)
			<div class="form-group">
				<label>{{ $in->input_title }}</label>
				@php
					$input_title = str_replace(' ', '_', $in->input_title);
					$v = @$assign->executions()->where('input' ,$input_title)->first();
				@endphp
				@if($in->input->type == 'input')
					{!! str_replace('">' ,'" value="'.($v ? $v->value : '').'">' ,str_replace('input-name' ,$input_title ,$in->input->code)) !!}
				@elseif($in->input->type == 'textarea')
					{!! str_replace('</textarea>' ,($v ? $v->value : '').'</textarea>' ,str_replace('input-name' ,$input_title ,$in->input->code)) !!}
				@else
					{!! str_replace('input-name' ,$input_title ,$in->input->code) !!}
				@endif
			</div>
		@endforeach
		<div class="modal-footer" style="padding: 15px 0">
			<button class="btn btn-primary pull-right">{{ @$task->button_title }}</button>
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
		</div>
	</div>
</form>