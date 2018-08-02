<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use Auth;
use App\Dusun;
class DusunController extends Controller
{
    public function fetchDusun()
    {
    	$dusun = Dusun::with(['desa' => function($query){
                            $query->with(['kecamatan' => function($query){
                            	$query->with(['kabupaten' => function($query){
                                    $query->with('provinsi');
                                }]);
                    		}]);
                    }
    		])->get();

          return Datatables::of($dusun)
          ->addColumn('action', function ($dusun) {
                return '<button class="dusun-edit btn btn-xs btn-warning" data-id="'.$dusun->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-dusun"
                       data-id="'.$dusun->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama_dusun' 		=> 'required|string|max:255',
            'kepala_dusun' 		=> 'required|string|max:255',
            'desa' 		        => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            $dusun = new Dusun;
            $dusun->nama_dusun 	    = $request->nama_dusun;
            $dusun->kepala_dusun 	= $request->kepala_dusun;
            $dusun->desa()->associate($request->desa);
            $dusun->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($dusun)
    {
    	Dusun::destroy($dusun);
        return response()->json(['success'=>true]);
    }

    public function fetchDataDusun($dusun)
    {
    	$dusun = Dusun::where('id',$dusun)->with(['desa' => function($query){
                            $query->with(['kecamatan' => function($query){
                                $query->with(['kabupaten' => function($query){
                                    $query->with('provinsi');
                                }]);
                            }]);
                    }
            ])->get();
    	
    	return response()->json($dusun);
    }

    public function update(Request $request,$dusun)
    {
    	$rules = [
            'nama_dusun'        => 'required|string|max:255',
            'kepala_dusun'      => 'required|string|max:255',
            'desa'              => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $dusun                  = Dusun::find($dusun);
            $dusun->nama_dusun 	    = $request->nama_dusun;
            $dusun->kepala_dusun 	= $request->kepala_dusun;
            $dusun->desa()->associate($request->desa);
	        $dusun->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function formFetchDusun($desa)
    {
        if (isset($desa)) {
            $dusun = Dusun::where('id_kel',$desa)->select(['id','nama_dusun'])->get();
            return response()->json($dusun);
        }
    }

}
