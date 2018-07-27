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
}
