@extends('layouts.app')

@section('content')

<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				<form method="post">
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
					@csrf
					<div class="form-group">
						<label>Service Name</label>
						<input type="text" value="{{ $service->name }}" required placeholder="Name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Tasks</label>
						<select name="tasks[]" class="form-control select2" multiple="multiple" data-placeholder="Select Task(s)">
							<option value="0">Select One</option>
							@foreach($tasks as $p)
							<option {{ in_array(@$p->id ,$service->tasks()->pluck('task_id')->toArray()) ? 'selected' : '' }}
									value="{{ @$p->id }}">{{ @$p->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-primary">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

@endsection