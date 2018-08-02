<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Kabupaten;
use App\Desa;
class Kecamatan extends Model
{
	protected $table = 'kecamatan';
    public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'id_kec';

	public function desa(){
        return $this->hasMany('App\Desa','id_kec','id_kec');
    }

    public function kabupaten(){
        return $this->belongsTo('App\Kabupaten','id_kab');
    }
}
