<div id="view-profiling-{{ @$p->id }}" class="modal fade bd-example-modal-lg" role="dialog">
  	<div class="modal-dialog" style="width: 65%">
    	<div class="modal-content">
      		<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        		<h4 class="modal-title">'{{ @$p->companyname }}' View Profile</h4>
      		</div>
      		<form>
	      		<div class="modal-body">
	                <div class="form-group" style="width:100%;margin-bottom: 10px">
	                  	<div class="col-md-5">
	                  		<label class="control-label">Potential Name :</label>
	                  		<h3>{{ @$p->companyname }}</h3>
	                  	</div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">Industry :</label>
	                  		<h3>{{ @$p->industry->name }}</h3>
	                  	</div>
	                  	<div class="clearfix s-line"></div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">First Name :</label>
	                  		<h3>{{ @$p->firstname }}</h3>
	                  	</div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">last Name :</label>
	                  		<h3>{{ @$p->lastname }}</h3>
	                  	</div>
	                  	<div class="clearfix s-line"></div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">Email :</label>
	                  		<h3>{{ @$p->email }}</h3>
	                  	</div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">Phone :</label>
	                  		<h3>{{ @$p->phone }}</h3>
	                  	</div>
	                  	<div class="clearfix s-line"></div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">Position :</label>
	                  		<h3>{{ @$p->position }}</h3>
	                  	</div>
	                  	<div class="col-md-5">
	                  		<label class="control-label">Address :</label>
	                  		<h3>{{ @$p->address }}</h3>
	                  	</div>
	                </div>

	                <h3 class="block-title s-line"></h3>

	                <div class="form-group" style="width:100%;margin-bottom: 10px">
	                  	<div class="col-md-7">
	                  		<label class="control-label">Introduction</label>
	                    	<p>{{ @$p->profile->intro }}</p>
	                  	</div>
	                  	<div class="col-md-3">
	                  		<label class="control-label">Logo</label>
	                  		@if(@$p->profile->logo)
	                  		<img src="{{ url('storage/profiling-logos/'.@$p->profile->logo) }}" alt="Image Not Found" class="img-responsive">
	                  		@else
	                  		<img src="{{ url('image-not-found.png') }}" class="img-responsive">
	                  		@endif
	                  	</div>
	                </div>

		            
	                @if (@$p->profile && @$p->profile->products)
	                	<h3 class="block-title s-line">Products / Services</h3>
		                @foreach(@$p->profile->products as $prod)
		                <div style="position: relative;">
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label" style="font-size: ">Product / Services</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$prod->product }}"</h3>
			                  	</div>
			                </div>
			            </div>
		                @endforeach
		            @endif
		            <br>

	                @if ((@$p->profile && @$p->profile->sites) || (@$p->profile && @$p->profile->socials))
		            	<h3 class="block-title s-line">Platform</h3>
	                	@foreach(@$p->profile->sites as $w)
	                	<div style="position: relative;">
		                	<div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Website</label>
			                  	<div class="col-md-7">
			                    	<a target="_blank" href="{{ @$w->link }}"><h3>{{ @$w->link }}</h3></a>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Technology</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$w->technology->name }}</h3>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Look and Feel</label>
			                  	<div class="col-md-7">
				                    <h3>{{ @$w->look->name }}</h3>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Content</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$w->content->name }}</h3>
			                  	</div>
			                </div>
			            </div>
	                	@endforeach
	                @endif

	                @if(@$p->profile)
	                	@foreach(@$p->profile->socials as $s)
	                	<div style="position: relative;">
		                	<h3 class="block-title s-line"></h3>
		                	<div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Channel Name</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$s->name }}"</h3>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Channel Link</label>
			                  	<div class="col-md-7">
			                    	<a target="_blank" href="{{ @$s->link }}"><h3>{{ @$s->link }}</h3></a>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Managment</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$s->manage->name }}</h3>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Type of Posts</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$s->post->name }}</h3>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  <label class="col-md-3 control-label">Last Campaign</label>
			                  <div class="col-md-7">
			                    <a href="{{ @$s->campaign_link }}" target="_blank"><h3>{{ @$s->campaign_link }}</h3></a>
			                  </div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  <label class="col-md-3 control-label">Content</label>
			                  <div class="col-md-7">
			                    <h3>{{ @$s->content->name }}</h3>
			                  </div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  <label class="col-md-3 control-label">Promoting Status</label>
			                  <div class="col-md-7">
			                    <h3>{{ @$s->promote->name }}</h3>
			                  </div>
			                </div>
			            </div>
	                	@endforeach
	                @endif

	                @if(@$p->profile->seo_check == 1 || @$p->profile->sem_check == 1 || @$p->profile->gdn_check == 1)
	                <h3 class="block-title s-line"></h3>
	                <div class="form-group">
	                  	<label class="col-md-3 control-label">Google</label>
	                </div>
	                <div class="form-group" style="width:100%;margin-bottom: 15px">
	                	@if(@$p->profile->seo_check == 1)
	                  	<div class="form-group col-md-4">
	                  		<div class="col-md-12">
		                    	<h3 class="control-label css-input css-checkbox css-checkbox-primary no-margin">
		                    		SEO
		                    	</h3>
		                    	<p style="margin-bottom: 5px">Level : {{ @$p->profile->seo_level_id }}"</p>
		                    	<p style="margin-bottom: 5px">Keywrods : {{ @$p->profile->seo_keywords }}"</p>
	                    	</div>
	                  	</div>
	                  	@endif

	                  	@if(@$p->profile->sem_check == 1)
	                  	<div class="form-group col-md-4">
	                  		<div class="col-md-12">
		                    	<h3 class="control-label css-input css-checkbox css-checkbox-primary no-margin">
		                    		SEM
		                    	</h3>
		                    	<p style="margin-bottom: 5px">Level : {{ @$p->profile->sem_level_id }}"</p>
		                    	<p style="margin-bottom: 5px">Keywrods : {{ @$p->profile->sem_keywords }}"</p>
	                    	</div>
	                  	</div>
	                  	@endif

	                  	@if(@$p->profile->gdn_check == 1)
	                  	<div class="form-group col-md-4">
	                  		<div class="col-md-12">
		                    	<h3 class="control-label css-input css-checkbox css-checkbox-primary no-margin">
		                    		GDN
		                    	</h3>
		                    	<p style="margin-bottom: 5px">Level : {{ @$p->profile->gdn_level_id }}"</p>
		                    	<p style="margin-bottom: 5px">Keywrods : {{ @$p->profile->gdn_keywords }}"</p>
	                    	</div>
	                    </div>
	                    @endif
	                </div>
	                @endif

	                @if(@$p->profile && @$p->profile->refs)
	                	@foreach(@$p->profile->refs as $r)
		                <div style="position: relative;">
			                <h3 class="block-title s-line"></h3>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Reference</label>
			                  	<div class="col-md-7">
			                    	<h3>{{ @$r->reference }}</h3>
			                  	</div>
			                </div>
			                <div class="form-group" style="width:100%">
			                  	<label class="col-md-3 control-label">Providing Services</label>
			                  	<div class="col-md-7">
			                    	<p>{{ @$r->providing }}</p>
			                  	</div>
			                </div>
			            </div>
		                @endforeach
		            @endif

		            @if(@$p->profile->approach)
	                <h3 class="block-title s-line"></h3>
	                <div class="form-group" style="width:100%">
	                  	<label class="col-md-3 control-label">Approuch</label>
	                  	<div class="col-md-7">
	                  		<h3>{{ @$p->profile->approach }}</h3>
	                  	</div>
	                </div>
	                @endif
					<div class="modal-footer" style="padding: 15px 0">
			        	<button type="button" class="btn btn-default pull-left" data-dismiss="modal" style="margin-left: 0">Close</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>