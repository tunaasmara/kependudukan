<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use Auth;
use App\Kk;
class KkController extends Controller
{
    public function index()
    {
    	$data['user'] 	= Auth::user();
    	$data['title']	= "Data Kartu Keluarga";
    	return view('admin.kk.data')->with($data);
    }

    public function fetchKkAll()
    {
      $kk = Kk::select(['id', 'nomor_kk'])->get();
      return response()->json($kk);
    }

    public function fetchKk()
    {
    	$kk = Kk::all();

          return Datatables::of($kk)
          ->addColumn('action', function ($kk) {
                return '<button class="kk-edit btn btn-xs btn-warning" data-id="'.$kk->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-kk"
                       data-id="'.$kk->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          ->editColumn('nomor_kk', function($kk){
                return '<a href="#tab_2" data-id="'.$kk->id.'" onclick="tes()" data-toggle="tab" class="kartu_keluarga">'.$kk->nomor_kk.' <span class="glyphicon glyphicon-new-window"></span></a>';
            })
          	->addIndexColumn()
            ->rawColumns(['nomor_kk','action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $rules = [
            'nomor_kk'                  => 'required|string|max:20|unique:kks,nomor_kk',
            'alamat'                    => 'required|string|max:255',
            'rt'                        => 'required',
            'rw'                        => 'required',
            'provinsi'                  => 'required',
            'kabupaten_kota'            => 'required',
            'kecamatan'                 => 'required',
            'desa'                      => 'required',
            'dusun'                     => 'required',
            'kode_pos'                  => 'required',
            'tanggal_dikeluarkan'       => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            Kk::create($request->all());

            return response()->json([
                'fail' => false,
            ]);
    }
}
