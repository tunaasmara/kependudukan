<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use Auth;
use App\Role;
use App\User;
use Yajra\Datatables\Datatables;
class UserController extends Controller
{
    public function index()
    {
    	$data['user'] = Auth::user();

        return view('admin.user.index')->with($data);
    }

    public function store(Request $request)
    {
    	$rules = [
            'name' 		=> 'required|string|max:255',
            'email' 	=> 'required|string|email|max:255|unique:users',
            'password' 	=> 'required|string|min:6|confirmed',
            'role'		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);

            $user = User::create([
	            'name' 		=> $request->name,
	            'email' 	=> $request->email,
	            'password' 	=> Hash::make($request->password),
	        ]);
	        $user->roles()->attach($request->role);

            return response()->json([
                'fail' => false,
            ]);
    }

    public function update(Request $request,$user)
    {
    	$rules = [
            'name' 		=> 'required',
            'email' 	=> 'required',
            'role'		=> 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails())
                return response()->json([
                    'fail' => true,
                    'errors' => $validator->errors()
                ]);
            $user = User::find($user);
            $user->name = $request->name;
            $user->email = $request->email;
	        $user->roles()->sync($request->role);
	        $user->update();

            return response()->json([
                'fail' => false,
            ]);
    }

    public function fetchUser()
    {
    	 $user = User::all();
          return Datatables::of($user)
          ->addColumn('action', function ($user) {
                return '<button class="user-edit btn btn-xs btn-warning" data-id="'.$user->id.'"><i class="glyphicon glyphicon-edit"></i> Edit</button> <input type="hidden" name="_method" value="delete"/>
                    <a class="btn btn-danger btn-xs" title="Delete" data-toggle="modal"
                       href="#modalDelete"
                       data-id="'.$user->id.'"
                       data-token="'.csrf_token().'"><i class="glyphicon glyphicon-remove">Delete</a>';
            })
          	->addIndexColumn()
            ->make(true);
    }

    public function fetchRoles()
    {
    	 $role = Role::select(['id','name'])->get();
         return response()->json($role);
    }


    public function destroy($users)
    {
    	User::destroy($users);
        return redirect(route('users.index'));
    }

    public function fetchDataUser($user)
    {
    	$user = User::where('id',$user)->with('roles')->get();
    	
    	return response()->json($user);
    }
}
