<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Kabupaten;
class Provinsi extends Model
{
	use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nama_provinsi'
    ];

	public function kabupaten(){
        return $this->hasMany('App\Kabupaten','id_provinsi','id');
    }
}
