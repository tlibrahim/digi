<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Task '{{ @$name }}' Gallery</h4>
</div>
<form>
	<div class="modal-body">
		@csrf
		@foreach(@$images as $img)
			<div class="form-group col-md-3">
				<div style="position: relative;">
					<p class="p-a" onclick="visitLink('{{ $img['file'] }}')">
						@php
							$ext = explode('.' ,$img['file'])[1];
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
							<img style="width: 100%;height: 100px" src="{{ asset('imgs/image.jpg') }}">
						@endif
					</p>
					@if(!$with_del)
						<i class="fa fa-times" onclick="deleteFile(event ,{{ $img['id'] }} ,'{{ $img['file'] }}')"></i>
					@endif
				</div>
			</div>
		@endforeach
		<div class="clearfix"></div>
		<div class="modal-footer" style="padding: 15px 0">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
		</div>
	</div>
</form>