@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-12" style="padding: 0 50px">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('tasks/add') }}" style="margin-bottom: 15px">Add Task</a>
					@endif
				</div>
				<div class="row">
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
	              	<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th width="20%">Title</th>
		                  <th>Service</th>
		                  <th>Level</th>
		                  <th>Inputs</th>
		                  <th>Position</th>
		                  <th width="15%">Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($tasks as $p)
		                	<tr>
		                		<td>{{ @$p->name }}</td>
		                		<td>{{ @$p->service->name }}</td>
		                		<td>{{ @$p->serialize_level }}</td>
		                		<td>
		                			@foreach(@$p->inputs as $in)
		                			<span class="label label-success">{{ @$in->input->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
		                			@foreach(@$p->positions as $pos)
		                			<span class="label label-success">{{ @$pos->position->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator' ,'edit') == 1 )
							        <a href="{{ url('tasks/edit/'.@$p->id) }}" class="btn btn-info">Edit</a>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_generator' ,'delete') == 1 )
		                			<button onclick="deleteTask('{{ url('tasks/delete/'.@$p->id) }}')" class="btn btn-danger">Delete</button>
		                			@endif
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
	function deleteTask(url) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this task!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	location = url
	      } else {
	        swal("Your task is safe!")
	        ret = false
	      }
	    })
	}
</script>
@endsection