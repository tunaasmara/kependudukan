<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
class AdminHomeController extends Controller
{
    public function index()
    {
    	$data['user'] = Auth::user();
        return view('admin.home')->with($data);
    }

    public function suratInput()
    {
        $data['user'] = Auth::user();
        return view('surat.input')->with($data);
    }

    public function suratData()
    {
        $data['user'] = Auth::user();
        return view('surat.data')->with($data);
    }

    public function pendudukKtp()
    {
        $data['user'] = Auth::user();
        $data['title'] = "Data KTP";
        return view('admin.penduduk.ktp')->with($data);
    }

    public function pendudukSku()
    {
        $data['user'] = Auth::user();
        $data['title'] = "Data Penduduk";
        return view('admin.penduduk.sku')->with($data);
    }

    public function kkInput()
    {
        $data['user'] = Auth::user();
        return view('admin.kk.input')->with($data);
    }

    public function kkData()
    {
        $data['user'] = Auth::user();
        $data['title'] = "Data Kartu Keluarga";
        return view('admin.kk.data')->with($data);
    }
}
