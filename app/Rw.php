<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Dusun;
use App\Rt;
class Rw extends Model
{
    use Uuid, SoftDeletes;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_dusun','nama_rw','kepala_rw'
    ];

	public function dusun(){
        return $this->belongsTo('App\Dusun','id_dusun')->withTrashed();
    }

    public function rt(){
        return $this->hasMany('App\Rt','id_rw','id')->withTrashed();
    }
}
