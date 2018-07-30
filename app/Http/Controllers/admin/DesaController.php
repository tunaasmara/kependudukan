<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use App\Desa;
use App\Kecamatan;
class DesaController extends Controller
{
    public function fetchDesa()
    {
    	$desa = Desa::with(['kecamatan' => function($query){
                            $query->with(['kabupaten' => function($query){
                            	$query->with('provinsi');
                    		}]);
                    }
    		])->get();
          return Datatables::of($desa)
          ->addColumn('action', function ($desa) {
                return '<button class="desa-edit btn btn-xs btn-warning" data-id="'.$desa->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-desa"
                       data-id="'.$desa->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama_desa' 		=> 'required|string|max:255',
            'kepala_desa' 		=> 'required|string|max:255',
            'kecamatan' 		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            $desa = new Desa;
            $desa->nama_desa 		= $request->nama_desa;
            $desa->kepala_desa 	= $request->kepala_desa;
            $desa->kecamatan()->associate($request->kecamatan);
            $desa->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($desa)
    {
    	Desa::destroy($desa);
        return response()->json(['success'=>true]);
    }

    public function fetchDataDesa($desa)
    {
    	$desa = Desa::where('id',$desa)->with(['kecamatan' => function($query){
                            $query->with(['kabupaten' => function($query){
                            	$query->with('provinsi');
                    		}]);
                    }
    		])->get();
    	
    	return response()->json($desa);
    }

    public function update(Request $request,$desa)
    {
    	$rules = [
            'nama_desa' 		=> 'required|string|max:255',
            'kepala_desa' 		=> 'required|string|max:255',
            'kecamatan' 		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $desa = Desa::find($desa);
            $desa->nama_desa 	= $request->nama_desa;
            $desa->kepala_desa 	= $request->kepala_desa;
            $desa->kecamatan()->associate($request->kecamatan);
	        $desa->update();

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

    public function fetchDesaKecamatan($kabupaten)
    {
    	if (isset($kabupaten)) {
    		$kecamatan = Kecamatan::where('id_kabupaten',$kabupaten)->select(['id','nama_kecamatan'])->get();

         	return response()->json($kecamatan);
    	}
    	return response()->json([
    		'fail' => true,
    		]);
    }
}
