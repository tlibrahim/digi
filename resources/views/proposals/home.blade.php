@extends('layouts.app')

@section('styles')
	@include('proposals.style')
@endsection

@section('content')

  	<main id="main-container">
      	<div class="content bg-gray-lighter">
        	<div class="row items-push">
          		<div class="col-sm-7">
            		<h1 class="page-heading"></h1>
          		</div>
        	</div>
      	</div>

      	<div class="content">
        	<div class="row">
              	<div class="col-sm-6 col-md-10 col-md-offset-1">
                  	<div class="block block-bordered">
                    	<div class="block-header bg-gray-lighter">
                        	<h3 class="block-title">Total Proposals</h3>
                      	</div>
                      	<div class="block-content" id="div-content-table" style="padding: 20px 20px 20px">
	                        @if(session()->has('status'))
	                        	<div class="alert alert-success">{{session('status')}}</div>
	                        @endif
	                        @if(session()->has('error'))
	                        	<div class="alert alert-danger">{{session('error')}}</div>
	                        @endif
	                        @if($errors->any())
	                          	@foreach($errors as $er)
	                          		<div class="alert alert-danger">{{ $er }}</div>
	                          	@endforeach
	                        @endif
                        	<div class="tabs">
                          		<div class="tab-button-outer">
                            		<ul id="tab-button">
                              			<li><a href="#tab01">Current Proposal</a></li>
                            		</ul>
                          		</div>
                          		<div class="tab-select-outer">
                            		<select id="tab-select">
                              			<option value="#tab01">Tab 1</option>
                            		</select>
                          		</div>
	                          	<div id="tab01" class="tab-contents">
	                          	</div>
                        	</div>
                      	</div>
                  	</div>
              	</div>
          	</div>
    	</div>
  	</main>

	<div id="pop-up-modal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    	<div class="modal-content" style="overflow:  hidden;"></div>
		</div>
	</div>

@endsection

@section('scripts')
	@include('proposals.script')
@endsection


