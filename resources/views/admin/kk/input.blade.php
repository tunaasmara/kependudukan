@extends('layouts.admin')

@section('header')
  <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
@endsection

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

    <label for="sitescreen">Organization</label>
    <select id="sitescreen" class="chosen-select" name="sitescreen">
      <option value="" >Pilih Nama</option>
      <option value="2" >bowo</option>
      <option value="3" >lilis</option>
    </select>

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footer')

  <script type="text/javascript" src="https://code.jquery.com/jquery-1.10.2.js" ></script>
  <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.js" ></script>

@endsection
