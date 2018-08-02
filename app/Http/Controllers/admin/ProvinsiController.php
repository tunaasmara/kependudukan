<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use App\Provinsi;
class ProvinsiController extends Controller
{
    // public function fetchProvinsi()
    // {
    // 	$provinsi = Provinsi::all();
    //       return Datatables::of($provinsi)
    //       ->addColumn('action', function ($provinsi) {
    //             return '<button class="provinsi-edit btn btn-xs btn-warning" data-id="'.$provinsi->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
    //                 <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
    //                    href="#modalDelete-provinsi"
    //                    data-id="'.$provinsi->id.'"
    //                    data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
    //         })
    //       	->addIndexColumn()
    //         ->make(true);
    // }

    public function store(Request $request)
    {
    	$rules = [
            'nama_provinsi' => 'required|string|max:255',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);

            $user = Provinsi::create($request->all());

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($users)
    {
    	Provinsi::destroy($users);
        return response()->json(['success'=>true]);
    }

    public function fetchDataProvinsi($provinsi)
    {
    	$provinsi = Provinsi::where('id',$provinsi)->get();
    	
    	return response()->json($provinsi);
    }

    public function update(Request $request,$provinsi)
    {
    	$rules = [
            'nama_provinsi' 		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $provinsi = Provinsi::find($provinsi);
            $provinsi->nama_provinsi = $request->nama_provinsi;
	        $provinsi->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function fetchProvinsi()
    {
         $provinsi = Provinsi::select(['id_prov','nama'])->get();
         return response()->json($provinsi);
    }

}
