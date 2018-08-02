@extends('layouts.app')

@section('styles')
<style type="text/css">
  @include('contracts.style')
</style>
@endsection

@section('content')
  <main id="main-container">
      <!-- Page Header -->
      <div class="content bg-gray-lighter">
        <div class="row items-push">
          <div class="col-sm-7">
            <h1 class="page-heading">
              Contracts
            </h1>
          </div>
        </div>
      </div>
      <!-- END Page Header -->
      <!-- Stats -->
      <div class="content">
        <!-- Simple Blocks -->
          <div class="row">
              <div class="col-sm-6 col-lg-12">
                  <div class="block block-bordered">
                      <div class="block-header bg-gray-lighter">
                        <h3 class="block-title">Total Contracts</h3>
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
                              <li><a href="#tab01">Companies Quotation</a></li>
                              <li><a href="#tab02">Contract Signed</a></li>
                            </ul>
                          </div>
                          <div class="tab-select-outer">
                            <select id="tab-select">
                              <option value="#tab01">Companies Quotation</option>
                              <option value="#tab02">Contract Signed</option>
                            </select>
                          </div>
                          <div id="tab01" class="tab-contents">
                          </div>
                          <div id="tab02" class="tab-contents">
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
@endsection

@section('scripts')
<script type="text/javascript">
  @include('contracts.script')
</script>
@endsection


