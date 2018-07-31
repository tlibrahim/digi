<!--<div id="add-proposal-{{ @$p->id }}" class="modal fade" role="dialog">-->
<!--  	<div class="modal-dialog">-->
<!--    	<div class="modal-content">-->
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">Add Proposal</h4>
      		</div>
      		<form method="post" action="{{ url('potentials-add-proposal') }}" onsubmit="postProposal(event);return false">
	      		<div class="modal-body">
					    @csrf
					    <input type="hidden" name="company_id" value="{{ @$p->id }}"/>
					    <input type="hidden" name="proposal_id" value="{{ @$p->proposal->id }}"/>
              <div class="form-group" style="width:100%">
                <label>Type</label>
                <select style="width:100%" class="form-control" name="departement_id">
                  @foreach($departments as $d)
                  <option {{ @$p->proposal->departement_id == @$d->id ? 'selected' : '' }} value="{{ @$d->id }}">{{ @$d->name }}</option>
                  @endforeach
                </select>
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