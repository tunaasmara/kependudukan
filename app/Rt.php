<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Rw;
class Rt extends Model
{
    use Uuid;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'id_rw','nama_rt','kepala_rt'
    ];

	public function rw(){
        return $this->belongsTo('App\Rw','id_rw');
    }
}
