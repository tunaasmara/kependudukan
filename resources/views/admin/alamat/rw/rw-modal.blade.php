<div class="modal fade" id="modal-rw">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data rw</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-rw-input','route' => 'rw.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-rw form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" id="rw-provinsi">
                                        </select>
                                          <span id="error-rw-provinsi" class="invalid-feedback inputan-error-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kabupaten","Pilih Kabupaten",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-rw form-control{{($errors->has('kabupaten')?' is-invalid':'')}}" name="kabupaten" id="rw-kabupaten">
                                        </select>
                                          <span id="error-rw-kabupaten" class="invalid-feedback inputan-error-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kecamatan","Pilih Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-rw form-control{{($errors->has('kecamatan')?' is-invalid':'')}}" name="kecamatan" id="rw-kecamatan">
                                        </select>
                                          <span id="error-rw-kecamatan" class="invalid-feedback inputan-error-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("desa","Pilih desa",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-rw form-control{{($errors->has('desa')?' is-invalid':'')}}" name="desa" id="rw-desa">
                                        </select>
                                          <span id="error-rw-desa" class="invalid-feedback inputan-error-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("dusun","Pilih dusun",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" class="selectpicker inputan-rw form-control{{($errors->has('dusun')?' is-invalid':'')}}" name="dusun" id="rw-dusun">
                                        </select>
                                          <span id="error-rw-dusun" class="invalid-feedback inputan-error-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("nama_rw","Nama rw",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nama_rw",null,["class"=>"form-control inputan-rw".($errors->has('nama_rw')?" is-invalid":""),'placeholder'=>'Nama rw']) !!}
                                          <span id="error-rw-nama_rw" class="invalid-feedback inputan-error-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kepala_rw","Kepala rw",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("kepala_rw",null,["class"=>"form-control inputan-rw".($errors->has('kepala_rw')?" is-invalid":""),'placeholder'=>'Kepala rw']) !!}
                                          <span id="error-rw-kepala_rw" class="invalid-feedback inputan-error-rw"></span>
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

                <div class="modal fade" id="modalDelete-rw" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="rw_delete_token"/>
                                <input type="hidden" id="rw_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxRwDelete('{{url('admin/rw/')}}/'+$('#rw_delete_id').val(),$('#rw_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-rw">
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
                      <form method="POST" id="form-edit-rw">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  <div class="form-group row required">
                                          <label for="provinsi" class="col-form-label col-md-2">Provinsi</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" class="selectpicker form-control" name="provinsi" id="edit-rw-provinsi">
                                            </select>
                                              <span id="errors-edit-rw-provinsi" class="invalid-feedback errors-edit-rw"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kabupaten" class="col-form-label col-md-2">Kabupaten</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" class="selectpicker form-control" name="kabupaten" id="edit-rw-kabupaten">
                                            </select>
                                              <span id="errors-edit-rw-kabupaten" class="invalid-feedback errors-edit-rw"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kecamatan" class="col-form-label col-md-2">Kecamatan</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" class="selectpicker form-control" name="kecamatan" id="edit-rw-kecamatan">
                                            </select>
                                              <span id="errors-edit-rw-kecamatan" class="invalid-feedback errors-edit-rw"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="desa" class="col-form-label col-md-2">Desa</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" class="selectpicker form-control" name="desa" id="edit-rw-desa">
                                            </select>
                                              <span id="errors-edit-rw-desa" class="invalid-feedback errors-edit-rw"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="dusun" class="col-form-label col-md-2">Dusun</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" class="selectpicker form-control" name="dusun" id="edit-rw-dusun">
                                            </select>
                                              <span id="errors-edit-rw-dusun" class="invalid-feedback errors-edit-rw"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="nama_rw" class="col-form-label col-md-2">Nama rw</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-rw-nama_rw" name="nama_rw" type="text">
                                          <span id="errors-edit-rw-nama_rw" class="invalid-feedback errors-edit-rw"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="kepala_rw" class="col-form-label col-md-2">Kepala rw</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-rw-kepala_rw" name="kepala_rw" type="text">
                                          <span id="errors-edit-rw-kepala_desa" class="invalid-feedback errors-edit-rw"></span>
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