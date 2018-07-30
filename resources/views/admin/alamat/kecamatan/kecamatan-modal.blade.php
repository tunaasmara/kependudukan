<div class="modal fade" id="modal-kecamatan">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data Kecamatan</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-kecamatan-input','route' => 'kecamatan.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select class="inputan-kecamatan form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" onchange="KecamatanKabupatenLoads()" id="kecamatan-provinsi">
                                        </select>
                                          <span id="error-kecamatan-provinsi" class="invalid-feedback inputan-error-kecamatan"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kabupaten","Pilih Kabupaten",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select class="inputan-kecamatan form-control{{($errors->has('kabupaten')?' is-invalid':'')}}" name="kabupaten" id="kecamatan-kabupaten">
                                        </select>
                                          <span id="error-kecamatan-kabupaten" class="invalid-feedback inputan-error-kecamatan"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("nama_kecamatan","Nama Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nama_kecamatan",null,["class"=>"form-control inputan-kecamatan".($errors->has('nama_kecamatan')?" is-invalid":""),'placeholder'=>'Nama Kecamatan']) !!}
                                          <span id="error-kecamatan-nama_kecamatan" class="invalid-feedback inputan-error-kecamatan"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kode_pos","Kode Pos Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("kode_pos",null,["class"=>"form-control inputan-kecamatan".($errors->has('kode_pos')?" is-invalid":""),'placeholder'=>'Kode Pos Kecamatan']) !!}
                                          <span id="error-kecamatan-kode_pos" class="invalid-feedback inputan-error-kecamatan"></span>
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

                <div class="modal fade" id="modalDelete-kecamatan" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="kecamatan_delete_token"/>
                                <input type="hidden" id="kecamatan_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxKecamatanDelete('{{url('admin/kecamatan/')}}/'+$('#kecamatan_delete_id').val(),$('#kecamatan_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-kecamatan">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data User</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                      <form method="POST" id="form-edit-kecamatan">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  <div class="form-group row required">
                                          <label for="provinsi" class="col-form-label col-md-2">Provinsi</label>
                                          <div class="col-md-10">
                                              <select class="form-control" name="provinsi" onchange="KecamatanEditKabupatenLoads()" id="edit-kecamatan-provinsi">
                                            </select>
                                              <span id="errors-edit-kecamatan-provinsi" class="invalid-feedback"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kabupaten" class="col-form-label col-md-2">Kabupaten</label>
                                          <div class="col-md-10">
                                              <select class="form-control" name="kabupaten" id="edit-kecamatan-kabupaten">
                                            </select>
                                              <span id="errors-edit-kecamatan-kabupaten" class="invalid-feedback"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="nama_kecamatan" class="col-form-label col-md-2">Nama kecamatan</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-kecamatan-nama_kecamatan" name="nama_kecamatan" type="text">
                                          <span id="errors-edit-kecamatan-nama_kecamatan" class="invalid-feedback"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="kode_pos" class="col-form-label col-md-2">Kode Pos</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-kecamatan-kode_pos" name="kode_pos" type="text">
                                          <span id="errors-edit-kecamatan-kode_pos" class="invalid-feedback"></span>
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