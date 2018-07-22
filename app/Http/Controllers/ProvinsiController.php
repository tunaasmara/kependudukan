<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

use App\Provinsi;
class ProvinsiController extends Controller
{
    public function create($provinsi)
    {

    	try {
        	$provinsi = Provinsi::uuid($provinsi);
	    } catch (ModelNotFoundException $e) {
	        abort(404);
	    }

    	return response()->json($provinsi);
    }
}
