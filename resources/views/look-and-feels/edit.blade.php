@extends('layouts.app')

@section('content')


<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				@if(session()->has('status'))
				<div class="alert alert-success">{{session('status')}}</div>
				@endif
				@if(session()->has('error'))
				<div class="alert alert-danger">{{session('error')}}</div>
				@endif
				<form method="post" action="{{ url('look-and-feels/'.$look->id) }}">
					@csrf
					<input name="_method" type="hidden" value="PUT">
					<div class="form-group">
						<label>Look And Feel Name</label>
						<input type="text" required placeholder="Look And Feel Name" value="{{ $look->name }}" name="name" class="form-control">
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