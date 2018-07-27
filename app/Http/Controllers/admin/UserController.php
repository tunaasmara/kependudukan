<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{
    public function index()
    {
    	$data['user'] = Auth::user();

        return view('admin.user.index')->with($data);
    }

    public function fetchUser()
    {
    	 $user = User::all();
          return Datatables::of($user)
          ->addColumn('action', function ($user) {
                return '<a href="'.route("users.edit",$user->id).'" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a> <button name="submit" id="delete-data" class="btn btn-danger btn-xs" onclick="deletedata(this)" data-id="'.$user->id.'" ><i class="fa fa-times" aria-hidden="true"></i> Delete</button>';
            })
          	->addIndexColumn()
            ->make(true);
    }
}
