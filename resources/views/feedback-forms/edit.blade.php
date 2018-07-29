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
				<form method="post" action="{{ url('feedback-forms/'.$feedback->id) }}">
					@csrf
					<input name="_method" type="hidden" value="PUT">
					<div class="form-group">
						<label>Feedback Name</label>
						<input type="text" required placeholder="Feedback Name" value="{{ $feedback->name }}" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>HTML Form</label>
						<textarea rows="10" required placeholder="HTML Form" name="form_html" class="form-control">{{ $feedback->form_html }}</textarea>
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