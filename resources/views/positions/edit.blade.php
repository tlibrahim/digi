@extends('layouts.app')

@section('content')


<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				<form method="post">
					@if(session()->has('status'))
					<div class="alert alert-success">{{ session('status') }}</div>
					@endif
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" value="{{$pos->name}}" required placeholder="Name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Position Type</label>
						<select name="type" class="form-control">
							<option {{ @$pos->type == 'Team Leader' ? 'selected' : '' }} value="Team Leader">Team Leader</option>
							<option {{ @$pos->type == 'Team Member' ? 'selected' : '' }} value="Team Member">Team Member</option>
						</select>
					</div>
					<div class="form-group">
						<label>Departement</label>
						<select name="departement_id" class="form-control">
							<option>Select One</option>
							@foreach($departements as $d)
							<option {{ $pos->departement_id == @$d->id ? 'selected' : '' }} value="{{ @$d->id }}">{{ @$d->name }}</option>
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