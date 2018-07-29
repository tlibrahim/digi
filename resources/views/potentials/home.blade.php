@extends('layouts.app')

@section('styles')
<style type="text/css">
  .content{
    min-height: 100px
  }
  .delete-in-profiling{
    position:  absolute;
    top: 10px;
    right: 50px;
  }
  .delete-in-profiling:hover{
    cursor: pointer;
    color: gray;
  }
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
  .bd-example-modal-lg h3{
    margin-top: 0;
    font-size: 16px
  }
  .bd-example-modal-lg .form-group{
    margin-top: 5px
  }
  .progress-bar-parent{
      width:100%;
      border:1px solid #337ab7;
      border-radius:5px;
  }
  .progress-bar-child{
      background-color:#70bdff;
      height:100%;
      padding:1px 10px 0;
      border-radius:5px;
  }
	.fa-times{
		position: absolute;
		top: 5px;
		right: 0
	}
	.fa-times:hover{
		cursor: pointer;
	}
</style>
<link rel="stylesheet" type="text/css" href="{{ url('date-time-picker/datetimepicker.css') }}">
@endsection

@section('content')

  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              Potantials
            </h1>
          </div>
        </div>
      </div>
      <!-- END Page Header -->
      <!-- Stats -->
      <div class="content bg-white border">
        <div class="row items-push text-uppercase">
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Companies</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Today</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">30</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Connection</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> This Month</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">5</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Calls</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">32</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Meetings</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">32</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Contracts</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">%32</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Proposals</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">%32</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn"> Plans</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">%32</a>
            </div>
            <div class="col-xs-6 col-sm-1">
                <div class="font-w700 text-gray-darker animated fadeIn">Performance</div>
                <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> All Time</small></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="base_comp_charts.html">%32</a>
            </div>
            <div class="col-xs-6 col-sm-3">
              <div class="form-group">
                  <div class="font-w700 text-gray-darker animated fadeIn">Date Range</div>
                    <br>
                    <div class="input-daterange input-group" data-date-format="mm/dd/yyyy">
                        <input class="form-control" type="text" id="example-daterange1" name="example-daterange1" placeholder="From">
                        <span class="input-group-addon"><i class="fa fa-chevron-right"></i></span>
                        <input class="form-control" type="text" id="example-daterange2" name="example-daterange2" placeholder="To">
                    </div>
              </div>
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
                          @if( $tl_logged || in_array('add_potential' ,$myPermissions) )
                            <a class="btn btn-default" title="Add Connection"
                              data-target="#add-potentail" data-toggle="modal">
                              <i class="fa fa-plus"></i>
                            </a>
                            @include('potentials.pop-up.add-potential')
                          @endif
                        </div>
                        <h3 class="block-title">Total Potentials ('Companies')</h3>
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

  @include('potentials.pop-up.profiling.view-profile')

@endsection

@section('scripts')
<script type="text/javascript" src="{{ url('date-time-picker/datetimepicker.js') }}"></script>
<script type="text/javascript">
  var url = '{{ url("potentials/remove") }}'

  function fireRemove(_url ,event) {
    $.ajax({
      type:'GET',
      url:_url,
      dataType:'json',
      success : function (rData) {
        if (rData.status == 'ok') {
          $(event.target).parent().remove()
        } else {
          swal("Please just click the X button or click F5")
        }
      }
    })
  }

  function deleteRefs(id ,event) {
    var _url = url + '/refs/' + id
    fireRemove(_url ,event)
  }

  function deleteProducts(id ,event) {
    var _url = url + '/prods/' + id
    fireRemove(_url ,event)
  }

  function deleteSites(id ,event) {
    var _url = url + '/sites/' + id
    fireRemove(_url ,event)
  }

  function deleteSocials(id ,event) {
    var _url = url + '/socials/' + id
    fireRemove(_url ,event)
  }

  function editProfiling(event ,profile_id) {
    event.preventDefault()
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    })

    var form = $(event.target) ,url = form.attr('action') ,type = form.attr('method') ,data = form.serialize()
    
    //this area to handle logo upload by ajax request
    var formData = new FormData() ,formDataUrl = '{{ url("potentials/upload-logo") }}/' + profile_id +'/'+ url.split("/")[url.split("/").length - 1]
    var logo = form.find('input[type="file"]:first')[0].files[0]
    if (logo != undefined) {
      if (logo.size > 1024*4*1000) {
        swal("Allowed Size 4MB" ,{icon:'error'})
        return
      }
      if (logo.type != 'image/png' && logo.type != 'image/jpg' && logo.type != 'image/jpeg') {
        console.log(logo.type)
        swal("Allowed Extensions [png ,jpg ,jpeg]" ,{icon:'error'})
        return
      }
      console.log('logo must upload')
      formData.append('logo' ,logo)
      $.ajax({
        url: formDataUrl,
        dataType: 'json',
        data: formData,
        type: 'POST',
        processData: false,
        contentType: false,
        async:false,
        success : function (rData) {
          console.log(rData)
        }
      })
    }

    //this area to handle editing profile data by ajax
    $.ajax({
      dataType:'json',
      url:url,
      type:type,
      data:data,
      success : function (rData) {
        if (rData.status == 'ok') {
          form.html(rData.formBody)
          $('.modal').animate({ scrollTop: 0 }, 'slow');
        } else {
          swal("Some Error")
        }
      } ,
      error : function (erData) {
        console.log(erData)
      }
    })

    return false
  }

  function cancelRow(event) {
    $(event.target).parent().remove()
  }

  function renderRow(key ,event) {
    var renderUrl = '{{ url("potentials/render") }}/'+key
    $.ajax({
      dataType:'json',
      type:'GET',
      url:renderUrl,
      success:function(rData){
        $(event.target).parent().append(rData.code)
      }
    })
  }

  function loadFeedbackForm(event ,pot_id){
    var id = $(event.target).val()
    $("#feedback-id-"+pot_id).val(id)
    $.ajax({
      type:'GET',
      dataType:'json',
      url:'{{ url("feedback-forms/render") }}/'+$(event.target).val(),
      success : function (rData) {
        $('.form-loaded-body').html(rData.code)
        $(".date_time").datetimepicker({autoclose: true});
        $(".date").datepicker({format:'dd-mm-yyyy' ,autoclose: true})
      }
    })
    $(event.target).parent().parent().siblings().find('button[type="submit"]').show()
  }

  function viewProfile(profile_id) {
    $.ajax({
      type:'GET',
      dataType:'json',
      url:'{{ url("potentials/profile-view/render") }}/'+profile_id,
      success : function (rData) {
        $('#view-profile-body').html(rData.code)
        $("#view-profiling-modal").modal('toggle')
      }
    })
  }

  function deleteConnection(con_id ,event) {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this connection!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        $.ajax({
          dataType:'json',
          type:'GET',
          url:'{{ url("potentials/connections/delete") }}/'+con_id,
          success:function(rData){
            swal(rData.msg, {
              icon: "success",
            })
            var div = $("#prog-perc-"+rData.id)
            div.css('width' ,rData.perc)
            div.text(rData.perc)
            $(event.target).parent().parent().parent().remove()
          }
        })
      } else {
        swal("Your connection is safe!");
      }
    });
  }

  function editConnection(event) {
    $.ajax({
      dataType:'json',
      type:'POST',
      data:$(event.target).serialize(),
      url:$(event.target).attr('action'),
      success:function(rData){
        swal(rData.msg, {
          icon: rData.icon,
        })
      }
    })
    return false
  }

  function verified(url) {
    $.ajax({
      dataType:'json',
      url:url,
      type:'GET',
      success:function (rData) {
        swal(rData.msg ,{icon:rData.icon})
      }
    })
  }
  
    function deletePotential(event){
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this company!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
              $.ajax({
                  dataType:dType,
                  url:url,
                  data:data,
                  type:type,
                  success:function(rData) {
                      if (rData.status == 'ok') {
                          var id = url.split("/")
                          id = id[id.length - 1]
                          dTables.row('#potentials-'+id).remove().draw( false )
                          swal({text:rData.msg,icon:rData.icon})
                      } else {
                          swal({text:rData.msg,icon:rData.icon})
                      }
                  }
              })
          } else {
            swal("Company is safe!");
          }
        })
        return false
    }
    
    function loadQuotation(id) {
        $.ajax({
            dataType:'json',
            type:'GET',
            url:'{{ url("potentials-quotation") }}/'+id,
            success:function(rData) {
                $("#pop-up-modal .modal-content").html(rData.code)
                $("#pop-up-modal .modal-dialog").width('50%')
                $("#pop-up-modal").modal('toggle')
                $("#company-id-quotation").val(id)
            }
        })
    }
    
    function cancelService(event ,id) {
        swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this service!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
              if (id != undefined) {
        		$.ajax({
        			dataType:'json',
        			type:'GET',
        			url:'{{ url("potentials-delete-service") }}/'+id,
        			success:function(rData) {
        				if (rData.status == 'ok') {
        				    $(event.target).parent().remove()
        				    swal(rData.msg, {icon: rData.icon})
        			    }
        		    }
        		})
              } else {
        		$(event.target).parent().remove()
        		swal("Your service has been deleted!", {icon: "success"})
        	  }
          } else {
            swal("Your service is safe!");
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
	
	function addEditQuotation(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        dataType:dType,
	        data:data,
	        type:type,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon})
	                $('.close').click()
	                $('.close').click()
	                var div = $("#prog-perc-"+rData.id)
                    div.css('width' ,rData.perc)
                    div.text(rData.perc)
	            }
	        }
	    })
	}
	
	function loadDateTime() {
	    $(".date_time").datetimepicker({autoclose: true});
	}
	
	$(document).ready(function() {
	    $.ajax({
	        url:'{{ url("load-potentials") }}',
	        dataType:'json',
	        type:'GET',
	        success:function(rData) {
	            $("#div-content-table").append(rData.code)
	            dTables = $('table').DataTable()
	            loadDateTime()
	        }
	    })
	})
	
	function postProposal(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon})
	                $('#tasks-td-'+rData.id).html(rData.code)
    	            var div = $("#prog-perc-"+rData.id)
                    div.css('width' ,rData.perc)
                    div.text(rData.perc)
                    $('.modal-backdrop').remove()
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	    return false
	}
	
	function postMeetingFeedback(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon})
	                $('#tasks-td-'+rData.id).html(rData.code)
    	            var div = $("#prog-perc-"+rData.id)
                    div.css('width' ,rData.perc)
                    div.text(rData.perc)
                    $('.modal-backdrop').remove()
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	    return false
	}
	
	function postEditPotential(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                swal(rData.msg, {icon:rData.icon}).then((v) => {
	                    $('#potentials-'+rData.id).html(rData.code)
	                    $('body').removeClass('modal-open')
                        $('.modal-backdrop').remove()
	                    loadDateTime()
	                })
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	    return false
	}
	
	function loadPopUp(id ,url) {
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:url,
	        success:function(rData) {
	            if (rData.status == 'ok') {
	                $('#pop-up-modal .modal-content').html(rData.code)
	                $("#pop-up-modal .modal-dialog").width('40%')
	                $('#pop-up-modal').modal('toggle')
	            } else {
	                swal(rData.msg, {icon:rData.icon})
	            }
	        }
	    })
	}
	
	function postAddConnection(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            swal(rData.msg, {icon:rData.icon})
	            if (rData.msg != 'error') {
    	            var div = $("#prog-perc-"+rData.id)
                    div.css('width' ,rData.perc)
                    div.text(rData.perc)
                    $('#add-connection-'+rData.id).modal('toggle')
                    $('body').removeClass('modal-open')
                    $('.modal-backdrop').remove()
	            }
	        }
	    })
	    return false
	}
	
	function postAddFeedback(event) {
	    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method') ,dType = 'json'
	    $.ajax({
	        type:type,
	        dataType:dType,
	        data:data,
	        url:url,
	        success:function(rData) {
	            swal(rData.msg, {icon:rData.icon}).then((v) => {
	                if (rData.msg != 'error') {
                        $('#addfeedback-'+rData.id).modal('toggle')
                        $('body').removeClass('modal-open')
                        $('.modal-backdrop').remove()
                        $('#potentials-'+rData.id).html(rData.code)
    	            }
    	            loadDateTime()
	            })
	        }
	    })
	    return false
	}
	
	function loadProfiling(id) {
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:'{{ url("load-potential-profiling") }}/'+id,
	        success:function(rData) {
	            $("#pop-up-modal .modal-content").html(rData.code)
	            $("#pop-up-modal .modal-dialog").width('75%')
	            $("#pop-up-modal").modal('toggle')
	        }
	    })
	}
	
	function loadFeedbacksForms(id) {
	    $.ajax({
	        type:'GET',
	        dataType:'json',
	        url:'{{ url("load-potential-feedback") }}/'+id,
	        success:function(rData) {
	            $("#pop-up-modal .modal-content").html(rData.code)
	            $("#pop-up-modal .modal-dialog").width('40%')
	            $("#pop-up-modal").modal('toggle')
	        }
	    })
	}
  
</script>
@endsection


