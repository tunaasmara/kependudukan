<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Kabupaten;
class Provinsi extends Model
{

	protected $table = 'provinsi';
	public $timestamps = false;
    public $incrementing = false;

    protected $primaryKey = 'id_prov';



	public function kabupaten(){
        return $this->hasMany('App\Kabupaten','id_prov','id_prov');
    }
}
