<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pekerjaan extends Model
{
    use Uuid,SoftDeletes;
	public $timestamps = false;
    public $incrementing = false;

    protected $fillable = [
        'nama'
    ];

}
