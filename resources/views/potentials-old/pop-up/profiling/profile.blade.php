<div id="profiling-{{ @$p->id }}" class="modal fade" role="dialog">
  	<div class="modal-dialog" style="width: 75%">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' Profiling</h4>
      		</div>
      		<form method="post" action="{{ url('potentials/profiling/'.@$p->id) }}" enctype="multipart/form-data"
      				onsubmit="editProfiling(event ,{{ @$p->profile->id }});return false;">
	      		<div class="modal-body">
					@csrf
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Logo</label>
	                  	<div class="col-md-7">
	                    	<input class="form-control" style="width:100%" type="file" name="logo">
	                  	</div>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Introduction</label>
	                  	<div class="col-md-7">
	                    	<textarea class="form-control" style="width:100%" type="text" name="intro">{{ @$p->profile->intro }}</textarea>
	                  	</div>
	                </div>
	                <div style="position: relative;">
		                <div class="form-group" style="width:100%">
		                  	<label class="col-md-3 control-label" style="font-size: ">Product / Services</label>
		                  	<div class="col-md-7">
		                    	<input class="form-control" style="width:100%" type="text" name="products[0][product]">
		                  	</div>
		                </div>
			            <i class="fa fa-plus delete-in-profiling" title="Add Other Product/Service" onclick="renderRow('prods' ,event)"></i>
		            </div>
	                @if (@$p->profile)
		                @foreach(@$p->profile->products as $prod)
		                <div style="position: relative;">
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label" style="font-size: ">Product / Services</label>
			                  	<div class="col-md-7">
			                    	<input class="form-control" style="width:100%" type="text" name="products[{{ $loop->index+1 }}][product]"
			                    		value="{{ @$prod->product }}">
			                  	</div>
			                </div>
			                <i class="fa fa-times delete-in-profiling" title="Delete This Product" onclick="deleteProducts({{ @$prod->id }} ,event)"></i>
			            </div>
		                @endforeach
		            @endif

		            <h3 class="block-title s-line">Platform</h3>
		            <div style="position: relative;">
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
			            <i class="fa fa-plus delete-in-profiling" title="Add Other Website" onclick="renderRow('sites' ,event)"></i>
		            </div>
	                @if (@$p->profile)
	                	@foreach(@$p->profile->sites as $w)
	                	<div style="position: relative;">
		                	<h3 class="block-title s-line"></h3>
		                	<div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Website</label>
			                  	<div class="col-md-7">
			                    	<input class="form-control" style="width:100%" type="text" name="websites[{{ $loop->index+1 }}][link]"
			                    		value="{{ @$w->link }}">
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Technology</label>
			                  	<div class="col-md-7">
			                    	<select class="form-control" style="width:100%" id="contact1-subject" name="websites[{{ $loop->index+1 }}][technology_id]" >
				                        @foreach($techs as $t)
				                        <option {{ @$t->id == @$w->technology_id ? 'selected' : '' }} value="{{ @$t->id }}">{{ @$t->name }}</option>
				                        @endforeach
				                    </select>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Look and Feel</label>
			                  	<div class="col-md-7">
				                    <select class="form-control" style="width:100%" id="contact1-subject" name="websites[{{ $loop->index+1 }}][loo_and_feel_id]" >
				                        @foreach($looks as $l)
				                        <option{{ @$l->id == @$w->look_and_feel_id ? 'selected' : '' }}  value="{{ @$l->id }}">{{ @$l->name }}</option>
				                        @endforeach
				                    </select>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Content</label>
			                  	<div class="col-md-7">
			                    	<select class="form-control" style="width:100%" id="contact1-subject" name="websites[{{ $loop->index+1 }}][content_id]" >
				                        @foreach($content as $l)
				                        <option {{ @$l->id == @$w->content_id ? 'selected' : '' }}  value="{{ @$l->id }}">{{ @$l->name }}</option>
				                        @endforeach
				                    </select>
			                  	</div>
			                </div>
			                <i class="fa fa-times delete-in-profiling" title="Delete This Website" onclick="deleteSites({{ @$w->id }} ,event)"></i>
			            </div>
	                	@endforeach
	                @endif

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
			            <i class="fa fa-plus delete-in-profiling" title="Add Other Social Channel" onclick="renderRow('socials' ,event)"></i>
		            </div>
	                @if(@$p->profile)
	                	@foreach(@$p->profile->socials as $s)
	                	<div style="position: relative;">
		                	<h3 class="block-title s-line"></h3>
		                	<div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Channel Name</label>
			                  	<div class="col-md-7">
			                    	<input class="form-control" style="width:100%" type="text" name="socials[0][name]" value="{{ @$s->name }}">
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Channel Link</label>
			                  	<div class="col-md-7">
			                    	<input class="form-control" style="width:100%" type="text" name="socials[0][link]" value="{{ @$s->link }}">
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Managment</label>
			                  	<div class="col-md-7">
			                    	<select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][management_id]" >
				                        @foreach($manage as $l)
				                        <option {{ @$l->id == @$s->management_id ? 'selected' : '' }} value="{{ @$l->id }}">{{ @$l->name }}</option>
				                        @endforeach
				                    </select>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Type of Posts</label>
			                  	<div class="col-md-7">
			                    	<select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][post_type_id]" >
				                        @foreach($types as $l)
				                        <option {{ @$l->id == @$s->post_type_id ? 'selected' : '' }} value="{{ @$l->id }}">{{ @$l->name }}</option>
				                        @endforeach
				                    </select>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  <label class="col-md-3 control-label">Last Campaign</label>
			                  <div class="col-md-7">
			                    <input type="text" style="width:100%" name="socials[0][campaign_link]" class="form-control" placeholder="url"
			                    	value="{{ @$s->campaign_link }}">
			                  </div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  <label class="col-md-3 control-label">Content</label>
			                  <div class="col-md-7">
			                    <select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][content_id]" >
			                        @foreach($content as $l)
				                        <option {{ @$l->id == @$s->content_id ? 'selected' : '' }} value="{{ @$l->id }}">{{ @$l->name }}</option>
				                        @endforeach
			                    </select>
			                  </div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  <label class="col-md-3 control-label">Promoting Status</label>
			                  <div class="col-md-7">
			                    <select class="form-control" style="width:100%" id="contact1-subject" name="socials[0][promote_status_id]" >
			                        @foreach($promotes as $l)
				                        <option {{ @$l->id == @$s->promote_status_id ? 'selected' : '' }} value="{{ @$l->id }}">{{ @$l->name }}</option>
				                        @endforeach
			                    </select>
			                  </div>
			                </div>
			                <i class="fa fa-times delete-in-profiling" title="Delete This Social Channel" onclick="deleteSocials({{ @$s->id }} ,event)"></i>
			            </div>
	                	@endforeach
	                @endif

	                <h3 class="block-title s-line"></h3>
	                <div class="form-group">
	                  	<label class="col-md-3 control-label">Google</label>
	                </div>
	                <div class="form-group" style="width:100%">
	                  	<div class="form-group" style="width:100%">
	                    	<label class="col-md-3 control-label css-input css-checkbox css-checkbox-primary no-margin">
	                        	<input type="checkbox" name="seo_check"  {{ @$p->profile->seo_check == 1 ? 'checked' : '' }}><span></span> SEO
	                    	</label>
	                    	<div class="col-md-3">
	                      		<input class="form-control" style="width:100%" type="text" name="seo_level_id" placeholder="Level"
	                        		value="{{ @$p->profile->seo_level_id }}">
	                    	</div>
	                    	<div class="col-md-4">
	                      		<input class="form-control" style="width:100%" type="text" name="seo_keywords" placeholder="Keywords"
	                        		value="{{ @$p->profile->seo_keywords }}">
	                    	</div>
	                  	</div>
	                  	<div class="form-group" style="width:100%">
	                    	<label class="col-md-3 control-label css-input css-checkbox css-checkbox-primary no-margin">
	                        	<input type="checkbox" {{ @$p->profile->sem_check == 1 ? 'checked' : '' }} name="sem_check"><span></span> SEM
	                    	</label>
	                    	<div class="col-md-3">
	                      		<input class="form-control" style="width:100%" type="text" name="sem_level_id" placeholder="Level"
	                        		value="{{ @$p->profile->sem_level_id }}">
	                    	</div>
	                    	<div class="col-md-4">
	                      		<input class="form-control" style="width:100%" type="text" name="sem_keywords" placeholder="Keywords"
	                        		value="{{ @$p->profile->sem_keywords }}">
	                    	</div>
	                  	</div>
	                  	<div class="form-group" style="width:100%">
	                      	<label class="col-md-3 control-label css-input css-checkbox css-checkbox-primary no-margin">
	                          	<input type="checkbox" {{ @$p->profile->gdn_check == 1 ? 'checked' : '' }} name="gdn_check"><span></span> GDN
	                      	</label>
	                      	<div class="col-md-3">
	                        	<input class="form-control" style="width:100%" type="text" name="gdn_level_id" placeholder="Level"
	                        		value="{{ @$p->profile->gdn_level_id }}">
	                      	</div>
	                      	<div class="col-md-4">
	                        	<input class="form-control" style="width:100%" type="text" name="gdn_keywords" placeholder="Keywords"
	                        		value="{{ @$p->profile->gdn_keywords }}">
	                      	</div>
	                    </div>
	                </div>
	                <div style="position: relative;">
		                <h3 class="block-title s-line"></h3>
		                <div class="form-group" style="width:100%">
		                  	<label class="col-md-3 control-label">Refrance</label>
		                  	<div class="col-md-7">
		                    	<input class="form-control" style="width:100%" type="text" name="refs[0][reference]">
		                  	</div>
		                </div>
		                <div class="form-group" style="width:100%">
		                  	<label class="col-md-3 control-label">Broviding Services</label>
		                  	<div class="col-md-7">
		                    	<textarea class="form-control" style="width:100%" name="refs[0][providing]" rows="5"></textarea>
		                  	</div>
		                </div>
			            <i class="fa fa-plus delete-in-profiling" title="Add Other Reference" onclick="renderRow('refs' ,event)"></i>
		            </div>
	                @if(@$p->profile)
	                	@foreach(@$p->profile->refs as $r)
		                <div style="position: relative;">
			                <h3 class="block-title s-line"></h3>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Refrance</label>
			                  	<div class="col-md-7">
			                    	<input class="form-control" style="width:100%" type="text" value="{{ @$r->reference }}"
			                    		name="refs[{{ $loop->index+1 }}][reference]">
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Providing Services</label>
			                  	<div class="col-md-7">
			                    	<textarea class="form-control" style="width:100%" name="refs[{{ $loop->index+1 }}][providing]" rows="5">{{ @$r->providing }}</textarea>
			                  	</div>
			                </div>
			                <i class="fa fa-times delete-in-profiling" title="Delete This Reference" onclick="deleteRefs({{ @$r->id }} ,event)"></i>
			            </div>
		                @endforeach
		            @endif

	                <h3 class="block-title s-line"></h3>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Approuch</label>
	                  	<div class="col-md-7">
	                    	<select class="form-control" style="width:100%" id="contact1-subject" name="approach">
	                        	<option {{ @$p->profile->approach == 'Brief' ? 'selected' : '' }} value="Brief">Brief</option>
	                        	<option {{ @$p->profile->approach == 'Proposal' ? 'selected' : '' }} value="Proposal">Proposal</option>
	                    	</select>
	                  	</div>
	                </div>
					<div class="modal-footer" style="padding: 15px 0">
						<button class="btn btn-primary pull-right">Save</button>
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>