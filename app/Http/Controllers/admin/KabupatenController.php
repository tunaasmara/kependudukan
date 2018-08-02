<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kabupaten;
class KabupatenController extends Controller
{
    public function fetchKabupaten($provinsi)
    {
        if (isset($provinsi)) {
            $kabupaten = Kabupaten::where('id_prov',$provinsi)->select(['id_kab','nama'])->get();
            return response()->json($kabupaten);
        }
    }

    
}
