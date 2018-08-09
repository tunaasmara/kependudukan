@extends('layouts.admin')

@section('header')

<link rel="shortcut icon" href="{{asset('assets/ico/favicon.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('assets/ico/apple-touch-icon-144-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('assets/ico/apple-touch-icon-114-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('assets/ico/apple-touch-icon-72-precomposed.png')}}">
<link rel="apple-touch-icon-precomposed" href="{{asset('assets/ico/apple-touch-icon-57-precomposed.png')}}">

<style>
          .example-modal .modal {
            position: relative;
            top: auto;
            bottom: auto;
            right: auto;
            left: auto;
            display: block;
            z-index: 1;
          }

          .example-modal .modal {
            background: transparent !important;
          }
</style>

  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">

  <link rel="stylesheet" href="{{ asset('/dist/css/skins/_all-skins.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />

<!-- page script -->

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:720px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      {{ $title or '' }}
      <small>{{ $title or '' }}</small>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs" id="myTab">
              <li class="active" ><a href="#tab_1" data-toggle="tab">Kartu Keluarga</a></li>
              <li><a href="#tab_2" data-toggle="tab">Anggota Kartu Keluarga</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Kartu Keluarga</h3>
                    <button type="button" class="btn btn-primary pull-right" onclick="kkProvinsiLoads()" data-toggle="modal" data-target="#modal-kk">
                      Tambah Data
                    </button>
                  </div>
                  <div class="box-body">
                    <table id="data-kk" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Alamat</th>
                            <th>Tanggal Dikeluarkan</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Nomor Kartu Keluarga</th>
                            <th>Alamat</th>
                            <th>Tanggal Dikeluarkan</th>
                            <th>Action</th>
                          </tr>
                          </tfoot>
                    </table>
                  </div>
                </div>
              </div>

              @include('admin.kk.modal')

              <div class="tab-pane" id="tab_2">
                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Data Anggota kartu Keluarga</h3>
                    <button type="button" class="btn btn-primary pull-right" onclick="" data-toggle="modal" data-target="#modal-rw">
                      Tambah Data
                    </button>
                  </div>
                  <div class="box-body">
                    <table id="data-rw" class="table table-bordered table-hover">
                      <thead>
                          <tr>
                            <th>No</th>
                            <th>Rw</th>
                            <th>Kepala Rw</th>
                            <th>Dusun</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Action</th>
                          </tr>
                          </thead>
                          <tbody>
                          </tbody>
                          <tfoot>
                          <tr>
                            <th>No</th>
                            <th>Rw</th>
                            <th>Kepala Rw</th>
                            <th>Dusun</th>
                            <th>Desa</th>
                            <th>Kecamatan</th>
                            <th>Kabupaten</th>
                            <th>Provinsi</th>
                            <th>Action</th>
                          </tr>
                          </tfoot>
                    </table>
                  </div>
                </div>
              </div>

              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footer')


<script src="{{ asset('assets/js/retina-1.1.0.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script>
<script src="{{ asset('js/kk.js')}}"></script>

<script type="text/javascript">
  $('#myTab a').click(function(e) {
    e.preventDefault();
    $(this).tab('show');
  });

  // store the currently selected tab in the hash value
  $("ul.nav-tabs > li > a").on("shown.bs.tab", function(e) {
    var id = $(e.target).attr("href").substr(1);
    window.location.hash = id+"_uri";
  });

  // on load of the page: switch to the currently selected tab
  var hash = window.location.hash;
  var res = hash.replace("_uri", "");
  $('#myTab a[href="' + res + '"]').tab('show');
</script>

@endsection
