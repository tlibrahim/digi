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
                            <a class="btn btn-default" href="{{ url('potentials/load/website-companies') }}">
                              Load Website Companies Data
                            </a>
                            <a class="btn btn-default" title="Add Connection"
                              data-target="#add-potentail" data-toggle="modal">
                              <i class="fa fa-plus"></i>
                            </a>
                            @include('potentials.pop-up.add-potential')
                          @endif
                        </div>
                        <h3 class="block-title">Total</h3>
                      </div>
                      <div class="block-content">
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
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th class="text-center">ID</th>
                              <th>Campany Name</th>
                              <th>Industry</th>
                              <th>Assigned To</th>
                              <th>Tasks Progress</th>
                              <th>Documinte</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($potentials as $p)
                            <tr>
                              <td class="text-center">{{ @$p->id }}</td>
                              <td>{{ @$p->companyname }}</td>
                              <td>{{ @$p->industry->name }}</td>
                              <td>{{ @$p->assigned->name }}</td>
                              <td class="hidden-xs">
                                @if($tl_logged)
                                  <a class="btn btn-default" title="Assign To user"
                                    data-target="#assign-potential-{{ @$p->id }}" data-toggle="modal">
                                    <i class="fa fa-arrow-right"></i>
                                  </a>
                                  @include('potentials.pop-up.assign-potential')
                                @endif

                                @if( $tl_logged || in_array('add_connection' ,$myPermissions) )
                                  <a class="btn btn-default" title="Add Connection"
                                    data-target="#connection-{{ @$p->id }}" data-toggle="modal">
                                    <i class="fa fa-link"></i>
                                  </a>
                                  @include('potentials.pop-up.connection')
                                @endif
                                     
                                @if( $tl_logged || in_array('add_profile' ,$myPermissions) )
                                  <a class="btn btn-default" title="Add Profiling"
                                    data-target="#profiling-{{ @$p->id }}" data-toggle="modal">
                                    <i class="fa fa-eye"></i>
                                  </a>
                                  @include('potentials.pop-up.profiling.profile')
                                @endif

                                @if( $tl_logged || in_array('add_feedback' ,$myPermissions) )
                                  <a class="btn btn-default" title="Add Call Feedback"
                                    data-target="#addfeedback-{{ @$p->id }}" data-toggle="modal">
                                    <i class="si si-call-out"></i>
                                  </a>
                                  @include('potentials.pop-up.feedbacks.add-feedback')
                                @endif

                                <!-- <a class="btn btn-default" href="#" title="Add Meeting"><i class="si si-notebook"></i></a> -->

                              </td>
                              <td>
                                <a class="btn btn-default" href="#" title="View Contract"><i class="fa fa-book"></i></a>
                                <a class="btn btn-default" href="#" title="View Invoice"><i class="si si-doc"></i></a>
                                <a class="btn btn-default" href="#" title="View Strategy"><i class="fa fa-line-chart"></i></a>
                                <a class="btn btn-default" href="#" title="View Plan"><i class="fa fa-dot-circle-o"></i></a>
                              </td>
                              <td>
                                <a class="btn btn-default" title="View Profile"
                                  data-target="#view-profiling-{{ @$p->id }}" data-toggle="modal">
                                  <i class="si si-eye"></i>
                                </a>
                                @include('potentials.pop-up.profiling.view-profile')
                                                  
                                <!-- <a class="btn btn-default" href="{{ url('/'.$p->id) }}" title="View Connection"><i class="si si-users"></i></a> -->
                                                  
                                <a class="btn btn-default" title="Feedback"
                                  data-target="#viewfeedback-{{ @$p->id }}" data-toggle="modal">
                                  <i class="si si-feed"></i>
                                </a>
                                @include('potentials.pop-up.feedbacks.view-feedback')

                                @if( $tl_logged || in_array('edit_potential' ,$myPermissions) )
                                  <a class="btn btn-default pull-left" title="Edit"
                                    data-target="#edit-potentail-{{ @$p->id }}" data-toggle="modal">
                                    <i class="si si-pencil"></i>
                                  </a>
                                  @include('potentials.pop-up.edit-potential')
                                @endif

                                <!-- <form method="post" action="{{ url('potentials/'.@$p->id) }}" class="pull-left" style="margin-left: 5px">
                                  @csrf
                                  <input name="_method" type="hidden" value="DELETE">
                                  <button class="btn btn-default"><i class="si si-trash"></i></button>
                                </form> -->
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
    var formData = new FormData() ,formDataUrl = '{{ url("potentials/upload-logo") }}/' + profile_id
    var logo = form.find('input[type="file"]:first')[0].files[0]
    if (logo != undefined) {
      if (logo.size > 1024*4*1000) {
        alert("Allowed Size 4MB")
        return
      }
      if (logo.type != 'image/png' && logo.type != 'image/jpg' && logo.type != 'image/jpeg') {
        console.log(logo.type)
        alert("Allowed Extensions [png ,jpg ,jpeg]")
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
</script>
@endsection


