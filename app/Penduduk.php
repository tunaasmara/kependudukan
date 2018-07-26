<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\AnggotaKk;
use App\Permohonan;
class Penduduk extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','pekerjaan','kewarganegaraan','status_perkawinan','pendidikan','nama_ibu','gol_darah','alamat','rt','rw','dusun','desa','kecamatan','kabupaten_kota','provinsi','nomor_telepon','status_ktp','status'
    ];

    protected $hidden = [
    	'id'
	];

	public function anggota_kk(){
        return $this->hasMany('App\AnggotaKk','id_penduduk','id');
    }

    public function permohonan(){
        return $this->hasMany('App\Permohonan','id_penduduk','id');
    }

}


