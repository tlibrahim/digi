@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('permissions/create') }}" style="margin-bottom: 15px">Add Permission</a>
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
		                  <th width="25%">Title</th>
		                  <th width="20%">Category Trigger</th>
		                  
		                  <th width="30%">Position</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($permissions as $d)
		                	<tr>
		                		<td>{{ @$d->name }}</td>
		                		<td>{{ @$d->trigger_category }}</td>
		                		<td>
		                			@foreach(@$d->positions as $pos)
		                			<span class="label label-success">{{ @$pos->position->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions' ,'edit') == 1 )
							        <a href="{{ url('permissions/'.@$d->id.'/edit') }}" class="btn btn-info pull-left">Edit</a>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('permissions' ,'delete') == 1 )
							        <form id="delete-form-{{ @$d->id }}" method="post" action="{{ url('permissions/'.@$d->id) }}" class="pull-left" style="margin-left: 5px">
							        	@csrf
										<input name="_method" type="hidden" value="DELETE">
										<button type="button" onclick="deletePerm({{ @$d->id }})" class="btn btn-danger">Delete</button>
							        </form>
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
	function deletePerm(id) {
		var ret = false
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this permission!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	$("#delete-form-"+id).submit()
	      } else {
	        swal("Your permission is safe!")
	        ret = false
	      }
	    })
	    return ret
	}
</script>
@endsection