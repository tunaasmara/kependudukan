@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:720px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>Halaman Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dahboard</a></li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->

      {{$user->hasRole('admin')}}
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
