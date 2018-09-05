<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Company : '{{ @$name }}'</h4>
	<h4>Proposal : "{{ $form->title }}" Gallery</h4>
</div>
<form>
	<div class="modal-body">
		@csrf
		@foreach(@$images as $img)
			<div class="form-group col-md-3">
				<div style="position: relative;">
					<p class="p-a" onclick="visitLink('{{ $img->value }}')">
						@php
							$extension = explode('.' ,$img['file']);
							$ext = $extension[count($extension) - 1];
						@endphp
						@if($ext == 'ai')
							<img style="width: 100%;height: 100px" src="{{ asset('imgs/ai.jpg') }}">
						@elseif($ext == 'psd')
							<img style="width: 100%;height: 100px" src="{{ asset('imgs/psd.png') }}">
						@elseif($ext == 'mp3')
							<img style="width: 100%;height: 100px" src="{{ asset('imgs/mp3.png') }}">
						@elseif($ext == 'mp4')
							<img style="width: 100%;height: 100px" src="{{ asset('imgs/mp4.jpg') }}">
						@elseif($ext == 'pdf')
							<img style="width: 100%;height: 100px" src="{{ asset('imgs/pdf.png') }}">
						@else
							<img style="width: 100%;" src="{{ $img->value }}">
						@endif
					</p>
				</div>
			</div>
		@endforeach
		<div class="clearfix"></div>
		<div class="modal-footer" style="padding: 15px 0">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
		</div>
	</div>
</form>