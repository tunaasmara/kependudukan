<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function coba()
    {
        return view('coba');
    }

    public function suratInput()
    {
        return view('surat.input');
    }

    public function suratData()
    {
        return view('surat.data');
    }

    public function pendudukKtp()
    {
        return view('penduduk.ktp');
    }

    public function pendudukSku()
    {
        return view('penduduk.sku');
    }

    public function kkInput()
    {
        return view('kk.input');
    }

    public function kkData()
    {
        return view('kk.data');
    }
}
