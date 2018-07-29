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
		            @if($errors->any())
		            	@foreach($errors->all() as $er)
			            <div class="alert alert-danger">
			            	<strong>{{ $er }}</strong>
			            </div>
		            	@endforeach
		            @endif
		            @if(session()->has('status'))
		            <div class="alert alert-success">
		            	<strong>{{ session('status') }}</strong>
		            </div>
		            @endif
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" required value="{{ old('name') }}" placeholder="Name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" required value="{{ old('email') }}" placeholder="Email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" required placeholder="Password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<label>Positions</label>
						<select name="positions[]" required class="form-control select2" multiple="multiple" data-placeholder="Positions">
							@foreach($departements as $d)
								<option disabled>{{ @$d->name }}</option>
								@foreach(@$d->positions as $p)
								<option value="{{ @$p->id }}">{{ @$p->name }}</option>
								@endforeach
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