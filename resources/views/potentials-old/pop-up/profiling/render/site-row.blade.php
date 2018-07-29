				<div style="position: relative;">
					<h3 class="block-title s-line"></h3>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Website</label>
	                  	<div class="col-md-7">
	                    	<input class="form-control" style="width:100%" type="text" name="websites[0][link]">
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Technology</label>
	                  	<div class="col-md-7">
	                    	<select class="form-control" style="width:100%" id="contact1-subject" name="websites[0][technology_id]" >
		                        @foreach($techs as $t)
		                        <option value="{{ @$t->id }}">{{ @$t->name }}</option>
		                        @endforeach
		                    </select>
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Look and Feel</label>
	                  	<div class="col-md-7">
		                    <select class="form-control" style="width:100%" id="contact1-subject" name="websites[0][loo_and_feel_id]" >
		                        @foreach($looks as $l)
		                        <option value="{{ @$l->id }}">{{ @$l->name }}</option>
		                        @endforeach
		                    </select>
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Content</label>
	                  	<div class="col-md-7">
	                    	<select class="form-control" style="width:100%" id="contact1-subject" name="websites[0][content_id]" >
		                        @foreach($content as $l)
		                        <option value="{{ @$l->id }}">{{ @$l->name }}</option>
		                        @endforeach
		                    </select>
	                  	</div>
	                </div>
	                <i class="fa fa-times delete-in-profiling" title="Cancel Website" onclick="cancelRow(event)"></i>
	            </div>