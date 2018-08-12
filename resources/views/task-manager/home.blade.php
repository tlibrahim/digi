@extends('layouts.app')

@section('styles')

<style type="text/css" media="screen">
	.fa-times{
		position: absolute;
		top: 0px;
		right: -20px
	}
	.fa-times:hover{
		cursor:pointer;
	}
</style>

@endsection

@section('content')
    
<main id="main-container">
      <div class="content bg-gray-lighter" style="min-height: 50px;">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              My Tasks
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
	            	<table class="table table-striped">
                        <thead>
                        	<tr>
                            	<th class="text-center">ID</th>
                                <th>Company Name</th>
                                <th>Service</th>
                                <th>Task</th>
                                <th>Dead Line</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
	                                <td class="text-center">{{ @$task->id }}</td>
	                                <td>{{ @$task->quotation->company->name }}</td>
	                                <td>{{ @$task->service->name }}</td>
	                                <td>{{ @$task->task->name }}</td>
	                                <td>{{ @$task->end_date }}</td>
	                                <td>
	                                	@if(@$task->is_done == 0)
	                                		@php
	                                			$currentTask = \App\Http\Controllers\TaskManagerController::currentTask(@$task->id ,@$task->quotation_id ,@$task->service_id ,@$task->serialize_level);
	                                		@endphp
	                                		@if($currentTask)
			                                  	<button class="btn btn-default" title="Task Confirm"
			                                    	onclick="taskConfirm(event ,'{{ url("task-manager-confirm/".@$task->id) }}')">
			                                    	<i class="si si-check"></i>
			                                  	</button>
			                                @endif
		                                  	<button class="btn btn-default" title="Execute Task"
		                                  		@if(@$task->serialize_level == 1)
		                                  		@else
		                                  			{{ $currentTask ? '' : 'disabled' }}
		                                  		@endif
		                                    	onclick="loadPopUp('{{ url("task-manager-load/".@$task->task_id."/".@$task->id) }}')">
		                                    	<i class="si si-note"></i>
		                                  	</button>
	                                  	@endif
	                                	@if(@$task->executions()->where(function($q) {$q->where('type' ,'array')->orWhere('type' ,'file');})->get()->count() > 0)
			                                <button class="btn btn-default" title="Task Files Gallery"
			                                    onclick="loadPopUp('{{ url("task-manager-gallery/".@$task->id) }}')">
			                                	<i class="si si-docs"></i>
			                                </button>
			                            @endif
	                                  	<button class="btn btn-default" title="Task History"
	                                    	onclick="loadPopUp('{{ url("task-manager-history/".@$task->task_id."/".@$task->id) }}')">
	                                    	<i class="si si-feed"></i>
	                                  	</button>
	                                </td>
                              	</tr>
                            @endforeach
                        </tbody>
                    </table>
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
<script>
	$(document).ready(function() {
		@if(session()->has('page_number'))
		$('.pagination li a').each(function(i ,e){
			if ($(e).text() == {{ session('page_number') + 1 }}) {
				console.log
				$(e).click()
			}
		})
		@endif
	})

	function loadPopUp(url) {
		$.ajax({
			url:url,
			dataType:'json',
			type:'GET',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#pop-up-modal .modal-content").html(rData.code)
					$("#pop-up-modal").modal('toggle')
					$('.date').datepicker({autoclose:true});
					$('.date-range').daterangepicker({autoclose:true});
				} else {
					swal(rData.msg ,{icon:'error'})
				}
			}
		})
	}

	function taskConfirm(event ,url) {
		swal({
		  	title: "Is Task Done?",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		  		$.ajax({
		  			dataType:'json',
		  			type:'GET',
		  			url:url,
		  			success:function(rData) {
		  				if (rData.status == 'ok') {
		  					swal("Your task has been confirmed!", {icon: "success"})
		  					$(event.target).parent().parent().parent().html(rData.code)
		  				} else {
		  					swal("Sorry we can`t handle this operation!", {icon: "warning"})
		  				}
		  			}
		  		})
		  	} else {
		    	swal("Your task is not done!");
		  	}
		})
	}

	function taskExecute(event) {
		$(event.target).prepend('<input type="hidden" name="page_number" value="'+dTables.page.info().page+'"/>')
		return true
	}

	function deleteFile(event ,id ,file) {
		swal({
		  	title: "Are you sure?",
		  	text: "Once deleted, you will not be able to recover this imaginary file!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((willDelete) => {
		  	if (willDelete) {
		    	swal("Poof! Your imaginary file has been deleted!", {icon: "success"})
		  	} else {
		    	swal("Your imaginary file is safe!");
		  	}
		})
	}
</script>
@endsection

