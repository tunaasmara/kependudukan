<div class="modal fade" id="modal-dusun">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data dusun</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-dusun-input','route' => 'dusun.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-dusun form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" id="dusun-provinsi">
                                        </select>
                                          <span id="error-dusun-provinsi" class="invalid-feedback inputan-error-dusun"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kabupaten","Pilih Kabupaten",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-dusun form-control{{($errors->has('kabupaten')?' is-invalid':'')}}" name="kabupaten" id="dusun-kabupaten">
                                        </select>
                                          <span id="error-dusun-kabupaten" class="invalid-feedback inputan-error-dusun"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kecamatan","Pilih Kecamatan",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-dusun form-control{{($errors->has('kecamatan')?' is-invalid':'')}}" name="kecamatan" id="dusun-kecamatan">
                                        </select>
                                          <span id="error-dusun-kecamatan" class="invalid-feedback inputan-error-dusun"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("desa","Pilih desa",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker inputan-dusun form-control{{($errors->has('desa')?' is-invalid':'')}}" name="desa" id="dusun-desa">
                                        </select>
                                          <span id="error-dusun-desa" class="invalid-feedback inputan-error-dusun"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("nama_dusun","Nama dusun",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nama_dusun",null,["class"=>"form-control inputan-dusun".($errors->has('nama_dusun')?" is-invalid":""),'placeholder'=>'Nama dusun']) !!}
                                          <span id="error-dusun-nama_dusun" class="invalid-feedback inputan-error-dusun"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("kepala_dusun","Kepala dusun",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("kepala_dusun",null,["class"=>"form-control inputan-dusun".($errors->has('kepala_dusun')?" is-invalid":""),'placeholder'=>'Kepala dusun']) !!}
                                          <span id="error-dusun-kepala_dusun" class="invalid-feedback inputan-error-dusun"></span>
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

                <div class="modal fade" id="modalDelete-dusun" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="dusun_delete_token"/>
                                <input type="hidden" id="dusun_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxDusunDelete('{{url('admin/dusun/')}}/'+$('#dusun_delete_id').val(),$('#dusun_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-dusun">
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
                      <form method="POST" id="form-edit-dusun">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  <div class="form-group row required">
                                          <label for="provinsi" class="col-form-label col-md-2">Provinsi</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="provinsi" id="edit-dusun-provinsi">
                                            </select>
                                              <span id="errors-edit-dusun-provinsi" class="invalid-feedback errors-edit-dusun"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kabupaten" class="col-form-label col-md-2">Kabupaten</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="kabupaten" id="edit-dusun-kabupaten">
                                            </select>
                                              <span id="errors-edit-dusun-kabupaten" class="invalid-feedback errors-edit-dusun"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="kecamatan" class="col-form-label col-md-2">Kecamatan</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="kecamatan" id="edit-dusun-kecamatan">
                                            </select>
                                              <span id="errors-edit-dusun-kecamatan" class="invalid-feedback errors-edit-dusun"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="desa" class="col-form-label col-md-2">Desa</label>
                                          <div class="col-md-10">
                                              <select data-live-search="true" data-live-search-style="startsWith" class="selectpicker form-control" name="desa" id="edit-dusun-desa">
                                            </select>
                                              <span id="errors-edit-dusun-desa" class="invalid-feedback errors-edit-dusun"></span>
                                          </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="nama_dusun" class="col-form-label col-md-2">Nama dusun</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-dusun-nama_dusun" name="nama_dusun" type="text">
                                          <span id="errors-edit-dusun-nama_dusun" class="invalid-feedback errors-edit-dusun"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      <label for="kepala_dusun" class="col-form-label col-md-2">Kepala dusun</label>
                                      <div class="col-md-10">
                                          <input class="form-control" id="edit-dusun-kepala_dusun" name="kepala_dusun" type="text">
                                          <span id="errors-edit-dusun-kepala_desa" class="invalid-feedback errors-edit-dusun"></span>
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