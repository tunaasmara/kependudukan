<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Desa;
use App\Rw;
class Dusun extends Model
{
    use Uuid, SoftDeletes;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_kel','nama_dusun','kepala_dusun'
    ];

	public function desa(){
        return $this->belongsTo('App\Desa','id_kel');
    }

    public function rw(){
        return $this->hasMany('App\Rw','id_dusun','id');
    }
}
