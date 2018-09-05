<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Company : '{{ @$name }}' </h4><h4> Proposal : "{{ $form->title }}"</h4>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ url('complete-proposals/add-proposal/'.$proposal->id.'/'.$form->id) }}">
	@csrf
	<div class="modal-body" style="max-height: 650px;overflow-y: scroll;">
		<div id="form-data">
			@foreach($proposal->proposal_data()->where('form_id' ,@$form->id)->orderBy('data_index' ,'asc')->orderBy('input' ,'asc')->get() as $key => $in)
				<div class="form-group">
					@php
						$form_title = str_replace('_', ' ', $in->input);
						$input_title = $in->input;
						$v = @$proposal->proposal_data()->where('input' ,$input_title)->where('data_index' ,$in->data_index)->first();
						$form_input = $in->form->inputs()->where('input_title' ,$form_title)->first();
						$type = $form_input->input->type;
					@endphp
					<label>{{ $form_title }}</label>
					@if($type == 'input')
						{!! str_replace('">' ,'" value="'.@$v->value.'">' , str_replace('input-name' ,$input_title.'[]' ,$form_input->input->code) ) !!}
					@elseif($type == 'textarea')
						{!! str_replace('</textarea>' ,($v ? $v->value : '').'</textarea>' , str_replace('input-name' ,$input_title.'[]' ,$form_input->input->code) ) !!}
					@else
						{!! str_replace('input-name' ,$input_title.'[]' ,$form_input->input->code) !!}
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
		@if( @$proposal->proposal_data()->where('type' ,'file')->where('form_id' ,@$form->id)->get()->count() > 0 )
			<button
				onclick="loadGallery('{{ url('complete-proposals/load-gallery/'.@$proposal->id.'/'.@$form->id) }}')"
				type="button"
				class="btn btn-info pull-right"
				style="margin-right: 5px">
				Gallery
			</button>
		@endif
		<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
	</div>
</form>