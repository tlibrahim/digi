
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
	      			@if ($loop->index != count(@$p->feedbacks) - 1)
	      			<p class="block-title s-line"></p>
	      			@endif
	      		@endforeach
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
			</div>