@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'add') == 1 )
					<button type="button" class="pull-right btn btn-info" style="margin-bottom: 15px" onclick="loadAssignTask()">
						Assign Task
					</button>
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
		                  <th width="30%">Task Title</th>
		                  <th>Assigned User</th>
		                  <th>Deadline</th>
		                  <th>Task Name</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($tasks as $p)
		                	<tr>
		                		<td>{{ @$p->title }}</td>
		                		<td>{{ @$p->user->name }}</td>
		                		<td>{{ @$p->end_date }}</td>
		                		<td>{{ @$p->task->name }}</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'edit') == 1 )
							        <button onclick="loadAssignTask({{ @$p->id }})" class="btn btn-info">Edit</button>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'delete') == 1 )
		                			<button onclick="deleteAssign('{{ url('task-assign/delete/'.@$p->id) }}')" class="btn btn-danger">Delete</button>
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

<div id="pop-up-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content"></div>
	</div>
</div>

@endsection

@section('scripts')
<script>
	function loadAssignTask(id) {
		var url = ''
		if (id == undefined) {
			url = '{{ url("task-assign-loaders/add") }}'
		} else {
			url = '{{ url("task-assign-loaders/edit") }}/'+id
		}
		$.ajax({
			dataType:'json',
			type:'GET',
			url:url,
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#pop-up-modal .modal-content").html(rData.code)
					$('input[name="end_date"]').datepicker({autoclose:true,format:'yyyy-mm-dd'})
					$("#pop-up-modal").modal('toggle')
				} else {
					swal({text:'There is some error' ,icon:'warning'})
				}
			}
		})
	}

	function deleteAssign(url) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this assign!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	location = url
	      } else {
	        swal("Your assign is safe!")
	        ret = false
	      }
	    })
	}
</script>
@endsection

