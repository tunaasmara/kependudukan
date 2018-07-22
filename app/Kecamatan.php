<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Kabupaten;
use App\Desa;
class Kecamatan extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'id_kabupaten','kode_pos','nama_kecamatan'
    ];

    protected $hidden = [
    	'id'
	];

	public function desa(){
        return $this->hasMany('App\Desa','id_kecamatan','id');
    }

    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten','id_kabupaten');
    }
}
