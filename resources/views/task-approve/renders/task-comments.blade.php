<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Task '{{ @$name }}' Decline Comments</h4>
</div>
<div class="modal-body" style="max-height: 650px;overflow-y: scroll;">
	@foreach(@$comments as $com)
		<div class="col-md-12">
			<div class="col-md-6"><i class="fa fa-calendar"></i> {{ $com->created_at }}</div>
			<div class="col-md-6"><i class="fa fa-user"></i> {{ $com->user->name }}</div>
			<div class="col-md-12" style="margin-top: 5px">
				<p class="text-left"><i class="fa fa-comment"></i> {{ $com->comment }}</p>
			</div>
		</div>
		@if(!$loop->last)
		<div class="col-md-12"><hr></div>
		@endif
	@endforeach
</div>
<div class="clearfix"></div>
<div class="modal-footer">
	<button type="button" class="btn btn-danger pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
</div>