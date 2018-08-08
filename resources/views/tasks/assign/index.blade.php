@extends('layouts.app')

@section('content')
    
<main id="main-container">
      <div class="content bg-gray-lighter" style="min-height: 50px;">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              Quotations
            </h1>
          </div>
        </div>
      </div>
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
				<div class="row" style="padding-top: 50px">
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
	            	<table class="table table-striped">
                        <thead>
                        	<tr>
                            	<th class="text-center">ID</th>
                                <th>Company Name</th>
                                <th>Qutation Services</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($quots as $quot)
                                <tr id="company-{{ @$quot->company->id }}">
	                                <td class="text-center">{{ @$quot->company->id }}</td>
	                                <td>{{ @$quot->company->name }}</td>
	                                <td>
	                                    @foreach(@$quot->services as $s)
	                                        <span class="label label-success">({{ @$s->quantity }}) {{ @$s->service->name }}</span>
	                                	@endforeach
	                                </td>
	                                <td>
	                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('tasks_assign' ,'assign') == 1 )
									        <a href="{{ url('task-assign/quotations/'.@$quot->id) }}" class="btn btn-info">Manage Tasks</a>
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
</script>
@endsection

