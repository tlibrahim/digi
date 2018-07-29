@extends('layouts.app')

@section('content')

<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				<form method="post" action="{{ url('permissions') }}">
					@csrf
					<div class="form-group">
						<label>Name</label>
						<input type="text" required placeholder="Name" name="name" class="form-control">
					</div>
					<div class="form-group">
						<label>Trigger</label>
						<input type="text" required placeholder="Trigger" name="trigger" class="form-control">
					</div>
					<div class="form-group">
						<label>Trigger Category</label>
						<input type="text" required placeholder="Trigger Category" name="trigger_category" class="form-control">
					</div>
					<div class="form-group">
						<label>Position</label>
						<select required name="positions[]" multiple class="form-control select2">
							<option>Select One</option>
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

@section('scripts')
<script type="text/javascript">
	$(document).ready(function() {
		$('.select2').select2()
	})
</script>
@ensection