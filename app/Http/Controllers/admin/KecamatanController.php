<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;


use App\Provinsi;
use App\Kecamatan;
use App\Kabupaten;
class KecamatanController extends Controller
{
    public function fetchKecamatan()
    {
    	$kecamatan = Kecamatan::with(['kabupaten' => function($query){
                            $query->with('provinsi');
                    }
    		])->get();
          return Datatables::of($kecamatan)
          ->addColumn('action', function ($kecamatan) {
                return '<button class="kecamatan-edit btn btn-xs btn-warning" data-id="'.$kecamatan->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-kecamatan"
                       data-id="'.$kecamatan->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama_kecamatan' 	=> 'required|string|max:255',
            'kode_pos' 			=> 'required|numeric|max:99999',
            'kabupaten' 		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            $kecamatan = new Kecamatan;
            $kecamatan->nama_kecamatan 	= $request->nama_kecamatan;
            $kecamatan->kode_pos 		= $request->kode_pos;
            $kecamatan->kabupaten()->associate($request->kabupaten);
            $kecamatan->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($kecamatan)
    {
    	Kecamatan::destroy($kecamatan);
        return response()->json(['success'=>true]);
    }

    public function fetchDataKecamatan($kecamatan)
    {
    	$kecamatan = Kecamatan::where('id',$kecamatan)->with(['kabupaten' => function($query){
                            $query->with('provinsi');
                    }
    		])->get();
    	
    	return response()->json($kecamatan);
    }

    public function update(Request $request,$kecamatan)
    {
    	$rules = [
            'nama_kecamatan' 	=> 'required|string|max:255',
            'kode_pos' 			=> 'required|numeric|max:99999',
            'kabupaten' 		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $kecamatan = Kecamatan::find($kecamatan);
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->kode_pos = $request->kode_pos;
            $kecamatan->kabupaten()->associate($request->kabupaten);
	        $kecamatan->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function fetchKabupaten($provinsi)
    {
    	if (isset($provinsi)) {
    		$kabupaten = Kabupaten::where('id_provinsi',$provinsi)->select(['id','nama_kabupaten'])->get();

         	return response()->json($kabupaten);
    	}
    	return response()->json([
    		'fail' => true,
    		]);
    	 
    }
}
