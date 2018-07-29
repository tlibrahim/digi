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
						<label>Value Name</label>
						<input type="text" value="{{ $value->value }}" required placeholder="Name" name="value" class="form-control">
					</div>
					<div class="form-group">
						<label>Sub Service</label>
						<select name="sub_service_id" required class="form-control" data-placeholder="Service">
							<option>Select One</option>
							@foreach($subServices as $p)
							<option {{ $value->sub_service_id == @$p->id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
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