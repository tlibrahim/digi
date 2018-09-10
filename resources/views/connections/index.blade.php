@extends('layouts.app')

@section('styles')
<style type="text/css">
  	h4 span{
    	font-size: 13px;
    	font-weight: normal
  	}
  	h4{
    	font-size: 16px;
  	}
  	h3{
    	font-size: 19px;
  	}
</style>
<link rel="stylesheet" type="text/css" href="{{ url('date-time-picker/datetimepicker.css') }}">
@endsection

@section('content')

  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter" style="min-height: 50px">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              Connections
            </h1>
          </div>
        </div>
      </div>

      <div class="content">
        <!-- Simple Blocks -->
          <div class="row">
              <div class="col-sm-6 col-lg-12">
                  <div class="block block-bordered">
                      <div class="block-header bg-gray-lighter">
                        <div class="btn-group pull-right" role="group">
                          @if ( \App\Http\Controllers\UsersController::myPermitedTrigger('connections' ,'add') == 1 )
                            <a class="btn btn-default" title="Add Connection" onclick="loadPopUp('{{ url('connections/pop-up-loader/add') }}')">
                              <i class="fa fa-plus"></i>
                            </a>
                          @endif
                        </div>
                        <h3 class="block-title">Total Connections</h3>
                      </div>
                      <div class="block-content" id="div-content-table">
                        @if(session()->has('status'))
                        <div class="alert alert-success">{{session('status')}}</div>
                        @endif
                        @if(session()->has('error'))
                        <div class="alert alert-danger">{{session('error')}}</div>
                        @endif
                        @if($errors->any())
                          @foreach($errors as $er)
                          <div class="alert alert-danger">{{ $er }}</div>
                          @endforeach
                        @endif
                        <!-- Striped Table -->
                        <table class="table table-bordered table-striped">
                        	<thead>
                        		<th>ID</th>
                        		<th>Name</th>
                        		<th>Company Name</th>
                        		<th>Position</th>
                        		<th>Phone</th>
                        		<th>Email</th>
                        		<th>Actions</th>
                        		<th>Feedback</th>
                        	</thead>
                        	<tbody>
                        		@foreach($connections as $c)
                        		<tr>
                        			<td>{{ @$c->id }}</td>
                        			<td>{{ @$c->name }}</td>
                        			<td>{{ @$c->company_name }}</td>
                        			<td>{{ @$c->position }}</td>
                        			<td>{{ @$c->phone }}</td>
                        			<td>{{ @$c->email }}</td>
                        			<td>
                        				@if ( \App\Http\Controllers\UsersController::myPermitedTrigger('connections' ,'edit') == 1 )
				                            <a class="btn btn-default" title="Edit Connection" onclick="loadPopUp('{{ url('connections/pop-up-loader/edit/'.@$c->id) }}')">
				                              	<i class="fa fa-edit"></i>
				                            </a>
				                        @endif
                        				@if ( \App\Http\Controllers\UsersController::myPermitedTrigger('connections' ,'delete') == 1 )
				                            <a class="btn btn-default" title="Delete Connection" onclick="deleteConnection('{{ url('connections/delete/'.@$c->id) }}')">
				                              	<i class="fa fa-trash-o"></i>
				                            </a>
				                        @endif
                        			</td>
                        			<td>
                        				@if ( \App\Http\Controllers\UsersController::myPermitedTrigger('connections' ,'add_feedback') == 1 )
	                        				<a class="btn btn-default" title="Add Feedback" onclick="loadPopUp('{{ url('connections/pop-up-loader/addfeedback/'.@$c->id) }}')">
					                        	<i class="fa fa-link"></i>
					                        </a>
				                        @endif
                        				@if ( \App\Http\Controllers\UsersController::myPermitedTrigger('connections' ,'show_feedback') == 1 )
	                        				<a class="btn btn-default" title="Show Feedbacks" onclick="loadPopUp('{{ url('connections/pop-up-loader/showfeedback/'.@$c->id) }}')">
					                        	<i class="si si-feed"></i>
					                        </a>
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
          <!-- END Simple Blocks -->
    </div>
    <!-- END Stats -->
  </main>
  <!-- END Main Container -->

<div id="pop-up-modal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
    	<div class="modal-content" style="overflow:  hidden;"></div>
	</div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="{{ url('date-time-picker/datetimepicker.js') }}"></script>
<script type="text/javascript">
	function loadDateTime() {
	    $(".date_time").datetimepicker({autoclose: true});
	}

	function loadPopUp(link) {
		$.ajax({
			url:link,
			dataType:'json',
			type:'GET',
			success:function(rData) {
				if (rData.status == 'ok') {
					$("#pop-up-modal .modal-content").html(rData.code)
					$("#pop-up-modal").modal('toggle')
				} else {
					swal('There is some error' ,{icon:'error'})
				}
			}
		})
	}

	function deleteConnection(link) {
		swal({
			title: "Are you sure?",
		  	text: "you want to delete this connection!",
		  	icon: "warning",
		  	buttons: true,
		  	dangerMode: true,
		})
		.then((isDelete) => {
			if (isDelete) {
				$.ajax({
					url:link,
					dataType:'json',
					type:'GET',
					success:function(rData) {
						if (rData.status == 'ok') {
							swal('Connection Deleted Successfully!' ,{icon:'success'}).then((v)=>{location.reload()})
						} else {
							swal('There is some error!' ,{icon:'error'})
						}
					}
				})
			} else {
				swal('Your Connection Is Safe!' ,{icon:'warning'})
			}
		})
	}

	function changeRelatedType(event ,id) {
		var type = $(event.target).val(),
			link = '{{ url('connections/render') }}/'+type
		if (id != undefined) {
			link += '/'+id
		}
		if (type) {
			$.ajax({
				url:link,
				dataType:'json',
				type:'GET',
				success:function(rData) {
					if (rData.status == 'ok') {
						$("#related-type-div").html(rData.code)
						$('.select2').select2()
					} else {
						swal('There is some error' ,{icon:'error'})
					}
				}
			})
		}
	}

	function loadFeedbackForm(event ,con_id){
	    var id = $(event.target).val()
	    $("#feedback-id-"+con_id).val(id)
	    $.ajax({
	      	type:'GET',
	      	dataType:'json',
	      	url:'{{ url("feedback-forms/render") }}/'+$(event.target).val(),
	      	success : function (rData) {
		        $('.form-loaded-body').html(rData.code)
		        loadDateTime()
		        $(".date_time").datetimepicker({autoclose: true});
		        $(".date").datepicker({format:'dd-mm-yyyy' ,autoclose: true})
	      	}
	    })
	    $(event.target).parent().parent().siblings().find('button[type="submit"]').show()
	}

	function postAddFeedback(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	        	if (rData.status == 'ok') {
	        		swal('Feedback Created Successfully!' ,{icon:'success'})
	        		.then((v) => {
	        			$('body').removeClass('modal-open')
                        $('.modal-backdrop').remove()
                        $('#pop-up-modal').modal('toggle')
	        		})
	        	} else {
	        		swal('Soorry , we can`t create feedback!' ,{icon:'error'})
	        	}
	        }
	    })
	    return false
	}
</script>
@endsection



