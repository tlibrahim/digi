
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add Contract To '{{ $name }}'</h4>
      		</div>
      		<form method="post" action="{{ url('add-contract') }}" enctype="multipart/form-data">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="quotation_id" value="{{ $quotation_id }}">
					<div class="form-group">
						<label>Quotation PDF</label>
						<input type="file" required name="pdf" class="form-control">
					</div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>