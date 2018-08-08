@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('services/add') }}" style="margin-bottom: 15px">Add Service</a>
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
		                  <th width="30%">Service Name</th>
		                  <th>Tasks</th>
		                  {{-- <th>Sub Services #</th> --}}
		                  <th width="15%">Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($services as $p)
		                	<tr>
		                		<td>{{ @$p->name }}</td>
		                		<td>
		                			@foreach(@$p->tasks as $t)
		                			<span class="label label-success">{{ @$t->name }}</span>
		                			@endforeach
		                		</td>
		                		{{-- <td>
		                			@foreach(@$p->subServices as $s)
		                			<span class="label label-success">{{ @$s->service->name }}</span>
		                			@endforeach
		                		</td> --}}
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'edit') == 1 )
							        <a href="{{ url('services/edit/'.@$p->id) }}" class="btn btn-info">Edit</a>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('services' ,'delete') == 1 )
		                			<button onclick="deleteService('{{ url('services/delete/'.@$p->id) }}')" class="btn btn-danger">Delete</button>
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
	function deleteService(url) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this service!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	location = url
	      } else {
	        swal("Your service is safe!")
	        ret = false
	      }
	    })
	}
</script>
@endsection