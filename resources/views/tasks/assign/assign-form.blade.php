@extends('layouts.app')

@section('content')
    
<main id="main-container">
      <div class="content bg-gray-lighter" style="min-height: 50px;">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              Assign Quotation Tasks
            </h1>
          </div>
        </div>
      </div>
	<!-- Page Header -->
	<div class="content">
		<div class="row items-push">
			<div class="col-md-10 col-md-offset-1">
	            <div class="row">
	            	<div class="col-md-10 col-md-offset-1" style="background-color: white;padding-top: 25px">
	            		<form method="post">
				            @if($errors->any())
				            	@foreach($errors as $e)
					            <div class="alert alert-danger">
					            	<strong>{{ $e }}</strong>
					            </div>
					            @endforeach
				            @endif
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
							@php
								$counter = 0;
							@endphp
							@foreach($services as $c => $s)
								@for($i = 0; $i < (int)$s['quantity']; $i++)
									<h4>{{ $s['service']->name }} ({{ $i + 1 }}) :</h4>
									@foreach(@$s['task']['tasks'] as $k => $t)
										@php
										$quot_task = 
													$quot
														->tasks_assign()
														->where('service_id' ,@$s['service']->id)
														->where('task_id' ,@$t->id)
														->where('q_q_s_id' ,
																	\App\QuotationServiceQuantity::
																			where('quotation_id' ,@$quot_id)
																			->where('service_id' ,@$s['service']->id)
																			->where('qnt_lvl' ,$i)
																			->first()->id)
														->first();
										@endphp
										<div class="col-md-12">
											<div class="form-group col-md-4">
												<label>Task</label>
												<input type="hidden" name="data[{{ $counter }}][service_id]" value="{{ @$s['service']->id }}">
												<input type="hidden" name="data[{{ $counter }}][quotation_id]" value="{{ @$quot_id }}">
												<input type="hidden" name="data[{{ $counter }}][task_id]" value="{{ @$t->id }}">
												<input type="hidden" name="data[{{ $counter }}][serialize_level]" value="{{ @$t->serialize_level }}">
												<input type="hidden" name="data[{{ $counter }}][qnt_lvl]" value="{{ $i }}">
												<input disabled type="text" value="{{ @$t->name }}" placeholder="{{ @$t->name }}" class="form-control">
											</div>
											<div class="form-group col-md-4">
												<label>User</label>
												<select class="form-control" required name="data[{{ $counter }}][user_id]" {{ @$quot_task->is_done == 1 ? 'disabled' : '' }}>
													@foreach($s['task']['users'][$k] as $u)
													<option {{ @$quot_task->user_id == $u->id ? 'selected' : '' }} value="{{ $u->id }}">{{ $u->name }}</option>
													@endforeach
												</select>
											</div>
											<div class="form-group col-md-4">
												<label>Dead Line</label>
												<input {{ @$quot_task->is_done == 1 ? 'disabled' : '' }} value="{{ @$quot_task->end_date }}"
													type="text" placeholder="yyyy-mm-dd" name="data[{{ $counter }}][end_date]" class="form-control date">
											</div>
										</div>
										@php
											$counter++;
										@endphp
									@endforeach
									@if(!$loop->last)
										<div class="col-md-12"><hr></div>
									@endif
								@endfor
							@endforeach
							<div class="col-md-12">
								<div class="form-group col-md-6">
									<button class="btn btn-primary">Save</button>
								</div>
							</div>
						</form>
	            	</div>
	          	</div>
	        </div>
        </div>
    </div>
</main>

@endsection

@section('scripts')
<script>
	$(document).ready(function() {
		$('.date').datepicker({format:'yyyy-mm-dd',autoclose:true})
	})
</script>
@endsection

