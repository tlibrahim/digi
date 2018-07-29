@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('feedback-forms/create') }}" style="margin-bottom: 15px">Add Feedback</a>
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
		                  <th width="60%">Feedback Name</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($feedbacks as $d)
		                	<tr>
		                		<td>{{ @$d->name }}</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms' ,'edit') == 1 )
							        <a href="{{ url('feedback-forms/'.@$d->id.'/edit') }}" class="btn btn-info pull-left">Edit</a>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('feedback_forms' ,'delete') == 1 )
							        <form id="form-delete-{{ @$d->id }}" method="post" action="{{ url('feedback-forms/'.@$d->id) }}" class="pull-left" style="margin-left: 5px">
							        	@csrf
										<input name="_method" type="hidden" value="DELETE">
										<button type="button" onclick="deleteFeedbackForm({{ @$d->id }})" class="btn btn-danger">Delete</button>
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
	function deleteFeedbackForm(id) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this feedback form!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	$('#form-delete-'+id).submit()
	      } else {
	        swal("Your feedback form is safe!")
	        ret = false
	      }
	    })
	}
</script>
@endsection