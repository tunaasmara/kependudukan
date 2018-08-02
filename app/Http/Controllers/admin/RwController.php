<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use Auth;
use App\Rw;
class RwController extends Controller
{
    public function fetchRw()
    {
    	$rw = Rw::with(['dusun' => function($query){
                            $query->with(['desa' => function($query){
                            	$query->with(['kecamatan' => function($query){
                                    $query->with(['kabupaten' => function($query){
                                    	$query->with('provinsi');
                                }]);
                                }]);
                    		}]);
                    }
    		])->get();

          return Datatables::of($rw)
          ->addColumn('action', function ($rw) {
                return '<button class="rw-edit btn btn-xs btn-warning" data-id="'.$rw->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-rw"
                       data-id="'.$rw->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama_rw' 			=> 'required|string|max:255',
            'kepala_rw' 		=> 'required|string|max:255',
            'dusun' 		    => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            $rw = new Rw;
            $rw->nama_rw 	= $request->nama_rw;
            $rw->kepala_rw 	= $request->kepala_rw;
            $rw->dusun()->associate($request->dusun);
            $rw->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($rw)
    {
    	Rw::destroy($rw);
        return response()->json(['success'=>true]);
    }

    public function fetchDataRw($dusun)
    {
    	$rw = Rw::with(['dusun' => function($query){
                            $query->with(['desa' => function($query){
                            	$query->with(['kecamatan' => function($query){
                                    $query->with(['kabupaten' => function($query){
                                    	$query->with('provinsi');
                                }]);
                                }]);
                    		}]);
                    }
    		])->get();
    	
    	return response()->json($rw);
    }

    public function update(Request $request,$rw)
    {
    	$rules = [
            'nama_rw' 			=> 'required|string|max:255',
            'kepala_rw' 		=> 'required|string|max:255',
            'dusun' 		    => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $rw             = Rw::find($rw);
            $rw->nama_rw 	= $request->nama_rw;
            $rw->kepala_rw 	= $request->kepala_rw;
            $rw->dusun()->associate($request->dusun);
	        $rw->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function formFetchRw($dusun)
    {
        if (isset($dusun)) {
            $rw = Rw::where('id_dusun',$dusun)->select(['id','nama_rw'])->get();
            return response()->json($rw);
        }
    }
}
