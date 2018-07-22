<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

use App\Rw;
class Rt extends Model
{
    use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'id_rw','nama_rt','kepala_rt'
    ];

    protected $hidden = [
    	'id'
	];

	public function rw(){
        return $this->belongsTo('App\Rw','id_rw');
    }
}
