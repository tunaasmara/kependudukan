@extends('layouts.admin')

@section('header')

  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{ asset('assets/css/form-elements.css')}}">

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
          <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default" style="color:#fff; background:#3c8dbc;float:right">
            Tambah Data
          </button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="data-penduduk" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
            </tr>
            </thead>
            <tbody>
            <tr>
              <td>Trident</td>
              <td>Internet
                Explorer 4.0
              </td>
              <td>Win 95+</td>
              <td> 4</td>
              <td>X</td>
            </tr>
            <tr>
              <td>Trident</td>
              <td>Internet
                Explorer 5.0
              </td>
              <td>Win 95+</td>
              <td>5</td>
              <td>C</td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
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
  <script src="{{ asset('assets/js/jquery.backstretch.min.js')}}"></script>
  <script src="{{ asset('assets/js/retina-1.1.0.min.js')}}"></script>
  <script src="{{ asset('assets/js/scripts.js')}}"></script>
@endsection