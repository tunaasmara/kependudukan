<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Dusun;
use App\Rt;
class Rw extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_dusun','nama_rw','kepala_rw'
    ];

    protected $hidden = [
    	'id'
	];

	public function dusun(){
        return $this->belongsTo('App\Dusun','id_dusun');
    }

    public function rt(){
        return $this->hasMany('App\Rt','id_rw','id');
    }
}
