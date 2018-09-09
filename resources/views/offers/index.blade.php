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
                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('offers' ,'add') == 1 )
					<button type="button" class="pull-right btn btn-info" style="margin-bottom: 15px" onclick="loadOffer()">
						Add Offer
					</button>
					@endif
				</div>
				<div class="row">
		            @if($errors->any())
		            	@foreach($errors->all() as $e)
				            <div class="alert alert-danger">
				            	<strong>{{ @$e }}</strong>
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
		        </div>
	            <div class="row" id="plans-datatable">
	              	<table id="example1" class="table table-bordered table-striped">
		                <thead>
		                <tr>
		                  	<th>ID</th>
		                  	<th width="15%">Name</th>
		                  	<th>Type</th>
		                  	<th>Total</th>
		                  	<th>Discount</th>
		                  	<th>Plan/Service</th>
		                  	<th>Status</th>
		                  	<th>Actions</th>
		                </tr>
		                </thead>
		                <tbody>
		                	@foreach($offers as $offer)
		                	<tr>
		                		<td>{{ @$offer->id }}</td>
		                		<td>{{ @$offer->name }}</td>
		                		<td>{{ @$offer->type }}</td>
		                		<td>{{ @$offer->total }}</td>
		                		<td>{{ @$offer->total_discount }}</td>
		                		<td>
		                			@foreach(@$offer->plans as $plan)
		                				<span class="label label-success">{{ @$plan->plan->title }}</span>
		                			@endforeach
		                			@foreach(@$offer->services as $service)
		                				<span class="label label-success">({{ @$service->quantity }}) {{ @$service->service->name }}</span>
		                			@endforeach
		                		</td>
		                		<td>
		                			<label class="css-input switch switch-sm switch-primary">
	                                    <input onclick='statusChange("{{ url('offers/active/'.@$offer->id) }}")' type="checkbox" id="login2-remember-me" {{ @$offer->status == 1 ? 'checked' : '' }} name="login2-remember-me"><span></span>
	                                  </label>
		                		</td>
		                		<td>
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('offers' ,'edit') == 1 )
							        <button onclick="loadOffer({{ @$offer->id }})" class="btn btn-info">Edit</button>
							        @endif
                                    @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('offers' ,'delete') == 1 )
							        <button onclick="deleteOffer('{{ url('offers/delete/'.@$offer->id) }}')" class="btn btn-danger">Delete</button>
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
	function loadOffer(id) {
		var url = ''
		if (id == undefined) {
			url = '{{ url("offers/load-offer") }}'
		} else {
			url = '{{ url("offers/load-offer") }}/'+id
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
					swal({text:'There is some error' ,icon:'error'})
				}
			}
		})
	}

	function loadPlanOrService(event) {
		var type = $(event.target).val()
		$.ajax({
			dataType:'json',
			type:'GET',
			url:'{{ url('offers/render') }}/'+type,
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#plans-or-services").html(rData.code)
					$('.select2').select2()
				} else {
					swal({text:'There is some error' ,icon:'error'})
				}
			}
		})
	}

	function changeType(event) {
		if ( $(event.target).val() == 'Free Service' ) {
			$('input[name="total"]').val('')
			$('input[name="total"]').prop('disabled' ,true)
			$('input[name="total_discount"]').val('')
			$('input[name="total_discount"]').prop('disabled' ,true)
		} else {
			$('input[name="total"]').prop('disabled' ,false)
			$('input[name="total_discount"]').prop('disabled' ,false)
		}
	}

	function addMoreService() {
		$.ajax({
			dataType:'json',
			type:'GET',
			url:'{{ url('offers/more-service') }}',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#offer-services").append(rData.code)
				} else {
					swal({text:'There is some error' ,icon:'error'})
				}
			}
		})
	}

	function cancelService(event) {
		$(event.target).parent().remove()
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

	function addEditOffer(event) {
		var form = $(event.target) ,data = form.serialize() ,link = form.attr('action') ,method = form.attr('method')
		$.ajax({
			dataType:'json',
			type:method,
			data:data,
			url:link,
			success:function(rData) {
				if (rData.status == 'ok') {
					swal(rData.msg ,{icon:rData.icon}).then((v)=>{location.reload()})
				} else {
					swal("There is some error" ,{icon:'error'});
				}
			}
		})
	}

	function deleteOffer(link) {
		swal({
		  	title: "Are you sure?",
		  	text: "you want to delete this offer?!!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		}).then( (deleted) => {
			if (deleted) {
				$.ajax({
					dataType:'json',
					type:'GET',
					url:link,
					success:function(rData) {
						if (rData.status == 'ok') {
							swal(rData.msg ,{icon:rData.icon}).then( (v) => {location.reload()} )
						} else {
							swal("There is some error" ,{icon:'error'});
						}
					}
				})
			} else {
				swal('Delete Offer Canceled' ,{icon:'warning'})
			}
		} )
	}
</script>
@endsection

