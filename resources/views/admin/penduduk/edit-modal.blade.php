<div class="modal-header">
                        <div class="col-md-10">
                          <h2>Data Penduduk</h2>
                        </div>
                        <div class="col-md-2">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        </div>
                      </div>
                      @foreach ($penduduks as $penduduk)
                      <div class="modal-body">
                      <div id="status-edit"></div>
                      <form method="POST" action="{{ route('penduduk.update',$penduduk->id) }}" id="form-edit-penduduk">
                      <input type="hidden" name="_method" value="PUT">
                      <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                      
                                  <div class="form-group">
                                      <label class="col-form-label col-md-12" for="nik">NIK</label>
                                      <input type="text" value="{{$penduduk->nik}}" name="nik" placeholder="NIK..." class="inputan-wizard f1-nik form-control{{($errors->has('nik')?' is-invalid':'')}}" id="f1-nik">
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label col-md-12" for="nama">Nama</label>
                                      <input type="text" value="{{$penduduk->nama}}" name="nama" placeholder="Nama Lengkap..." class="inputan-wizard f1-nama form-control{{($errors->has('nama')?' is-invalid':'')}}" id="f1-nama">
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label col-md-12" for="tempat_lahir">Kota Kelahiran</label>
                                      <input type="text" value="{{$penduduk->tempat_lahir}}" name="tempat_lahir" placeholder="Kota Kelahiran" class="inputan-wizard f1-tempat_lahir form-control{{($errors->has('tempat_lahir')?' is-invalid':'')}}" id="f1-tempat_lahir">
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label col-md-6" for="status_perkawinan">Status Perkawinan</label>
                                      <input type="text" value="{{$penduduk->status_perkawinan}}" name="status_perkawinan" placeholder="Status Perkawinan" class="inputan-wizard f1-status_perkawinan form-control{{($errors->has('status_perkawinan')?' is-invalid':'')}}" id="f1-status_perkawinan">
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label col-md-6" for="nama_ayah">Nama Ayah</label>
                                      <input type="text" value="{{$penduduk->nama_ayah}}" name="nama_ayah" placeholder="Nama Ayah" class="inputan-wizard f1-nama_ayah form-control{{($errors->has('nama_ayah')?' is-invalid':'')}}" id="f1-nama_ayah">
                                  </div>
                                  <div class="form-group">
                                      <label class="col-form-label col-md-6" for="nama_ibu">Nama Ibu</label>
                                      <input type="text" value="{{$penduduk->nama_ibu}}" name="nama_ibu" placeholder="Nama Ibu" class="inputan-wizard f1-nama_ibu form-control{{($errors->has('nama_ibu')?' is-invalid':'')}}" id="f1-nama_ibu">
                                  </div>
                                  <div class="form-group">
                                    <label class="col-form-label col-md-6" for="nomer_telepon">No Telp</label>
                                    <input type="text" value="{{$penduduk->nomer_telepon}}" name="nomer_telepon" placeholder="No Telepon" class="inputan-wizard f1-nomer_telepon form-control{{($errors->has('nomer_telepon')?' is-invalid':'')}}" id="f1-nomer_telepon">
                                </div>
                                  <input type="submit" value="Save" class="btn btn-primary pull-right" name="submit">
                                </form>
                      </div>
                      <div class="modal-footer">
                        <a href="#" class="btn btn-danger pull-left" data-dismiss="modal">Close</a>
                      </div>
@endforeach