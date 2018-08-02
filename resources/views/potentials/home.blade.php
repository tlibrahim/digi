@extends('layouts.app')

@section('styles')
<style type="text/css">
  @include('potentials.style')
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
                          @if(  in_array('add_potential' ,$myPermissions) )
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
                        <div class="tabs">
                          <div class="tab-button-outer">
                            <ul id="tab-button">
                              <li><a href="#tab01">Profiling</a></li>
                              <li><a href="#tab02">In Progress 'Proposal/Quotation'</a></li>
                              <li><a href="#tab03">Completed</a></li>
                            </ul>
                          </div>
                          <div class="tab-select-outer">
                            <select id="tab-select">
                              <option value="#tab01">Tab 1</option>
                              <option value="#tab02">Tab 2</option>
                              <option value="#tab03">Tab 3</option>
                            </select>
                          </div>

                          <div id="tab01" class="tab-contents">
                          </div>
                          <div id="tab02" class="tab-contents">
                          </div>
                          <div id="tab03" class="tab-contents">
                          </div>
                        </div>
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
  @include('potentials.script')
</script>
@endsection


