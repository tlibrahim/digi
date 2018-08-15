@extends('layouts.app')

@section('styles')
@include('director-task-approve.style')
@endsection

@section('content')
    
<main id="main-container">
      <div class="content bg-gray-lighter" style="min-height: 50px;">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              Quotations Tasks Completed
            </h1>
          </div>
        </div>
      </div>
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row" style="padding-top: 50px">
		            @if(session()->has('error'))
		            <div class="alert alert-danger">
		            	<strong>{{ session('error') }}</strong>
		            </div>
		            @endif
		            @if(session()->has('status'))
		            <div class="alert alert-success">
		            	<strong>{{ session('status') }}</strong>
		            </div>
		            @endif
		        </div>
	            <div class="row">
	            	<div class="tabs">
                        <div class="tab-button-outer">
                            <ul id="tab-button">
                              	<li><a href="#tab01">In Progress Quotations</a></li>
                              	<li><a href="#tab02">Completed Quotations</a></li>
                            </ul>
                        </div>
                        <div class="tab-select-outer">
                            <select id="tab-select">
                              	<option value="#tab01">In Progress Quotations</option>
                              	<option value="#tab02">Completed Quotations</option>
                            </select>
                        </div>

                        <div id="tab01" class="tab-contents"></div>
                        <div id="tab02" class="tab-contents"></div>
                    </div>
	          	</div>
	        </div>
        </div>
    </div>
</main>

<div id="pop-up-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog" style="width: 50%">
    	<div class="modal-content" style="overflow:  hidden;"></div>
	</div>
</div>

<div id="gallery-pop-up-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content" style="overflow:  hidden;"></div>
	</div>
</div>

<div id="comments-pop-up-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content" style="overflow:  hidden;"></div>
	</div>
</div>

@endsection

@section('scripts')
@include('director-task-approve.script')
@endsection


