@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('positions/add') }}" style="margin-bottom: 15px">Add Position</a>
					@endif
				</div>
				<div class="row">
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
		                  <th width="40%">Title</th>
		                  <th>Position Type</th>
		                  <th>Departement</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($positions as $p)
		                	<tr>
		                		<td>{{ @$p->name }}</td>
		                		<td>{{ @$p->type }}</td>
		                		<td>
		                			<span class="label label-success">{{ @$p->departement->name }}</span>
		                		</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions' ,'edit') == 1 )
							        <a href="{{ url('positions/edit/'.@$p->id) }}" class="btn btn-info">Edit</a>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('positions' ,'delete') == 1 )
		                			<button onclick="deletePos('{{ url('positions/delete/'.@$p->id) }}')" class="btn btn-danger">Delete</button>
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
	function deletePos(url) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this position!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	        location = url
	      } else {
	        swal("Your position is safe!");
	      }
	    });
	}
</script>
@endsection