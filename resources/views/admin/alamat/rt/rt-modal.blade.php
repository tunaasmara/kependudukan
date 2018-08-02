<div class="modal fade" id="modal-rt">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data rt</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-rt-input','route' => 'rt.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-rt form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" id="rt-provinsi">
                                        </select>
                                          <span id="error-rt-provinsi" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kabupaten","Pilih Kabupaten",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-rt form-control{{($errors->has('kabupaten')?' is-invalid':'')}}" name="kabupaten" id="rt-kabupaten">
                                        </select>
                                          <span id="error-rt-kabupaten" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kecamatan","Pilih Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-rt form-control{{($errors->has('kecamatan')?' is-invalid':'')}}" name="kecamatan" id="rt-kecamatan">
                                        </select>
                                          <span id="error-rt-kecamatan" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("desa","Pilih desa",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-rt form-control{{($errors->has('desa')?' is-invalid':'')}}" name="desa" id="rt-desa">
                                        </select>
                                          <span id="error-rt-desa" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("dusun","Pilih dusun",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-rt form-control{{($errors->has('dusun')?' is-invalid':'')}}" name="dusun" id="rt-dusun">
                                        </select>
                                          <span id="error-rt-dusun" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("rw","Pilih Rw",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-rt form-control{{($errors->has('rw')?' is-invalid':'')}}" name="rw" id="rt-rw">
                                        </select>
                                          <span id="error-rt-rw" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("nama_rt","Nama rt",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nama_rt",null,["class"=>"form-control inputan-rt".($errors->has('nama_rt')?" is-invalid":""),'placeholder'=>'Nama rt']) !!}
                                          <span id="error-rt-nama_rt" class="invalid-feedback inputan-error-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kepala_rt","Kepala rt",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("kepala_rt",null,["class"=>"form-control inputan-rt".($errors->has('kepala_rt')?" is-invalid":""),'placeholder'=>'Kepala rt']) !!}
                                          <span id="error-rt-kepala_rt" class="invalid-feedback inputan-error-rt"></span>
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

                <div class="modal fade" id="modalDelete-rt" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="rt_delete_token"/>
                                <input type="hidden" id="rt_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxRtDelete('{{url('admin/rt/')}}/'+$('#rt_delete_id').val(),$('#rt_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-rt">
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
                      <form method="POST" id="form-edit-rt">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  <div class="form-group row required">
                                          <label for="provinsi" class="col-form-label col-md-2">Provinsi</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="provinsi" id="edit-rt-provinsi">
                                            </select>
                                              <span id="errors-edit-rt-provinsi" class="invalid-feedback errors-edit-rt"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kabupaten" class="col-form-label col-md-2">Kabupaten</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="kabupaten" id="edit-rt-kabupaten">
                                            </select>
                                              <span id="errors-edit-rt-kabupaten" class="invalid-feedback errors-edit-rt"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kecamatan" class="col-form-label col-md-2">Kecamatan</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="kecamatan" id="edit-rt-kecamatan">
                                            </select>
                                              <span id="errors-edit-rt-kecamatan" class="invalid-feedback errors-edit-rt"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="desa" class="col-form-label col-md-2">Desa</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="desa" id="edit-rt-desa">
                                            </select>
                                              <span id="errors-edit-rt-desa" class="invalid-feedback errors-edit-rt"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="dusun" class="col-form-label col-md-2">Dusun</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="dusun" id="edit-rt-dusun">
                                            </select>
                                              <span id="errors-edit-rt-dusun" class="invalid-feedback errors-edit-rt"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="rw" class="col-form-label col-md-2">Rw</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="rw" id="edit-rt-rw">
                                            </select>
                                              <span id="errors-edit-rt-rw" class="invalid-feedback errors-edit-rt"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="nama_rt" class="col-form-label col-md-2">Nama rt</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-rt-nama_rt" name="nama_rt" type="text">
                                          <span id="errors-edit-rt-nama_rt" class="invalid-feedback errors-edit-rt"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="kepala_rt" class="col-form-label col-md-2">Kepala rt</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-rt-kepala_rt" name="kepala_rt" type="text">
                                          <span id="errors-edit-rt-kepala_desa" class="invalid-feedback errors-edit-rt"></span>
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