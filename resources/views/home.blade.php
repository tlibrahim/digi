@extends('layouts.app')

@section('content')
<!-- Main Container -->
<main id="main-container">
<!-- Page Header -->
<div class="content bg-gray-lighter">
<div class="row items-push">
<div class="col-sm-7">
<h1 class="page-heading">
Settings <small>Home page Edite</small>
</h1>
</div>
<div class="col-sm-5 text-right hidden-xs">
<ol class="breadcrumb push-10-t">
<li>Struchutre</li>
<li><a class="link-effect" href="">Settings</a></li>
</ol>
</div>
</div>
</div>
<!-- END Page Header -->
<!-- Page Content -->
<div class="content">
<!-- Content Grid -->
<h2 class="content-heading">Content Grid <small>Useful for tiles/widgets</small></h2>
<div class="content-grid">
<div class="row">
<div class="col-xs-4">
<div class="block">
<div class="block-content">
<p>Departments</p>
<a href="{{Url('/adddep')}}">Add</a>
<!-- Striped Table -->
<table class="table table-striped">
<thead>
<tr>
<th class="text-center" style="width: 50px;">#</th>
<th>Name</th>
<th class="hidden-xs">Related Tasks</th>
<th class="text-center" style="width: 100px;">Actions</th>
</tr>
</thead>
<tbody>


<tr>
<td class="text-center">1</td>
<td>Advertising</td>
<td class="hidden-xs">
<span class="label label-success">Logo</span>
<span class="label label-success">Post Design</span>
<span class="label label-success">Master Visual</span>
</td>
<td class="text-center">
<div class="btn-group">
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
</div>
</td>
</tr>
<tr>
<td class="text-center">2</td>
<td>Digital</td>
<td class="hidden-xs">
<span class="label label-success">Tone Of Voice</span>
<span class="label label-success">Post Design</span>
<span class="label label-success">Master Visual</span>
</td>
<td class="text-center">
<div class="btn-group">
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
</div>
</td>
</tr>
</tbody>
</table>

<!-- END Striped Table -->
</div>
</div>
</div>

<div class="col-xs-4">
<div class="block">
<div class="block-content">
<p>Posisions</p>


<!-- Striped Table -->
  <table class="table table-striped">
      <thead>
          <tr>
              <th class="text-center" style="width: 50px;">#</th>
              <th>Posision</th>
              <th class="hidden-xs">Related Tasks</th>
              <th class="text-center" style="width: 100px;">Actions</th>
          </tr>
      </thead>
      <tbody>


          <tr>
              <td class="text-center">1</td>
              <td>Art Director</td>
              <td class="hidden-xs">
                  <span class="label label-success">Logo</span>
                  <span class="label label-success">Post Design</span>
                  <span class="label label-success">Master Visual</span>
              </td>
              <td class="text-center">
                  <div class="btn-group">
                      <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                  </div>
              </td>
          </tr>
          <tr>
              <td class="text-center">2</td>
              <td>Social Media TL</td>
              <td class="hidden-xs">
                  <span class="label label-success">Tone Of Voice</span>
                  <span class="label label-success">Post Design</span>
                  <span class="label label-success">Master Visual</span>
              </td>
              <td class="text-center">
                  <div class="btn-group">
                      <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
                  </div>
              </td>
          </tr>
      </tbody>
  </table>

<!-- END Striped Table -->
</div>
</div>
</div>
<div class="col-xs-4">
<div class="block">
<div class="block-content">
<p>Tasks </p>
<a href="{{Url('/addtask')}}">Add</a>
<!-- Striped Table -->
<table class="table table-striped">
<thead>
<tr>
<th class="text-center" style="width: 50px;">#</th>
<th>Task Name</th>
<th class="hidden-xs">Inputs</th>
<th class="text-center" style="width: 100px;">Actions</th>
</tr>
</thead>
<tbody>


<tr>
<td class="text-center">1</td>
<td>Logo</td>
<td class="hidden-xs">
<span class="label label-success">Image</span>
</td>
<td class="text-center">
<div class="btn-group">
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
</div>
</td>
</tr>
<tr>
<td class="text-center">2</td>
<td>Video</td>
<td class="hidden-xs">
<span class="label label-success">Script</span>
<span class="label label-success">Storyboard</span>
<span class="label label-success">Illistration Materials</span>
<span class="label label-success">Upload Video</span>
</td>
<td class="text-center">
<div class="btn-group">
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
<button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
</div>
</td>
</tr>
</tbody>
</table>

</div>
</div>
</div>
</div>
<div class="row">

<div class="col-xs-4">
<div class="block">
<div class="block-content">
<p>Approvals </p>
<!-- Striped Table -->
<table class="table table-striped">
  <thead>
      <tr>
          <th class="text-center" style="width: 50px;">#</th>
          <th>Posision</th>
          <th class="hidden-xs">Related Tasks</th>
          <th class="text-center" style="width: 100px;">Actions</th>
      </tr>
  </thead>
  <tbody>


      <tr>
          <td class="text-center">1</td>
          <td>Creative Director</td>
          <td class="hidden-xs">
              <span class="label label-success">Logo</span>
              <span class="label label-success">Post Design</span>
              <span class="label label-success">Master Visual</span>
          </td>
          <td class="text-center">
              <div class="btn-group">
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
              </div>
          </td>
      </tr>
      <tr>
          <td class="text-center">2</td>
          <td>Social Media TL</td>
          <td class="hidden-xs">
              <span class="label label-success">Tone Of Voice</span>
              <span class="label label-success">Post Design</span>
              <span class="label label-success">Master Visual</span>
          </td>
          <td class="text-center">
              <div class="btn-group">
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
              </div>
          </td>
      </tr>
  </tbody>
</table>

<!-- END Striped Table -->
</div>
</div>
</div>


<div class="col-xs-8">
<div class="block">
<div class="block-content">
<p>Users</p>
<!-- Striped Table -->
<table class="table table-striped">
  <thead>
      <tr>
          <th class="text-center" style="width: 50px;">#</th>
          <th>Name</th>
          <th class="hidden-xs">Posision</th>
          <th class="hidden-xs">Tasks</th>
          <th class="hidden-xs">Approvals levels</th>
          <th class="hidden-xs">Department</th>
          <th class="text-center" style="width: 100px;">Actions</th>
      </tr>
  </thead>
  <tbody>


      <tr>
          <td class="text-center">1</td>
          <td>Ahmed Wagdy</td>

          <td class="hidden-xs">
              <span class="label label-success">Marketing Manager</span>

          </td>
          <td class="hidden-xs">
              <span class="label label-success">Logo</span>
              <span class="label label-success">Master Visual</span>
              <span class="label label-success">Calendar</span>
          </td>
          <td class="text-center">
              <div class="btn-group">
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Profile"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
              </div>
          </td>
      </tr>
      <tr>
          <td class="text-center">2</td>
          <td>Mohamed Emad</td>

          <td class="hidden-xs">
              <span class="label label-success">Digital Performance</span>

          </td>
          <td class="hidden-xs">
              <span class="label label-success">Content English</span>
              <span class="label label-success">Articals Script</span>
          </td>
          <td class="text-center">
              <div class="btn-group">
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Profile"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
              </div>
          </td>
      </tr>
      <tr>
          <td class="text-center">2</td>
          <td>Mostafa</td>
          <td class="hidden-xs">
              <span class="label label-success">Advertising</span>
              <span class="label label-success">Digital</span>

          </td>
          <td class="hidden-xs">
              <span class="label label-success">Social Media Calendar</span>
              <span class="label label-success">Script</span>
          </td>
          <td class="text-center">
              <div class="btn-group">
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="View Profile"><i class="fa fa-eye"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Edit Client"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-xs btn-default" type="button" data-toggle="tooltip" title="Remove Client"><i class="fa fa-times"></i></button>
              </div>
          </td>
      </tr>
  </tbody>
</table>

<!-- END Striped Table -->
</div>
</div>
</div>

</div>
<div class="row">
<div class="col-xs-4">
<div class="block">
<div class="block-content">
<p>Users levels</p>
Manegar
Team Leader
Employee
</div>
</div>
</div>
</div>
</div>
<!-- END Content Grid -->
</div>

<!-- END Page Content -->

</main>
<!-- END Main Container -->
@endsection

@section('scripts')
<script>
    @if(session()->has('msg'))
    swal('{{ session("msg") }}' ,{icon:'error'})
    @endif
</script>
@endsection
