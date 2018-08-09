<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title">Data Penduduk</h4>
</div>
<div class="modal-body">
	<table class="table table-stripped">
                    <tbody>
                    @foreach ($penduduks as $penduduk)
                      <tr>
                        <td>NIK</td>
                        <td>{{$penduduk->nik}}</td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>{{$penduduk->nama}}</td>
                      </tr>
                      <tr>
                        <td>Tempat Kelahiran</td>
                        <td>{{$penduduk->tempat_lahir}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Lahir</td>
                        <td>{{$penduduk->tanggal_lahir}}</td>
                      </tr>
                      <tr>
                        <td>Jenis Kelamin</td>
                        <td>{{$penduduk->jenis_kelamin}}</td>
                      </tr>
                      <tr>
                        <td>Agama</td>
                        <td>{{$penduduk->agama}}</td>
                      </tr>
                      <tr>
                        <td>Pekerjaan</td>
                        <td>{{$penduduk->pekerjaan}}</td>
                      </tr>
                      <tr>
                        <td>Kewarganegaraan</td>
                        <td>{{$penduduk->kewarganegaraan}}</td>
                      </tr>
                      <tr>
                        <td>Status Perkawinan</td>
                        <td>{{$penduduk->status_perkawinan}}</td>
                      </tr>
                      <tr>
                        <td>Pendidikan</td>
                        <td>{{$penduduk->pendidikan}}</td>
                      </tr>
                      <tr>
                        <td>Nama Ibu</td>
                        <td>{{$penduduk->nama_ibu}}</td>
                      </tr>
                      <tr>
                        <td>Nama Ayah</td>
                        <td>{{$penduduk->nama_ayah}}</td>
                      </tr>
                      <tr>
                        <td>Golongan Darah</td>
                        <td>{{$penduduk->gol_darah}}</td>
                      </tr> 
                      <tr>
                        <td>Provinsi</td>
                        <td>{{$penduduk->provinsi}}</td>
                      </tr>     
                      <tr>
                        <td>Kabupaten / Kota</td>
                        <td>{{$penduduk->kabupaten_kota}}</td>
                      </tr>        
                      <tr>
                        <td>Kecamatan</td>
                        <td>{{$penduduk->kecamatan}}</td>
                      </tr>    
                      <tr>
                        <td>Desa</td>
                        <td>{{$penduduk->desa}}</td>
                      </tr>       
                      <tr>
                        <td>Dusun</td>
                        <td>{{$penduduk->dusun}}</td>
                      </tr> 
                      <tr>
                        <td>Rw</td>
                        <td>{{$penduduk->rw}}</td>
                      </tr>
                      <tr>
                        <td>Rt</td>
                        <td>{{$penduduk->rt}}</td>
                      </tr>
                      <tr>
                        <td>Alamat Lengkap</td>
                        <td>{{$penduduk->alamat}}</td>
                      </tr>  
                      <tr>
                        <td>Nomer Telepon</td>
                        <td>{{$penduduk->nomer_telepon}}</td>
                      </tr>  
                    @endforeach
                    </tbody>
                  </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
</div>