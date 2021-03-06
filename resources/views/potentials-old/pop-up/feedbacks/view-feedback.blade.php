<div id="viewfeedback-{{ @$p->id }}" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' View Feedback</h4>
      		</div>
	      	<div class="modal-body">
	      		@foreach(@$p->feedbacks()->orderBy('id' ,'desc')->get() as $f)
	      			<h3>{{ @$f->feedback->name }}</h3>
	      			@php
	      				$values = explode(";" ,@$f->values);
	      				foreach($values as $v) {
	      					echo '<h4>'.$v.'</h4>';
		      			}
	      			@endphp
	      			<p class="block-title s-line"></p>
	      		@endforeach
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>