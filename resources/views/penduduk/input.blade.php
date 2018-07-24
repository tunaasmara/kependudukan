@extends('layouts.wizard')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:720px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Identitas Penduuduk
      <small>Data Identitas Penduduk</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Data Penduduk</a></li>
      <li>Identitas Penduduk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

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

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
