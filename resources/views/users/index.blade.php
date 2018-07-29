@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
				    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('users/add') }}" style="margin-bottom: 15px">Add User</a>
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
		                  <th width="40%">Name</th>
		                  <th>Positions</th>
		                  <th width="20%">Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($users as $p)
		                	<tr>
		                		<td>{{ @$p->name }}</td>
		                		<td>
		                			@foreach(@$p->positions as $pos)
		                			<span class="label label-success">{{ @$pos->position->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
		                		    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users' ,'edit') == 1 )
							        <a href="{{ url('users/edit/'.@$p->id) }}" class="btn btn-info">Edit</a>
							        @endif
		                		    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('users' ,'delete') == 1 )
							        <button onclick="deleteUser('{{ url('users/delete/'.@$p->id) }}')" class="btn btn-danger">Delete</a>
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
	function deleteUser(url) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this user!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	location = url
	      } else {
	        swal("Your user is safe!")
	        ret = false
	      }
	    })
	}
</script>
@endsection