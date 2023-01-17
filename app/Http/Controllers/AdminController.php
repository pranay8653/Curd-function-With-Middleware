<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
     public function create()
     {
        return view('admin.create_Admin');
     }

    public function store(Request $request)
     {
        $data = $request->validate([
           'name' => ['required'],
           'email' => ['required'],
           'number' => ['required'],
           'address' => ['required'],
           'file' => ['required', 'mimes:png,jpg,jpeg'],
           'dob' => ['required'],
           'password' => ['required'],
        ]);

        $file_path = 'assets/upload/admin';
        File::isDirectory($file_path) or File::makeDirectory($file_path, 0777, true,true);
        $file_name = Carbon::now()->timestamp;
        $file_extension = $request['file']->getClientOriginalExtension();
        $data['file']->move($file_path,$file_name.'.'.$file_extension);

        $student = Admin::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'number' => $request['number'],
            'address' => $request['address'],
            'dob' => $request['dob'],
            'password' => Hash::make($request->password),
            'file' => $file_name.'.'.$file_extension,
            'role'  => 1,
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role'  => 1
        ]);
        return redirect('/');
     }

     public function show()
      {
        $admin = Admin::all();
        return view('admin.show_admin',compact('admin'));
      }
}


