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
						<label>Proposal</label>
						<select required name="is_proposal" class="form-control">
							<option {{ $department->is_proposal == 0 ? 'selected' : '' }} value="0">Is Not Proposal</option>
							<option {{ $department->is_proposal == 1 ? 'selected' : '' }} value="1">Is Proposal</option>
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