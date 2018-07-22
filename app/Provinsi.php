<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class Provinsi extends Model
{
	use Uuid;
	public $timestamps = false;

    protected $fillable = [
        'nama_provinsi'
    ];

    protected $hidden = [
    	'id'
	];
}
