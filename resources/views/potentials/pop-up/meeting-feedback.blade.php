<!--<div id="add-meeting-{{ @$p->id }}" class="modal fade" role="dialog">-->
<!--  	<div class="modal-dialog">-->
<!--    	<div class="modal-content">-->
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add Meeting Feedback</h4>
      		</div>
      		<form method="post" action="{{ url('potentials-add-meeting-feedback') }}" onsubmit="postMeetingFeedback(event); return false">
	      		<div class="modal-body">
					@csrf
					<input type="hidden" name="company_id" value="{{ @$p->id }}"/>
					<input type="hidden" name="meeting_feedback_id" value="{{ @$p->meeting->id }}"/>
                    <div class="form-group" style="width:100%">
                        <label>Type</label>
                        <select style="width:100%" class="form-control" name="type">
                            <option {{ @$p->meeting->type == 'Proposal' ? 'selected' : '' }} value="Proposal">Proposal</option>
                            <option {{ @$p->meeting->type == 'Quotation' ? 'selected' : '' }} value="Quotation">Quotation</option>
                        </select>
                    </div>
                    <div class="form-group" style="width:100%">
                        <label>Date / Time</label>
                        <input style="width:100%" class="form-control date_time" name="date_time" value="{{ @$p->meeting->date_time }}"/>
                    </div>
					<div class="form-group" style="width:100%">
                        <label>Notes</label>
                        <textarea style="width:100%" class="form-control" name="notes">{{ @$p->meeting->notes }}</textarea>
                    </div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>
<!--		</div>-->
<!--	</div>-->
<!--</div>-->