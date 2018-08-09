<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\AnggotaKk;
use App\Permohonan;
class Penduduk extends Model
{
    use Uuid,SoftDeletes;
    public $incrementing = false;

    protected $fillable = [
        'nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','pekerjaan','kewarganegaraan','status_perkawinan','pendidikan','nama_ibu','nama_ayah','gol_darah','alamat','rt','rw','dusun','desa','kecamatan','kabupaten_kota','provinsi','nomer_telepon','status_ktp'
    ];

	public function anggota_kk(){
        return $this->hasMany('App\AnggotaKk','id_penduduk','id');
    }

    public function permohonan(){
        return $this->hasMany('App\Permohonan','id_penduduk','id');
    }

}


