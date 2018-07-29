				<div style="position: relative;">
					<h3 class="block-title s-line"></h3>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Channel Name</label>
	                  	<div class="col-md-7">
	                    	<input class="form-control" style="width:100%" type="text" name="socials[0][name]">
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Channel Link</label>
	                  	<div class="col-md-7">
	                    	<input class="form-control" style="width:100%" type="text" name="socials[0][link]">
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Managment</label>
	                  	<div class="col-md-7">
	                    	<select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][management_id]" >
		                        @foreach($manage as $l)
		                        <option value="{{ @$l->id }}">{{ @$l->name }}</option>
		                        @endforeach
		                    </select>
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Type of Posts</label>
	                  	<div class="col-md-7">
	                    	<select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][post_type_id]" >
		                        @foreach($types as $l)
		                        <option value="{{ @$l->id }}">{{ @$l->name }}</option>
		                        @endforeach
		                    </select>
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  <label class="col-md-3 control-label">Last Campaign</label>
	                  <div class="col-md-7">
	                    <input type="text" style="width:100%" name="socials[0][campaign_link]" class="form-control" placeholder="url">
	                  </div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  <label class="col-md-3 control-label">Content</label>
	                  <div class="col-md-7">
	                    <select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][content_id]" >
	                        @foreach($content as $l)
		                        <option value="{{ @$l->id }}">{{ @$l->name }}</option>
		                        @endforeach
	                    </select>
	                  </div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  <label class="col-md-3 control-label">Promoting Status</label>
	                  <div class="col-md-7">
	                    <select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][promote_status_id]" >
	                        @foreach($promotes as $l)
		                        <option value="{{ @$l->id }}">{{ @$l->name }}</option>
		                        @endforeach
	                    </select>
	                  </div>
	                </div>
	                <i class="fa fa-times delete-in-profiling" title="Cancel Social" onclick="cancelRow(event)"></i>
	            </div>