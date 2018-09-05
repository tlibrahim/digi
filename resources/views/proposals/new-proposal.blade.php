<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Company : '{{ @$name }}' </h4><h4> Proposal : "{{ $form->title }}"</h4>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ url('complete-proposals/add-proposal/'.$proposal->id.'/'.$form->id) }}">
	@csrf
	<div class="modal-body" style="max-height: 650px;overflow-y: scroll;">
		<div id="form-data">
			@foreach($form->inputs as $in)
				<div class="form-group">
					<label>{{ $in->input_title }}</label>
					@php
						$input_title = str_replace(' ', '_', $in->input_title);
					@endphp
					@if($in->input->type == 'input')
						{!! str_replace('input-name' ,$input_title.'[]' ,$in->input->code) !!}
					@elseif($in->input->type == 'textarea')
						{!! str_replace('input-name' ,$input_title.'[]' ,$in->input->code) !!}
					@else
						{!! str_replace('input-name' ,$input_title.'[]' ,$in->input->code) !!}
					@endif
				</div>
			@endforeach
		</div>
		@if( @$form->inputs()->where('in_add_more' ,1)->get()->count() > 0 )
			<button
				onclick="addMore('{{ url('complete-proposals/load-more-inputs/'.@$proposal->id.'/'.@$form->id) }}')"
				type="button"
				class="btn btn-warning">
				Add More
			</button>
		@endif
	</div>
	<div class="clearfix"></div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-primary pull-right">Save</button>
		<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
	</div>
</form>