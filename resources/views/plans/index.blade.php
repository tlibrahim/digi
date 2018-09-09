@extends('layouts.app')

@section('styles')
<style type="text/css">
	.fa-times{
		position: absolute;
		top: 5px;
		right: 0
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
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('plans' ,'add') == 1 )
					<button type="button" class="pull-right btn btn-info" style="margin-bottom: 15px" onclick="loadPlan()">
						Add Plan
					</button>
					@endif
				</div>
				<div class="row">
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
		        </div>
	            <div class="row" id="plans-datatable">
	              	<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  <th>ID</th>
		                  <th width="25%">Title</th>
		                  <th>Price</th>
		                  <th>Industry</th>
		                  <th>Services</th>
		                  <th>Status</th>
		                  <th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($plans as $p)
		                	<tr>
		                		<td>{{ @$p->id }}</td>
		                		<td>{{ @$p->title }}</td>
		                		<td>{{ @$p->price }}</td>
		                		<td>{{ @$p->industry_id == 0 ? 'General' : @$p->industry->name }}</td>
		                		<td>
		                			@foreach(@$p->services as $s)
		                			<span class="label label-success">{{ @$s->service->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
		                			<label class="css-input switch switch-sm switch-primary">
	                                    <input onclick='statusChange("{{ url('plans/active/'.@$p->id) }}")' type="checkbox" id="login2-remember-me" {{ @$p->status == 1 ? 'checked' : '' }} name="login2-remember-me"><span></span>
	                                  </label>
		                		</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('plans' ,'edit') == 1 )
							        <button onclick="loadPlan({{ @$p->id }})" class="btn btn-info">Edit</button>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('plans' ,'delete') == 1 )
							        <button onclick="deletePlan({{ @$p->id }})" class="btn btn-danger">Delete</button>
							        @endif
		                		</td>
		                	</tr>
		                	@endforeach
		                </tbody>
	              	</table>
	          	</div>
	        </div>
        </div>
    </div>
</main>

<div id="pop-up-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content" style="overflow:  hidden;"></div>
	</div>
</div>

@endsection

@section('scripts')
<script>
	function addEditPlan(event) {
		var form = $(event.target), data = form.serialize(), url = form.attr('action'), type = form.attr('method')
		$.ajax({
			dataType:'json',
			type:type,
			url:url,
			data:data,
			success:function(rData) {
				if (rData.status == 'ok') {
					swal({text:rData.msg ,icon:'success'})
					$("#pop-up-modal").modal('toggle')
					$("#plans-datatable").html(rData.code)
					$('table').DataTable()
				}
			}
		})
	}

	function loadPlan(id) {
		var url = ''
		if (id == undefined) {
			url = '{{ url("plans-loaders/add") }}'
		} else {
			url = '{{ url("plans-loaders/edit") }}/'+id
		}
		$.ajax({
			dataType:'json',
			type:'GET',
			url:url,
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#pop-up-modal .modal-content").html(rData.code)
					$("#pop-up-modal").modal('toggle')
				} else {
					swal({text:'There is some error' ,icon:'warning'})
				}
			}
		})
	}

	function addService() {
		$.ajax({
			dataType:'json',
			type:'GET',
			url:'{{ url("plans-render") }}',
			success:function(rData) {
				$("#plan-add-services").append(rData.code)
			}
		})
	}

	function cancelService(event ,id) {
		if (id != undefined) {
			$.ajax({
				dataType:'json',
				type:'GET',
				url:'{{ url("plans-delete-service") }}/'+id,
				success:function(rData) {
					if (rData.status == 'ok') {
						$(event.target).parent().remove()
						$("#plans-datatable").html(rData.code)
						$('table').DataTable()
					}
				}
			})
		} else {
			$(event.target).parent().remove()
		}
	}

	function deletePlan(id) {
		swal({
		  title: "Are you sure?",
		  text: "Once deleted, you will not be able to recover this plan!",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
		  if (willDelete) {
		  	$.ajax({
				dataType:'json',
				type:'GET',
				url:'{{ url("plans/delete") }}/'+id,
				success:function(rData) {
					if (rData.status == 'ok') {
						swal("Plan has been deleted!", {icon: "success"})
						$("#plans-datatable").html(rData.code)
						$('table').DataTable()
					}
				}
			})
		  } else {
		    swal("Your plan is safe!");
		  }
		})
	}

	function statusChange(link) {
		$.ajax({
			dataType:'json',
			type:'GET',
			url:link,
			success:function(rData) {
				if (rData.status == 'ok') {
					swal(rData.msg ,{icon:rData.icon})
				} else {
					swal("There is some error" ,{icon:'error'});
				}
			}
		})
	}
</script>
@endsection

