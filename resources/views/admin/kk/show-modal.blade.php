<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     <h4 class="modal-title">Data Kk</h4>
</div>
<div class="modal-body">
	<table class="table table-stripped">
                    <tbody>
                      <tr>
                        <td>Nomor Kk</td>
                        <td>{{$kk->nomor_kk}}</td>
                      </tr>
                      <tr>
                        <td>Provinsi</td>
                        <td>{{$kk->provinsi}}</td>
                      </tr>
                      <tr>
                        <td>Kabupaten / Kota</td>
                        <td>{{$kk->kabupaten_kota}}</td>
                      </tr>
                      <tr>
                        <td>Kecamatan</td>
                        <td>{{$kk->kecamatan}}</td>
                      </tr>
                      <tr>
                        <td>Desa</td>
                        <td>{{$kk->desa}}</td>
                      </tr>
                      <tr>
                        <td>Rw</td>
                        <td>{{$kk->rw}}</td>
                      </tr>
                      <tr>
                        <td>Rt</td>
                        <td>{{$kk->rt}}</td>
                      </tr>
                      <tr>
                        <td>Kode Pos</td>
                        <td>{{$kk->kode_pos}}</td>
                      </tr>
                      <tr>
                        <td>Tanggal Dikeluarkan</td>
                        <td>{{$kk->tanggal_dikeluarkan}}</td>
                      </tr>
                    </tbody>
                  </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Tutup</button>
</div>