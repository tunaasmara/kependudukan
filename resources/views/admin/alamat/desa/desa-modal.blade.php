<div class="modal fade" id="modal-desa">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data Desa</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-desa-input','route' => 'desa.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select class="inputan-desa form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" onchange="DesaKabupatenLoads()" id="desa-provinsi">
                                        </select>
                                          <span id="error-desa-provinsi" class="invalid-feedback inputan-error-desa"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kabupaten","Pilih Kabupaten",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select class="inputan-desa form-control{{($errors->has('kabupaten')?' is-invalid':'')}}" onchange="DesaKecamatanLoads()" name="kabupaten" id="desa-kabupaten">
                                        </select>
                                          <span id="error-desa-kabupaten" class="invalid-feedback inputan-error-desa"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kecamatan","Pilih Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select class="inputan-desa form-control{{($errors->has('kecamatan')?' is-invalid':'')}}" name="kecamatan" id="desa-kecamatan">
                                        </select>
                                          <span id="error-desa-kecamatan" class="invalid-feedback inputan-error-desa"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("nama_desa","Nama Desa",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nama_desa",null,["class"=>"form-control inputan-desa".($errors->has('nama_desa')?" is-invalid":""),'placeholder'=>'Nama Desa']) !!}
                                          <span id="error-desa-nama_desa" class="invalid-feedback inputan-error-desa"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kepala_desa","Kepala Desa",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("kepala_desa",null,["class"=>"form-control inputan-desa".($errors->has('kepala_desa')?" is-invalid":""),'placeholder'=>'Kepala Desa']) !!}
                                          <span id="error-desa-kepala_desa" class="invalid-feedback inputan-error-desa"></span>
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

                <div class="modal fade" id="modalDelete-desa" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="desa_delete_token"/>
                                <input type="hidden" id="desa_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxDesaDelete('{{url('admin/desa/')}}/'+$('#desa_delete_id').val(),$('#desa_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-desa">
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
                      <form method="POST" id="form-edit-desa">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  <div class="form-group row required">
                                          <label for="provinsi" class="col-form-label col-md-2">Provinsi</label>
                                          <div class="col-md-10">
                                              <select class="form-control" name="provinsi" onchange="desaEditKabupatenLoads()" id="edit-desa-provinsi">
                                            </select>
                                              <span id="errors-edit-desa-provinsi" class="invalid-feedback"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kabupaten" class="col-form-label col-md-2">Kabupaten</label>
                                          <div class="col-md-10">
                                              <select class="form-control" onchange="desaEditKecamatanLoads()" name="kabupaten" id="edit-desa-kabupaten">
                                            </select>
                                              <span id="errors-edit-desa-kabupaten" class="invalid-feedback"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kecamatan" class="col-form-label col-md-2">Kecamatan</label>
                                          <div class="col-md-10">
                                              <select class="form-control" name="kecamatan" id="edit-desa-kecamatan">
                                            </select>
                                              <span id="errors-edit-desa-kecamatan" class="invalid-feedback"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="nama_desa" class="col-form-label col-md-2">Nama desa</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-desa-nama_desa" name="nama_desa" type="text">
                                          <span id="errors-edit-desa-nama_desa" class="invalid-feedback"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="kepala_desa" class="col-form-label col-md-2">Kepala Desa</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-desa-kepala_desa" name="kepala_desa" type="text">
                                          <span id="errors-edit-desa-kepala_desa" class="invalid-feedback"></span>
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