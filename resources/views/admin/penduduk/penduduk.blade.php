@extends('layouts.admin')

@section('header')

  <link rel="stylesheet" href="{{ asset('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/form-elements.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{$title or "Title"}}
      <small>{{$title or "Title"}}</small>
    </h1>
  </section>

  <!-- Main content -->
<section class="content container-fluid">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">{{$title or "Title"}}</h3>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-penduduk" style="color:#fff; background:#3c8dbc;float:right">
            Tambah Data
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-penduduk" class="table table-stripped">
            <thead>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomer Telepon</th>
              <th>Status KTP</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
            <tr>
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomer Telepon</th>
              <th>Status KTP</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
</section>
@include('admin.penduduk.modal')
<!-- /.content -->
</div>
@endsection

@section('footer')
  <script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
  <script src="{{ asset('assets/js/retina-1.1.0.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
@endsection