<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use App\Provinsi;
use App\Kabupaten;
class KabupatenController extends Controller
{
    public function fetchKabupaten()
    {
    	$kabupaten = Kabupaten::with('provinsi')->get();
          return Datatables::of($kabupaten)
          ->addColumn('action', function ($kabupaten) {
                return '<button class="kabupaten-edit btn btn-xs btn-warning" data-id="'.$kabupaten->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-kabupaten"
                       data-id="'.$kabupaten->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function store(Request $request)
    {
    	$rules = [
            'nama_kabupaten' 	=> 'required|string|max:255',
            'provinsi' 			=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);

            $kabupaten = new Kabupaten;
            $kabupaten->nama_kabupaten = $request->nama_kabupaten;
            $kabupaten->provinsi()->associate($request->provinsi);
            $kabupaten->save();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($kabupaten)
    {
    	Kabupaten::destroy($kabupaten);
        return response()->json(['success'=>true]);
    }

    public function fetchDataKabupaten($kabupaten)
    {
    	$kabupaten = Kabupaten::where('id',$kabupaten)->with('provinsi')->get();
    	
    	return response()->json($kabupaten);
    }

    public function update(Request $request,$kabupaten)
    {
    	$rules = [
            'nama_kabupaten' 		=> 'required',
            'provinsi' 				=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $kabupaten = Kabupaten::find($kabupaten);
            $kabupaten->nama_kabupaten = $request->nama_kabupaten;
            $kabupaten->provinsi()->associate($request->provinsi);
	        $kabupaten->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function fetchProvinsi()
    {
    	 $provinsi = Provinsi::select(['id','nama_provinsi'])->get();
         return response()->json($provinsi);
    }
}
