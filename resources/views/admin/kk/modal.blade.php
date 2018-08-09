<div class="modal fade" id="modal-kk">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data Kk</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-kk-input','route' => 'kk.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("nomor_kk","Nomor kk",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nomor_kk",null,["class"=>"form-control inputan-kk".($errors->has('nomor_kk')?" is-invalid":""),'placeholder'=>'Nomor Kk']) !!}
                                          <span id="error-kk-nomor_kk" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" id="kk-provinsi">
                                        </select>
                                          <span id="error-kk-provinsi" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kabupaten_kota","Pilih Kabupaten /Kota",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('kabupaten_kota')?' is-invalid':'')}}" name="kabupaten_kota" id="kk-kabupaten_kota">
                                        </select>
                                          <span id="error-kk-kabupaten_kota" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kecamatan","Pilih Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('kecamatan')?' is-invalid':'')}}" name="kecamatan" id="kk-kecamatan">
                                        </select>
                                          <span id="error-kk-kecamatan" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("desa","Pilih Desa",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('desa')?' is-invalid':'')}}" name="desa" id="kk-desa">
                                        </select>
                                          <span id="error-kk-desa" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("dusun","Pilih dusun",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('dusun')?' is-invalid':'')}}" name="dusun" id="kk-dusun">
                                        </select>
                                          <span id="error-kk-dusun" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("rw","Pilih rw",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('rw')?' is-invalid':'')}}" name="rw" id="kk-rw">
                                        </select>
                                          <span id="error-kk-rw" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("rt","Pilih rt",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-kk form-control{{($errors->has('rt')?' is-invalid':'')}}" name="rt" id="kk-rt">
                                        </select>
                                          <span id="error-kk-rt" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kode_pos","Kode Pos",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("kode_pos",null,["class"=>"form-control inputan-kk".($errors->has('kode_pos')?" is-invalid":""),'placeholder'=>'Kode Pos']) !!}
                                          <span id="error-kk-kode_pos" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("alamat","Alamat Lengkap",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                        {!! Form::textarea('alamat',null,['class'=>"form-control inputan-kk".($errors->has('alamat')?" is-invalid":""), 'rows' => 2, 'cols' => 40,'placeholder'=>'Alamat Lengkap']) !!}
                                          <span id="error-kk-alamat" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("tanggal_dikeluarkan","Tanggal Dikeluarkan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::date("tanggal_dikeluarkan",null,["class"=>"form-control inputan-kk".($errors->has('tanggal_dikeluarkan')?" is-invalid":""),'placeholder'=>'Tanggal Dikeluarkan']) !!}
                                          <span id="error-kk-tanggal_dikeluarkan" class="invalid-feedback inputan-error-kk"></span>
                                      </div>
                                  </div>
                      </div>
                      <div class="modal-footer">
                        {!! Form::submit("Save",["class"=>"btn btn-primary pull-right"])!!}
                        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
                      </div>
                       {!! Form::close() !!}
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="modalDelete-kk" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="kk_delete_token"/>
                                <input type="hidden" id="kk_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxkkDelete('{{url('admin/kk/')}}/'+$('#kk_delete_id').val(),$('#kk_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-kk">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data kk</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                      <form method="POST" id="form-edit-kk">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                                  <div class="form-group row required">
                                      <label for="nomor_kk" class="col-form-label col-md-2">Nomor kk</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-kk-nomor_kk" name="nomor_kk" type="text">
                                          <span id="errors-edit-kk-nomor_kk" class="invalid-feedback errors-edit-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="kode_pos" class="col-form-label col-md-2">Kode Pos</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-kk-kode_pos" name="kode_pos" type="text">
                                          <span id="errors-edit-kk-kode_pos" class="invalid-feedback errors-edit-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="alamat" class="col-form-label col-md-2">Alamat</label>
                                      <div class="col-md-10">
                                          <textarea class="form-control" id="edit-kk-alamat" name="alamat" ></textarea>
                                          <span id="errors-edit-kk-alamat" class="invalid-feedback errors-edit-kk"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="tanggal_dikeluarkan" class="col-form-label col-md-2">Tanggal Dikeluarkan</label>
                                      <div class="col-md-10">
                                          <input type="date" class="form-control" id="edit-kk-tanggal_dikeluarkan" name="tanggal_dikeluarkan" >
                                          <span id="errors-edit-kk-tanggal_dikeluarkan" class="invalid-feedback errors-edit-kk"></span>
                                      </div>
                                  </div>
                      </div>
                      <div class="modal-footer">
                        <input type="submit" value="Save" class="btn btn-primary pull-right" name="submit">
                        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
                      </div>
                       </form>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="modal-anggota-kk">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <div class="col-md-10">
                                          <h2>Tambah Anggota</h2>
                                        </div>
                                        <div class="col-md-2">
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span></button>
                                        </div>
                                      </div>
                                      <div class="modal-body">
                                       {!! Form::open(['id'=>'form-anggota-input','route' => 'anggota.store']) !!}
                                       {{Form::token()}}
                                                  <div class="form-group row required">
                                                      {!! Form::label("nomor_kk","Nomor kk",["class"=>"col-form-label col-md-2"]) !!}
                                                      <div class="col-md-10">
                                                          {!! Form::text("nomor_kk",null,["class"=>"form-control inputan-anggota".($errors->has('nomor_kk')?" is-invalid":""),'placeholder'=>'Nomor Kk','id'=>'anggota-nomor_kk','disabled']) !!}
                                                          <input type="hidden" class="form-control" id="anggota-id_kk" name="id_kk" >
                                                          <span id="error-anggota-nomor_kk" class="invalid-feedback inputan-error-anggota"></span>
                                                      </div>
                                                  </div>
                                                  <div class="form-group row required">
                                                      {!! Form::label("id_penduduk","Penduduk",["class"=>"col-form-label col-md-2"]) !!}
                                                      <div class="col-md-10">
                                                          <select data-live-search="true" class="selectpicker inputan-anggota form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="id_penduduk" id="anggota_id_penduduk">
                                                        </select>
                                                          <span id="error-anggota-id_penduduk" class="invalid-feedback inputan-error-anggota"></span>
                                                      </div>
                                                  </div>
                                                  <div class="form-group row required">
                                                      {!! Form::label("no_paspor","Nomor Pasport",["class"=>"col-form-label col-md-2"]) !!}
                                                      <div class="col-md-10">
                                                          {!! Form::text("Nomor Pasport",null,["class"=>"form-control inputan-anggota".($errors->has('no_paspor')?" is-invalid":""),'placeholder'=>'Nomor no_paspor']) !!}
                                                          <span id="error-anggota-no_paspor" class="invalid-feedback inputan-error-anggota"></span>
                                                      </div>
                                                  </div>
                                                  <div class="form-group row required">
                                                      {!! Form::label("status","Status",["class"=>"col-form-label col-md-2"]) !!}
                                                      <div class="col-md-10">
                                                        <select name="status" class="inputan-wizard form-control{{($errors->has('status')?' is-invalid':'')}}" id="f1-status">
                                                          <option value="">Pilih Status</option>
                                                          <option value="Kepala Keluarga">Kepala Keluarga</option>
                                                          <option value="Istri">Istri</option>
                                                          <option value="Anak">Anak</option>
                                                          <option value="Famili Lain">Famili Lain</option>
                                                        </select>
                                                          <span id="error-anggota-status" class="invalid-feedback inputan-error-anggota"></span>
                                                      </div>
                                                  </div>
                                      </div>
                                      <div class="modal-footer">
                                        {!! Form::submit("Save",["class"=>"btn btn-primary pull-right"])!!}
                                        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
                                      </div>
                                       {!! Form::close() !!}
                                    </div>
                                    <!-- /.modal-content -->
                                  </div>
                                  <!-- /.modal-dialog -->
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

                <div class="modal fade" id="modalDelete-anggota" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="anggota_delete_token"/>
                                <input type="hidden" id="anggota_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxanggotaDelete('{{url('admin/anggota/')}}/'+$('#anggota_delete_id').val(),$('#anggota_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
