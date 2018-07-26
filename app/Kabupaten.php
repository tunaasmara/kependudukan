<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Provinsi;
use App\Kecamatan;
class Kabupaten extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nama_kabupaten','id_provinsi'
    ];

    protected $hidden = [
    	'id'
	];

	public function provinsi(){
        return $this->belongsTo('App\Provinsi','id_provinsi');
    }

    public function kecamatan(){
        return $this->hasMany('App\Kecamatan','id_kabupaten','id');
    }

}
