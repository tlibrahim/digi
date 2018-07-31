@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('departements/add') }}" style="margin-bottom: 15px">Add Departement</a>
					@endif
				</div>
				<div class="row">
		            @if(session()->has('status'))
		            <div class="alert alert-success">
		            	<strong>{{ session('status') }}</strong>
		            </div>
		            @endif
		            @if(session()->has('error'))
		            <div class="alert alert-danger">
		            	<strong>{{ session('error') }}</strong>
		            </div>
		            @endif
		        </div>
	            <div class="row">
	              	<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th width="50%">Title</th>
		                  <th width="25%">Is Proposal</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($departements as $d)
		                	<tr>
		                		<td>{{ @$d->name }}</td>
		                		<td>{{ @$d->is_proposal == 1 ? 'Is Proposal' : 'Is Not Proposal' }}</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement' ,'edit') == 1 )
							        <a href="{{ url('departements/edit/'.@$d->id) }}" class="btn btn-info">Edit</a>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('departement' ,'delete') == 1 )
		                			<button onclick="deleteDep('{{ url('departements/delete/'.@$d->id) }}')" class="btn btn-danger">Delete</button>
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
	function deleteDep(url) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this departement!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	        location = url
	      } else {
	        swal("Your departement is safe!");
	      }
	    });
	}
</script>
@endsection