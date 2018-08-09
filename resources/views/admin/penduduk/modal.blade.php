<div class="modal fade" id="modal-penduduk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div id="status"></div>
        <form role="form" action="{{ route('penduduk.store') }}" method="post" class="f1" style="text-align: center;">
        {{Form::token()}}
          <h3>Data Penduduk</h3>
          <p>Input Data Penduduk</p>
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
                      <label class="col-form-label col-md-6" for="nik">NIK</label>
                      <input type="text" name="nik" placeholder="NIK..." class="inputan-wizard f1-nik form-control{{($errors->has('nik')?' is-invalid':'')}}" id="f1-nik">
                      <span id="error-penduduk-nik" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="nama">Nama</label>
                      <input type="text" name="nama" placeholder="Nama Lengkap..." class="inputan-wizard f1-nama form-control{{($errors->has('nama')?' is-invalid':'')}}" id="f1-nama">
                      <span id="error-penduduk-nama" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="tempat_lahir">Kota Kelahiran</label>
                      <input type="text" name="tempat_lahir" placeholder="Kota Kelahiran" class="inputan-wizard f1-tempat_lahir form-control{{($errors->has('tempat_lahir')?' is-invalid':'')}}" id="f1-tempat_lahir">
                      <span id="error-penduduk-tempat_lahir" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="tanggal_lahir">Tanggal Lahir</label>
                      <input type="date" name="tanggal_lahir" placeholder="Tempat/Tanggal Lahir" class="inputan-wizard f1-tanggal_lahir form-control{{($errors->has('tanggal_lahir')?' is-invalid':'')}}" id="f1-tanggal_lahir">
                      <span id="error-penduduk-tanggal_lahir" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="agama">Agama</label>
                      <select name="agama" class="inputan-wizard f1-agama form-control{{($errors->has('agama')?' is-invalid':'')}}" id="f1-agama">
                        <option value="">Pilih Agama</option>
                        <option value="islam">Islam</option>
                        <option value="kristen">Kristen</option>
                        <option value="hindu">Hindu</option>
                        <option value="budha">Budha</option>
                        <option value="konghucu">Konghucu</option>
                      </select>
                      <span id="error-penduduk-agama" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-12" for="jenis_kelamin">Jenis Kelamin</label>
                      <label class="radio-inline"><input type="radio" value="L" class="inputan-wizard f1-jenis_kelamin" id="f1-jenis_kelamin" name="jenis_kelamin" checked>Laki - laki</label>
                      <label class="radio-inline"><input type="radio" class="inputan-wizard f1-jenis_kelamin" id="f1-jenis_kelamin" value="P" name="jenis_kelamin">Perempuan</label>
                      <span id="error-penduduk-jenis_kelamin" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="pekerjaan">Pekerjaan</label>
                      <select data-live-search="true" name="pekerjaan" class="f1-pekerjaan selectpicker form-control{{($errors->has('pekerjaan')?' is-invalid':'')}}" id="f1-pekerjaan">
                      </select>
                      <span id="error-penduduk-pekerjaan" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-12" for="kewarganegaraan">Kewarganegaraan</label>
                      <label class="radio-inline"><input type="radio" value="wni" class="inputan-wizard f1-kewarganegaraan" id="f1-kewarganegaraan" name="kewarganegaraan" checked>WNI</label>
                      <label class="radio-inline"><input type="radio" value="wna" class="inputan-wizard f1-kewarganegaraan" id="f1-kewarganegaraan" name="kewarganegaraan">WNA</label>
                      <span id="error-penduduk-kewarganegaraan" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="f1-buttons">
                      <button type="button" class="btn btn-primary btn-next">Next</button>
                  </div>
              </fieldset>

              <fieldset>
                  <h4>Alamat</h4>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="provinsi">Provinsi</label>
                      <select data-live-search="true" name="provinsi" class="f1-provinsi selectpicker form-control{{($errors->has('provinsi')?' is-invalid':'')}}" id="f1-provinsi">
                      </select>
                      <span id="error-penduduk-provinsi" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="kabupaten_kota">Kabupaten / kota</label>
                      <select data-live-search="true" name="kabupaten_kota" class="f1-kabupaten_kota selectpicker form-control{{($errors->has('kabupaten_kota')?' is-invalid':'')}}" id="f1-kabupaten_kota">
                      </select>
                      <span id="error-penduduk-kabupaten_kota" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="kecamatan">Kecamatan</label>
                      <select data-live-search="true" name="kecamatan" class="f1-kecamatan selectpicker form-control{{($errors->has('kecamatan')?' is-invalid':'')}}" id="f1-kecamatan">
                      </select>
                      <span id="error-penduduk-kecamatan" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="desa">Desa</label>
                      <select data-live-search="true" name="desa" class="f1-desa selectpicker form-control{{($errors->has('desa')?' is-invalid':'')}}" id="f1-desa">
                      </select>
                      <span id="error-penduduk-desa" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="dusun">Dusun</label>
                      <select data-live-search="true" name="dusun" class="f1-dusun selectpicker form-control{{($errors->has('dusun')?' is-invalid':'')}}" id="f1-dusun">
                      </select>
                      <span id="error-penduduk-dusun" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="rw">Rw</label>
                      <select data-live-search="true" name="rw" class="f1-rw selectpicker form-control{{($errors->has('rw')?' is-invalid':'')}}" id="f1-rw">
                      </select>
                      <span id="error-penduduk-rw" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="rt">Rt</label>
                      <select data-live-search="true" name="rt" class="f1-rt selectpicker form-control{{($errors->has('rt')?' is-invalid':'')}}" id="f1-rt">
                      </select>
                      <span id="error-penduduk-rt" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="alamat">Alamat Lengkap</label>
                      <textarea name="alamat" placeholder="Alamat Lengkap" class="inputan-wizard f1-alamat form-control{{($errors->has('alamat')?' is-invalid':'')}}" id="f1-alamat"></textarea>
                      <span id="error-penduduk-alamat" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="f1-buttons">
                      <button type="button" class="btn btn-previous">Previous</button>
                      <button type="button" class="btn btn-next">Next</button>
                  </div>
              </fieldset>

              <fieldset>
                  <h4>Lain - Lain</h4>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="pendidikan">Pendidikan</label>
                      <select name="pendidikan" class="inputan-wizard f1-pendidikan form-control{{($errors->has('pendidikan')?' is-invalid':'')}}" id="f1-pendidikan">
                        <option value="">Pilih Pendidikan</option>
                        <option value="SD">SD</option>
                        <option value="SMP">SMP</option>
                        <option value="SMA">SMA</option>
                        <option value="Sarjana">Sarjana</option>
                        <option value="Lain lain">Lain lain</option>
                      </select>
                      <span id="error-penduduk-pendidikan" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="status_perkawinan">Status Perkawinan</label>
                      <input type="text" name="status_perkawinan" placeholder="Status Perkawinan" class="inputan-wizard f1-status_perkawinan form-control{{($errors->has('status_perkawinan')?' is-invalid':'')}}" id="f1-status_perkawinan">
                      <span id="error-penduduk-status_perkawinan" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="nama_ayah">Nama Ayah</label>
                      <input type="text" name="nama_ayah" placeholder="Nama Ayah" class="inputan-wizard f1-nama_ayah form-control{{($errors->has('nama_ayah')?' is-invalid':'')}}" id="f1-nama_ayah">
                      <span id="error-penduduk-nama_ayah" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="nama_ibu">Nama Ibu</label>
                      <input type="text" name="nama_ibu" placeholder="Nama Ibu" class="inputan-wizard f1-nama_ibu form-control{{($errors->has('nama_ibu')?' is-invalid':'')}}" id="f1-nama_ibu">
                      <span id="error-penduduk-nama_ibu" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="gol_darah">Golongan Darah</label>
                      <select name="gol_darah" class="inputan-wizard f1-gol_darah form-control{{($errors->has('gol_darah')?' is-invalid':'')}}" id="f1-gol_darah">
                        <option value="">Pilih Golongan darah</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="AB">AB</option>
                        <option value="O">O</option>
                      </select>
                      <span id="error-penduduk-gol_darah" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="form-group">
                      <label class="col-form-label col-md-6" for="nomer_telepon">No Telp</label>
                      <input type="text" name="nomer_telepon" placeholder="No Telepon" class="inputan-wizard f1-nomer_telepon form-control{{($errors->has('nomer_telepon')?' is-invalid':'')}}" id="f1-nomer_telepon">
                      <span id="error-penduduk-nomer_telepon" class="invalid-feedback inputan-penduduk"></span>
                  </div>
                  <div class="f1-buttons">
                      <button type="button" class="btn btn-previous">Previous</button>
                      <button type="submit" class="btn btn-submit">Submit</button>
                  </div>
              </fieldset>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modalDelete-penduduk" tabindex="-1" role="dialog" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Delete Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete?</p>
                                <input type="hidden" id="penduduk_delete_token"/>
                                <input type="hidden" id="penduduk_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxPendudukDelete('{{url('admin/penduduk/')}}/'+$('#penduduk_delete_id').val(),$('#penduduk_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

<div class="modal fade" id="modalAktifKtp-penduduk" tabindex="-1" role="dialog" data-backdrop="static">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Aktivasi KTP</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <h1>Ingin Aktifkan KTP ini ?</h1>
                                <div class="form-group">
                                  <label class="col-form-label col-md-6" for="nik">NIK</label>
                                  <input type="text" name="nik" placeholder="NIK..." class="inputan-wizard f1-nik form-control" id="aktif-ktp-nik" disabled>
                              </div>
                              <div class="form-group">
                                  <label class="col-form-label col-md-6" for="nama">Nama</label>
                                  <input type="text" name="nama" placeholder="Nama Lengkap..." class="inputan-wizard f1-nama form-control" id="aktif-ktp-nama" disabled>
                              </div>
                              <div class="form-group">
                                <label class="col-form-label col-md-6" for="nomer_telepon">No Telp</label>
                                <input type="text" name="nomer_telepon" placeholder="No Telepon" id="aktif-ktp-nomer_telepon" class="inputan-wizard f1-nomer_telepon form-control" disabled>
                            </div>
                                <input type="hidden" id="penduduk_aktif_token"/>
                                <input type="hidden" id="penduduk_aktif_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-success"
                                        onclick="ajaxPendudukAktifKtp('{{url('admin/pendudukAktifKtp/')}}/'+$('#penduduk_aktif_id').val(),$('#penduduk_aktif_token').val())">
                                    Aktifkan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

<div class="modal fade" id="show-modal" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                      </div>
                      <div class="modal-body">
                      </div>
                      <div class="modal-footer">
                      </div>
                    </div>
                  </div>
                </div>