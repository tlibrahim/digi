@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('proposal_forms' ,'add') == 1 )
					<a class="pull-right btn btn-info" href="{{ url('proposal-forms/create') }}" style="margin-bottom: 15px">Add Form</a>
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
		                  <th>ID</th>
		                  <th>Form Title</th>
		                  <th>Form Icon</th>
		                  <th>Form Inputs</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($proposals as $p)
		                	<tr>
		                		<td>{{ @$p->id }}</td>
		                		<td>{{ @$p->title }}</td>
		                		<td>{{ @$p->icon }}</td>
		                		<td>
		                			@foreach($p->inputs as $in)
		                				<span class="label label-success">{{ $in->input->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('proposal_forms' ,'edit') == 1 )
							        	<button
							        		style="margin-right: 10px"
							        		onclick="location = '{{ url('proposal-forms/edit/'.@$p->id) }}'"
							        		class="btn btn-info pull-left">
							        		Edit
							        	</button>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('proposal_forms' ,'delete') == 1 )
							        	<button type="button" onclick="deleteLevel('{{ url('proposal-forms/delete/'.@$p->id) }}')" class="btn btn-danger">Delete</button>
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
	$(document).ready(function() {
		@if(session()->has('error'))
			swal('{{ session('error') }}' ,{icon:'error'})
		@endif
		@if(session()->has('success'))
			swal('{{ session('success') }}' ,{icon:'success'})
		@endif
	})

	function deleteLevel(link) {
		swal({
	      title: "Are you sure?",
	      text: "Once deleted, you will not be able to recover this form!",
	      icon: "warning",
	      buttons: true,
	      dangerMode: true,
	    })
	    .then((willDelete) => {
	      if (willDelete) {
	      	location = link
	      } else {
	        swal("Your form is safe!" ,{icon:'error'})
	      }
	    })
	}
</script>
@endsection