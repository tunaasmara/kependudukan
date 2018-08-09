<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use App\Pekerjaan;
use Auth;
class PekerjaanController extends Controller
{

	public function index()
	   {
	   		$data['user'] 	= Auth::user();
	    	$data['title']	= "Data Pekerjaan";
	    	return view('admin.pekerjaan.index')->with($data);
	   }

    public function fetchPekerjaan()
    {
    	$pekerjaan = Pekerjaan::all();

          return Datatables::of($pekerjaan)
          ->addColumn('action', function ($pekerjaan) {
                return '<button class="pekerjaan-edit btn btn-xs btn-warning" data-id="'.$pekerjaan->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-pekerjaan"
                       data-id="'.$pekerjaan->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama' 		=> 'required|string|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            $pekerjaan 			= new Pekerjaan;
            $pekerjaan->nama 	= $request->nama;
            $pekerjaan->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($pekerjaan)
    {
    	Pekerjaan::destroy($pekerjaan);
        return response()->json(['success'=>true]);
    }

    public function fetchDataPekerjaan($pekerjaan)
    {
    	$pekerjaan = Pekerjaan::find($pekerjaan);
    	
    	return response()->json($pekerjaan);
    }

    public function update(Request $request,$pekerjaan)
    {
    	$rules = [
            'nama'      => 'required|string|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $pekerjaan = Pekerjaan::find($pekerjaan);
            $pekerjaan->nama 	= $request->nama;
	        $pekerjaan->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function fetchFormPekerjaan()
    {
    		$pekerjaan = Pekerjaan::all();

         	return response()->json($pekerjaan); 
    }

}
