<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\AnggotaKk;
class Kk extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'nomor_kk','alamat','rt','rw','desa','kecamatan','kabupaten_kota','kode_pos','provinsi','tanggal_dikeluarkan','status'
    ];

    protected $hidden = [
    	'id'
	];

	public function anggota_kk(){
        return $this->hasMany('App\AnggotaKk','id_kk','id');
    }
}

