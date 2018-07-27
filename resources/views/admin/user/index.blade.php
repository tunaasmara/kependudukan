@extends('layouts.admin')


@section('header')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/form-elements.css')}}">
<link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">

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

<!-- page script -->

@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      KTP Penduduk
      <small>Data KTP Penduduk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> KTP Penduduk</a></li>
      <li class="active">Data KTP Penduduk</li>
    </ol>
  </section>

  <!-- Main content -->
<section class="content container-fluid">
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Permohonan Surat</h3>
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" style="color:#fff; background:#3c8dbc;float:right">
            Tambah Data
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-tabel" class="table table-bordered table-hover">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
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
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post" class="f1" style="text-align: center;">
          <h3>Data Kartu Tanda Penduduk</h3>
          <p>Input Data Kartu Tanda Penduduk</p>
          <div class="f1-steps">
            <div class="f1-progress">
                <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
            </div>
            <div class="f1-step active">
              <div class="f1-step-icon"><i class="fa fa-user"></i></div>
              <p>Data Umum</p>
            </div>
            <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-home"></i></div>
              <p>Alamat Lengkap</p>
            </div>
              <div class="f1-step">
              <div class="f1-step-icon"><i class="fa fa-check"></i></div>
              <p>Lain-Lain</p>
            </div>
          </div>

          <fieldset>
              <h4>Data Umum</h4>
            <div class="form-group">
                <label class="sr-only" for="f1-first-name">NIK</label>
                      <input type="text" name="f1-first-name" placeholder="NIK..." class="f1-first-name form-control" id="f1-first-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Nama Lengkap..." class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Tempat/Tanggal Lahir" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="f1-buttons">
                      <button type="button" class="btn btn-next">Next</button>
                  </div>
              </fieldset>

              <fieldset>
                  <h4>Anggota Keluarga</h4>
                  <div class="form-group">
                      <label class="sr-only" for="f1-about-yourself">Alamat</label>
                      <textarea name="f1-about-yourself" placeholder="Alamat..."
                                         class="f1-about-yourself form-control" id="f1-about-yourself"></textarea>
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="RT/RW" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Desa/Kelurahan" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Kecamatan" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Kabupaten/Kota" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Kode Pos" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Provinsi" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="f1-buttons">
                      <button type="button" class="btn btn-previous">Previous</button>
                      <button type="button" class="btn btn-next">Next</button>
                  </div>
              </fieldset>

              <fieldset>
                  <h4>Lain - Lain</h4>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Agama" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Status Perkawinan" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Pekerjaan" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="text" name="f1-last-name" placeholder="Kewarganegaraan" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="form-group">
                      <label class="sr-only" for="f1-last-name"></label>
                      <input type="date" name="f1-last-name" placeholder="Berlaku Hingga" class="f1-last-name form-control" id="f1-last-name">
                  </div>
                  <div class="f1-buttons">
                      <button type="button" class="btn btn-previous">Previous</button>
                      <button type="submit" class="btn btn-submit">Submit</button>
                  </div>
              </fieldset>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.content -->
</div>
@endsection

@section('footer')

<script src="{{ asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
<script src="{{ asset('assets/js/retina-1.1.0.min.js')}}"></script>
<script src="{{ asset('assets/js/scripts.js')}}"></script>
<!-- page script -->

<script>
$(function() {
    $('#data-tabel').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('fetch.user') !!}',
        columns: [
            { data: 'DT_Row_Index', name: 'DT_Row_Index',orderable: false, searchable: false },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'action', name: 'action',orderable: false, searchable: false }

        ]
    });
});
</script>
@endsection