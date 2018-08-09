<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Yajra\Datatables\Datatables;
use Illuminate\Support\Facades\Input;

use Auth;
use App\AnggotaKk;

class AnggotaKkController extends Controller
{
  public function fetchAnggotaKk()
  {
    $nomer_kk = Input::get('nomer_kk');
    if($nomer_kk != "")
      $kk = AnggotaKk::with(['kk','penduduk'])->where('id_kk',$nomer_kk)->get();
    elseif ($nomer_kk == "") {
      $kk = AnggotaKk::with(['kk','penduduk'])->get();
    }


        return Datatables::of($kk)
        ->addColumn('action', function ($kk) {
              return '<button class="kk-edit btn btn-xs btn-warning" data-id="'.$kk->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                  <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                     href="#modalDelete-kk"
                     data-id="'.$kk->id.'"
                     data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
          })
        ->editColumn('nomor_kk', function($kk){
              return $kk->nomor_kk;
          })
          ->addIndexColumn()
          ->rawColumns(['nomor_kk','action'])
          ->make(true);
  }
}
