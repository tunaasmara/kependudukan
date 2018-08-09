<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;

use App\Penduduk;
use Auth;
class PendudukController extends Controller
{
   public function index()
   {
   		$data['user'] 	= Auth::user();
    	$data['title']	= "Data Penduduk";
    	return view('admin.penduduk.penduduk')->with($data);
   }

   public function fetchPenduduk()
    {
    	$penduduk = Penduduk::select(['created_at','id','nik','nama','alamat','nomer_telepon','status_ktp'])->orderBy('created_at','desc')->get();

          return Datatables::of($penduduk)
          ->addColumn('action', function ($penduduk) {
          		$link = "";
          		if ($penduduk->status_ktp == '0'){
          		$link = '<a class="btn btn-success btn-xs" title="Aktivasi KTP" data-toggle="modal"
                       href="#modalAktifKtp-penduduk"
                       data-id="'.$penduduk->id.'"
                       data-token="'.csrf_token().'">Aktivasi KTP</a> ';
                      }
                $link .= '<a href="'.route("penduduk.show",$penduduk->id).'" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#show-modal"> Show Detail</a> ';

                $link .= '<button class="penduduk-edit btn btn-xs btn-warning" data-id="'.$penduduk->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> ';

                $link .= '<input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete-penduduk"
                       data-id="'.$penduduk->id.'"
                       data-token="'.csrf_token().'">Delete</a> ';

                return $link;
            })
          	->editColumn('status_ktp', function($penduduk){
          		if ($penduduk->status_ktp == '0')
          			return '<small class="label pull-right bg-red">Non aktif</small>';
          		else
          			return '<small class="label pull-right bg-green">Aktif</small>';
          	})
          	->addIndexColumn()
          	->rawColumns(['status_ktp','action'])
            ->make(true);
    }

   public function store(Request $request)
    {
    	$rules = [
            'nik' 				=> 'required|string|max:20|unique:penduduks,nik',
            'nama' 				=> 'required|string|max:50',
            'tempat_lahir' 		=> 'required|string|max:255',
            'tanggal_lahir' 	=> 'required',
            'jenis_kelamin' 	=> 'required',
            'agama'			 	=> 'required',
            'pekerjaan'		 	=> 'required',
            'kewarganegaraan' 	=> 'required|string|max:255',
            'status_perkawinan'	=> 'required|string|max:255',
            'pendidikan'	 	=> 'required|string|max:255',
            'nama_ibu' 			=> 'required|string|max:255',
            'nama_ayah'		 	=> 'required|string|max:255',
            'gol_darah'		 	=> 'required|string|max:2',
            'alamat'		 	=> 'required|string|max:255',
            'rt'		 		=> 'required',
            'rw'		 		=> 'required',
            'dusun'		 		=> 'required',
            'desa'		 		=> 'required',
            'kecamatan'		 	=> 'required',
            'kabupaten_kota'	=> 'required',
            'provinsi'		 	=> 'required',
            'nomer_telepon'		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()){
            	return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors(),
                ]);
            }

            Penduduk::create($request->all());

            return response()->json([
                'fail' => false,
            ]);
    }

    public function destroy($penduduk)
    {
    	Penduduk::destroy($penduduk);
        return response()->json(['success'=>true]);
    }

    public function fetchDataPenduduk($penduduk)
    {
    	$penduduk = Penduduk::where('id',$penduduk)->get();

    	return response()->json($penduduk);
    }

    public function pendudukAktifKtp($penduduk)
    {
    	$penduduk = Penduduk::find($penduduk);
    	$penduduk->status_ktp = 1;
    	$penduduk->update();

    	return response()->json([
                'fail' => false,
            ]);
    }

    public function show($penduduk)
    {
    	$data['penduduk'] = Penduduk::find($penduduk);

    	return view('admin.penduduk.show-modal')->with($data);
    }

    public function fetchPendudukAll() {
      $penduduk = Penduduk::select(['id', 'nik'])->get();
      return response()->json($penduduk);
    }
}
