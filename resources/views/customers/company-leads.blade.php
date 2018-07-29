@extends('layouts.app')

@section('content')
    
<!-- Main Container -->
<main id="main-container">

  <!-- Page Header -->
  <div class="content bg-gray-lighter">
      <div class="row items-push">
          <div class="col-sm-7">
              <h1 class="page-heading">
                  Customers <small>Requsted Call</small>
              </h1>
          </div>
          <div class="col-sm-5 text-right hidden-xs">
              <ol class="breadcrumb push-10-t">
                  <li>Requsted Call</li>
                  <li><a class="link-effect" href="">Customers</a></li>
              </ol>
          </div>
      </div>
  </div>
  <!-- END Page Header -->

    <!-- Stats -->
    <div class="content bg-white border">
        <div class="row items-push text-uppercase">
            <div class="col-xs-6 col-sm-2">
                <div class="font-w700  animated fadeIn">In Progress <span class="status progress"></span></div>
                <a class="h2 font-w300 text-primary animated flipInX" href="#">30</a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <div class="font-w700 text-gray-darker animated fadeIn">Appointment</div>
                <a class="h2 font-w300 text-primary animated flipInX" href="#">5</a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <div class="font-w700 text-gray-darker animated fadeIn">Call Back</div>
                <a class="h2 font-w300 text-primary animated flipInX" href="#">32</a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <div class="font-w700 text-gray-darker animated fadeIn">Other Project</div>
                <a class="h2 font-w300 text-primary animated flipInX" href="#">32</a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <div class="font-w700 text-gray-darker animated fadeIn">No Answer</div>
                <a class="h2 font-w300 text-primary animated flipInX" href="#">32</a>
            </div>
            <div class="col-xs-6 col-sm-2">
                <div class="font-w700 text-gray-darker animated fadeIn">Not Interested</div>
                <a class="h2 font-w300 text-primary animated flipInX" href="#">32</a>
            </div>
            <div class="col-xs-6 col-sm-2">
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
            <div class="col-md-10">
              <div class="font-w700 text-gray-darker animated fadeIn">Filter</div>
              <br>
                <select class="select2 form-control" id="example-select2-multiple" name="example-select2-multiple" style="width: 100%;" data-placeholder="Choose many.." multiple>
                    <option></option><!-- Required for data-placeholder attribute to work with Chosen plugin -->
                    <option value="1">In Progress</option>
                    <option value="2">Appointment</option>
                    <option value="3">Call Back</option>
                    <option value="4">Other project</option>
                    <option value="5">No Answer</option>
                    <option value="6">Not Intrested</option>
                </select>


            </div>
        </div>
    </div>
    <!-- End Stats -->

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-popout">
        <div class="modal-content">
          <form action="{{ url('customers/add/ajax') }}" method="post" onsubmit="addLead(event);return false">
            @csrf
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" id="add-close" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Add <small>New Customer</small></h3>
                </div>
                <div class="block-content">
                	@include('customers.pop-up.add-lead')
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
                <button class="btn btn-sm btn-primary" type="submit"><i class="fa fa-check"></i> Ok</button>
            </div>
          </form>
        </div>
      </div>
    </div>


      <div class="content">
        <!-- Simple Blocks -->
          <div class="row">
              <div class="col-sm-6 col-lg-12">
                  <div class="block block-bordered">
                      <div class="block-header bg-gray-lighter">
                      	  <ul class="block-options">
                      	  	<li>
                      	  		<button type="button" class="btn btn-default btn-xs" onclick="openPopUp()">
                      	  			<i class="fa fa-plus"></i>
                      	  		</button>
                      	  	</li>
                      	  </ul>
                          <h3 class="block-title">Customers List</h3>
                      </div>
                      <div class="block-content">
                        <!-- Striped Table -->
                        <table class="table table-bordered table-striped js-dataTable-full">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 50px;">ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Need</th>
                                    <th>Refer</th>
                                    <th>Source</th>
                                    <th class="">Customer Message</th>
                                </tr>
                            </thead>
                            <tbody id="customers-table">
                              @foreach($leads as $c)
                                <tr>
                                    <td>{{ @$c->id }}</td>
                                    <td>{{ @$c->name }}</td>
                                    <td>{{ @$c->phone }}</td>
                                    <td>{{ @$c->need_type }}</td>
                                    <td>{{ @$c->project->name }}</td>
                                    <td>{{ @$c->source->name }}</td>
                                    <td>{{ @$c->message }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                        <!-- END Striped Table -->
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
<script>
  $(document).ready(function () {
    $('.select2').select2()
  })

  function openPopUp(){
  	$("#add").modal('toggle')
  }

  function addLead(event) {
    var form = $(event.target) ,data = form.serialize() ,url = form.attr('action') ,type = form.attr('method')
    $.ajax({
      url :url,
      type:type,
      data:data,
      dataType:'json',
      success:function(rData) {
        if (rData.status == 'ok') {
          $('#add-close').click()
          $('#add-close').click()
          $('#customers-table').append(rData.code)
          $('table').DataTable()
          swal('Lead Added Successfully!' ,{icon:'success'})
        } else {
          swal('Sorry ,can`t add this lead right now!' ,{icon:'error'})
        }
      }
    })
  }
</script>
@endsection