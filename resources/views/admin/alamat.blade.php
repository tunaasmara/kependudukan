@extends('layouts.admin')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="height:720px;">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Alamat
      <small>Halaman Admin</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Alamat</a></li>
      <li class="active"></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content container-fluid">

    <!--------------------------
      | Your Page Content Here |
      -------------------------->
      <h2 class="page-header">Data Alamat</h2>

      <div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Provinsi</a></li>
              <li><a href="#tab_2" data-toggle="tab">Kabupaten</a></li>
              <li><a href="#tab_3" data-toggle="tab">Kecamatan</a></li>
              <li><a href="#tab_4" data-toggle="tab">Desa</a></li>
              <li><a href="#tab_5" data-toggle="tab">Dusun</a></li>
              <li><a href="#tab_6" data-toggle="tab">RW</a></li>
              <li><a href="#tab_7" data-toggle="tab">RT</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Tabel Provinsi </b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>Provinsi</th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Jawa Timur</td>
                                        <td><button  style="width:50px;" type="button" class="btn btn-xs btn-warning"> Edit </button>  <button  style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jawa Tengah</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <b>Tabel Kabupaten </b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>Kabupaten</th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Pas
                    <td><button  style="width:50px;" type="button" class="btn btn-xs btn-warning"> Edit </button>  <button  style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jawa Tengah</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <b>Tabel Kecamatan</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>Kecamatan</th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Balong Bendo</td>
                    <td><button  style="width:50px;" type="button" class="btn btn-xs btn-warning"> Edit </button>  <button  style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gempol</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
              </div>
              <div class="tab-pane" id="tab_4">
                <b>Tabel Desa</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>Desa</th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Balong Bendo</td>
                    <td><button  style="width:50px;" type="button" class="btn btn-xs btn-warning"> Edit </button>  <button  style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gempol</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
              </div>
              <div class="tab-pane" id="tab_5">
                <b>Tabel Dusun</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>Dusun</th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Balong Bendo</td>
                    <td><button  style="width:50px;" type="button" class="btn btn-xs btn-warning"> Edit </button>  <button  style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gempol</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
              </div>
              <div class="tab-pane" id="tab_6">
                <b>Tabel RW</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>RW</th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Balong Bendo</td>
                    <td><button  style="width:50px;" type="button" class="btn btn-xs btn-warning"> Edit </button>  <button  style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gempol</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
              </div>
              <div class="tab-pane" id="tab_7">
                <b>Tabel RT</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>

                <table class="table" style="width:50%">
                  <tr>
                    <th>#</th>
                    <th>RT  </th>
                    <th>Option</th>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Balong Bendo</td>
                    <td><button style="width:50px;" type="button" class="btn btn-xs btn-warning" style="width:50px;"> Edit </button>  <button style="width:50px;" type="button" class="btn btn-xs btn-danger"> Hapus </button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Gempol</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Jawa Barat</td>
                  </tr>

                </table>
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
