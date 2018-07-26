<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {

            $data['user'] = Auth::user();
            return redirect(route('admin.home'));

        }elseif (Auth::user()->hasRole('pegawai')) {

            $data['user'] = Auth::user();
            return view('home')->with($data);

        }elseif (Auth::user()->hasRole('warga')) {
            
            $data['user'] = Auth::user();
            return view('home')->with($data);

        }
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

    public function pendudukData()
    {
        return view('penduduk.data');
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
