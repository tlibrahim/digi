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
					<div class="col-md-12">
						<div class="form-group col-md-12">
							<label>Task Name</label>
							<input type="text" required placeholder="Name" name="name" class="form-control" value="{{ $task->name }}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-12">
							<label>Task Serialize Level</label>
							<input type="text" required placeholder="Serialize Level" name="serialize_level" class="form-control" value="{{ $task->serialize_level }}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-6">
							<label>Button Icon</label>
							<input type="text" required placeholder="Button Icon" name="button_icon" class="form-control" value="{{ $task->button_icon }}">
						</div>
						<div class="form-group col-md-6">
							<label>Button Title</label>
							<input type="text" required placeholder="Button Title" name="button_title" class="form-control" value="{{ $task->button_title }}">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-12">
							<label>Position</label>
							<select name="positions[]" class="form-control select2" multiple>
								@php
									$task_positions = @$task->positions()->pluck('position_id')->toArray();
								@endphp
								@foreach($department as $d)
								<option disabled>{{ @$d->name }}</option>
									@foreach(@$d->positions as $p)
									<option {{ in_array($p->id ,$task_positions) ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
									@endforeach
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-12">
							<label>Services</label>
							<select name="service_id" class="form-control">
								@foreach($services as $p)
								<option {{ $p->id == @$task->service_id ? 'selected' : '' }} value="{{ @$p->id }}">{{ @$p->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div id="task-inputs">
						@foreach($task->inputs as $in)
						<div class="col-md-12" style="position: relative;">
							<div class="col-md-6">
								<div class="form-group">
									<label>Input Title :</label>
									<input type="text" name="inputs[]" class="form-control" placeholder="Input Title" value="{{ $in->input_title }}">
								</div>
							</div>
							<div class="col-md-6">
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
							<i class="fa fa-times" onclick="removeInputRow(event ,{{ $in->id }})"></i>
						</div>
						@endforeach
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-6">
							<button class="btn btn-primary">Save</button>
						</div>
						<div class="form-group col-md-6">
							<button type="button" onclick="renderInput()" class="btn btn-success pull-right">Add Other Input</button>
						</div>
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

	function renderInput() {
		$.ajax({
			url:"{{ url('tasks/render/inputRow') }}",
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