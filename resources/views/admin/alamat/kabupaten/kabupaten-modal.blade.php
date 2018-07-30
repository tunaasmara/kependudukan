<div class="modal fade" id="modal-kabupaten">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data Kabupaten/Kota</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      <div class="modal-body">
                       {!! Form::open(['id'=>'form-kabupaten','route' => 'kabupaten.store']) !!}
                       {{Form::token()}}
                                  <div class="form-group row required">
                                      {!! Form::label("nama_kabupaten","Nama Kabupaten/Kota",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          {!! Form::text("nama_kabupaten",null,["class"=>"form-control inputan-kabupaten".($errors->has('nama_kabupaten')?" is-invalid":""),'placeholder'=>'Nama Kabupaten/Kota','id'=>'focus-kabupaten']) !!}
                                          <span id="error-kabupaten-nama_kabupaten" class="invalid-feedback inputan-error-kabupaten"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                      {!! Form::label("provinsi","Pilih Provinsi",["class"=>"col-form-label col-md-2"]) !!}
                                      <div class="col-md-10">
                                          <select class="inputan-kabupaten form-control{{($errors->has('provinsi')?' is-invalid':'')}}" name="provinsi" id="kabupaten-provinsi">
                                        </select>
                                          <span id="error-kabupaten-provinsi" class="invalid-feedback inputan-error-kabupaten"></span>
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

                <div class="modal fade" id="modalDelete-kabupaten" tabindex="-1" role="dialog" data-backdrop="static">
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
                                <input type="hidden" id="kabupaten_delete_token"/>
                                <input type="hidden" id="kabupaten_delete_id"/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger"
                                        onclick="ajaxKabupatenDelete('{{url('admin/kabupaten/')}}/'+$('#kabupaten_delete_id').val(),$('#kabupaten_delete_token').val())">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modal-edit-kabupaten">
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
                      <form method="POST" id="form-edit-kabupaten">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                  <div class="form-group row required">
                                      <label for="nama_kabupaten" class="col-form-label col-md-2">Nama Kabupaten</label>
                                      <div class="col-md-10">
                                          <input class="form-control" placeholder="Name" id="edit-kabupaten-nama_kabupaten" name="nama_kabupaten" type="text">
                                          <span id="errors-edit-kabupaten-nama_kabupaten" class="invalid-feedback"></span>
                                      </div>
                                  </div>
                                  <div class="form-group row required">
                                          <label for="provinsi" class="col-form-label col-md-2">User provinsi</label>
                                          <div class="col-md-10">
                                              <select class="form-control" name="provinsi" id="edit-kabupaten-provinsi">
                                            </select>
                                              <span id="errors-edit-kabupaten-provinsi" class="invalid-feedback"></span>
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