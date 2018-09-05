@extends('layouts.app')

@section('styles')
<style type="text/css">
	.fa-times{
		position: absolute;
		right: 0;
		top: 20px
	}
	.fa-times:hover{
		cursor: pointer;
	}
</style>
@endsection

@section('content')


<main id="main-container">
	<!-- Page Header -->
	<div class="content bg-gray-lighter" style="background-color: white">
		<div class="row items-push">
			<div class="col-md-8 col-md-offset-2">
				<form method="post">
					@if($errors->any())
						@foreach($errors->all() as $e)
							<div class="alert alert-danger">{{ $e }}</div>
						@endforeach
					@endif
					@if(session()->has('error'))
						<div class="alert alert-danger">{{ session('error') }}</div>
					@endif
					@if(session()->has('success'))
						<div class="alert alert-success">{{ session('success') }}</div>
					@endif
					@csrf
					<div class="form-group">
						<label>Form Title</label>
						<input type="text" required placeholder="Form Title" name="title" class="form-control" value="{{ $form->title }}">
					</div>
					<div class="form-group">
						<label>Button Icon</label>
						<input type="text" required placeholder="Button Icon" name="icon" class="form-control" value="{{ $form->icon }}">
					</div>
					<div id="task-inputs">
						@foreach($form->inputs as $in)
						<div class="col-md-12" style="position: relative;padding:0">
							<div class="col-md-4" style="padding-left: 0">
								<div class="form-group">
									<label>Input Title :</label>
									<input type="text" name="inputs[]" class="form-control" placeholder="Input Title" value="{{ $in->input_title }}">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Input Type :</label>
									<select class="form-control" name="inputnames[]">
										<option>Select One</option>
										@foreach($inputs as $input)
										<option {{ $in->input_name_id == $input->id ? 'selected' : '' }} value="{{ $input->id }}">{{ $input->name }}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label>Input In Add More :</label>
									<div class="clearfix"></div>
									<input type="checkbox" name="inputsaddmore[]" {{ $in->in_add_more == 1 ? 'checked' : '' }}>
								</div>
							</div>
							<i class="fa fa-times" onclick="removeInputRow(event ,{{ $in->id }})"></i>
						</div>
						@endforeach
					</div>
					<div class="form-group col-md-6" style="padding-left: 0">
						<button class="btn btn-primary">Save</button>
					</div>
					<div class="form-group col-md-6" style="padding-right: 0">
						<button type="button" onclick="renderInput()" class="btn btn-success pull-right">Add Other Input</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>

@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		@if(session()->has('error'))
			swal('{{ session('error') }}' ,{icon:'error'})
		@endif
		@if(session()->has('success'))
			swal('{{ session('success') }}' ,{icon:'success'})
		@endif
	})

	function renderInput() {
		$.ajax({
			url:"{{ url('proposal-forms/render/inputRow') }}",
			dataType:'json',
			success:function(rData) {
				$('#task-inputs').append(rData.code)
			}
		})
	}

	function removeInputRow(event ,input_id) {
		if (input_id != undefined) {
			$.ajax({
				dataType:'json',
				type:'GET',
				url:'{{ url("tasks/deleteinput") }}/'+input_id,
				success:function(rData) {}
			})
		}
		$(event.target).parent().remove()
	}
</script>
@endsection