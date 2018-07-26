<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Permohonan;
use App\SyaratSurat;
class SyaratPermohonan extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_permohonan','id_syarat_surat','terpenuhi'
    ];

    protected $hidden = [
    	'id'
	];

	public function permohonan(){
        return $this->belongsTo('App\Permohonan','id_permohonan');
    }

    public function syarat_surat(){
        return $this->belongsTo('App\SyaratSurat','id_syarat_surat');
    }
}

