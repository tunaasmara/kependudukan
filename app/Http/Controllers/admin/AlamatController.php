<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
class AlamatController extends Controller
{
    public function index()
    {
    	$data['user'] 	= Auth::user();
    	$data['title']	= "Data Alamat";
    	return view('admin.alamat.alamat')->with($data);
    }
}
