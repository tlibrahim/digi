<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Task '{{ @$name }}' Gallery</h4>
</div>
<form>
	<div class="modal-body">
		@csrf
		@foreach(@$images as $img)
			<div class="form-group">
				<a style="position: relative;" href="{{ url('storage/task-manager/'.$img['file']) }}" target="_blank">
					{{ $img['file'] }}
					<i class="fa fa-times" onclick="deleteFile(event ,{{ $img['id'] }} ,'{{ $img['file'] }}')"></i>
				</a>
			</div>
		@endforeach
		<div class="modal-footer" style="padding: 15px 0">
			<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
		</div>
	</div>
</form>