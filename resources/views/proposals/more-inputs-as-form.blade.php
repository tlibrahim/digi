			<div class="col-md-12"><hr></div>
			@foreach($inputs as $in)
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