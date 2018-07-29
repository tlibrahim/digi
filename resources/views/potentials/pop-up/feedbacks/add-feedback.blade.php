<!--<div id="addfeedback-{{ @$p->id }}" class="modal fade" role="dialog">-->
<!--  	<div class="modal-dialog">-->
<!--    	<div class="modal-content">-->
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' Add Feedback</h4>
      		</div>
      		<form action="{{ url('potentials/addfeedback/'.@$p->id) }}" method="post" onsubmit="postAddFeedback(event);return false">
      			@csrf
      			<input type="hidden" name="potential_id" value="{{ @$p->id }}">
      			<input type="hidden" name="feedback_form_id" id="feedback-id-{{ @$p->id }}">
	      		<div class="modal-body">
	      			<div class="form-group" style="width: 100%">
	      				<label>Choose Feedback</label>
	      				<select style="width: 100%" class="form-control" onchange="loadFeedbackForm(event ,{{ @$p->id }})">
	      					<option>Choose Feedback</option>
	      					@foreach($feedbacks as $f)
	      					<option value="{{ @$f->id }}">{{ @$f->name }}</option>
	      					@endforeach
	      				</select>
	      			</div>
	      			<div class="form-loaded-body"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
					<button type="submit" style="display: none" class="btn btn-primary pull-right">Save</button>
				</div>
			</form>
<!--		</div>-->
<!--	</div>-->
<!--</div>-->