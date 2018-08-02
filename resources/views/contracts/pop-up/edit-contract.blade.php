      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Edit Contract</h4>
      		</div>
      		<form method="post" action="{{ url('edit-contract/'.@$cont->id) }}" enctype="multipart/form-data">
	      		<div class="modal-body">
					@csrf
					<div class="form-group">
						<label>Quotation PDF</label>
						<input type="file" name="pdf" class="form-control">
					</div>
					<div class="form-group">
						<label>Old PDF</label>
						<a class="btn btn-info" href="{{ url('storage/contracts/'.@$cont->pdf) }}" target="_blank">Show Pdf</a>
					</div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>