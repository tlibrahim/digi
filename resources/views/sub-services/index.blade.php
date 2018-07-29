@extends('layouts.app')

@section('content')
    
<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<a class="pull-right btn btn-info" href="{{ url('subservices/add') }}" style="margin-bottom: 15px">Add Sub-Service</a>
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
		                  <th width="40%">Sub-Service Name</th>
		                  <th>Service</th>
		                  <th>Values</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($subServices as $p)
		                	<tr>
		                		<td>{{ @$p->name }}</td>
		                		<td>
		                			<span class="label label-success">{{ @$p->service->name }}</span>
		                		</td>
		                		<td>
		                			@foreach(@$p->values as $v)
		                			<span class="label label-success">{{ @$v->value }}</span>
		                			@endforeach
		                		</td>
		                		<td>
							        <a href="{{ url('subservices/edit/'.@$p->id) }}" class="btn btn-info">Edit</a>
		                			<a href="{{ url('subservices/delete/'.@$p->id) }}" class="btn btn-danger">Delete</a>
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