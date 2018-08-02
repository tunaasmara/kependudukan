<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kecamatan;
class KecamatanController extends Controller
{
    public function fetchKecamatan($kabupaten)
    {
    	if (isset($kabupaten)) {
            $kecamatan = Kecamatan::where('id_kab',$kabupaten)->select(['id_kec','nama'])->get();
            return response()->json($kecamatan);
        }
    }

    
}
