@extends('layouts.app')

@section('content')


<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				<form method="post">
					@csrf
			        @if(session()->has('status'))
			            <div class="alert alert-success">
			            	<strong>{{ session('status') }}</strong>
			            </div>
			        @endif
			        <div class="form-group">
						<label>Name</label>
						<input type="text" required value="{{ $department->name }}" placeholder="Name" name="name" class="form-control">
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