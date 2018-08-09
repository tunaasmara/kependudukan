<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use Auth;
use App\Rt;
class RtController extends Controller
{
    public function fetchRt()
    {
    	$rt = Rt::with(['rw' => function($query){
                            $query->with(['dusun' => function($query){
                            	$query->with(['desa' => function($query){
                                    $query->with(['kecamatan' => function($query){
                                    	$query->with(['kabupaten' => function($query){
                                    	$query->with('provinsi');
                                }]);
                                }]);
                                }]);
                    		}]);
                    }
    		])->get();

          return Datatables::of($rt)
          ->addColumn('action', function ($rt) {
                return '<button class="rt-edit btn btn-xs btn-warning" data-id="'.$rt->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-rt"
                       data-id="'.$rt->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama_rt' 			=> 'required|string|max:255',
            'kepala_rt' 		=> 'required|string|max:255',
            'rw' 		   		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            $rt = new Rt;
            $rt->nama_rt 	= $request->nama_rt;
            $rt->kepala_rt 	= $request->kepala_rt;
            $rt->rw()->associate($request->rw);
            $rt->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($rt)
    {
    	Rt::destroy($rt);
        return response()->json(['success'=>true]);
    }

    public function fetchDataRt($rt)
    {
    	$rt = Rt::where('id',$rt)->with(['rw' => function($query){
                            $query->with(['dusun' => function($query){
                            	$query->with(['desa' => function($query){
                                    $query->with(['kecamatan' => function($query){
                                    	$query->with(['kabupaten' => function($query){
                                    	$query->with('provinsi');
                                }]);
                                }]);
                                }]);
                    		}]);
                    }
    		])->get();
    	
    	return response()->json($rt);
    }

    public function update(Request $request,$rt)
    {
    	$rules = [
            'nama_rt' 			=> 'required|string|max:255',
            'kepala_rt' 		=> 'required|string|max:255',
            'rw' 		   		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $rt             = Rt::find($rt);
            $rt->nama_rt 	= $request->nama_rt;
            $rt->kepala_rt 	= $request->kepala_rt;
            $rt->rw()->associate($request->rw);
	        $rt->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function formFetchRt($rw)
    {
        if (isset($rw)) {
             $rt = Rt::where('id_rw',$rw)->get();
             return response()->json($rt);
        }
       
    }
}
