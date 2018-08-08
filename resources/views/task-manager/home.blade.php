@extends('layouts.app')

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
	                                  	<button class="btn btn-default" title="Execute Task"
	                                  		@if(@$task->serialize_level == 1 && @$task->is_done == 0)
	                                  		@else
	                                  			{{ \App\Http\Controllers\TaskManagerController::currentTask(@$task->id ,@$task->quotation_id ,@$task->service_id ,@$task->serialize_level)
	                                  				? '' : 'disabled' }}
	                                  		@endif
	                                    	onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/meeting-feedback/".@$p->id) }}')">
	                                    	<i class="si si-note"></i>
	                                  	</button>
	                                  	<button class="btn btn-default" title="Task History"
	                                    	onclick="loadPopUp({{ @$p->id }} ,'{{ url("potentials-load-pop-up/meeting-feedback/".@$p->id) }}')">
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

@endsection

@section('scripts')
<script>
</script>
@endsection

