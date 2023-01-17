<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
     public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'max:200'],
            'password' => ['required', 'string', 'max:16', 'min:6'],
        ]);

            $login_credentials = [
            'email'     => $request->email,
            'password'  => $request->password
                ];
            $user = User::where('email', $login_credentials['email'])->first();

            if(Auth::attempt(  $login_credentials ))
            {
                if(Auth::user()->role == '1')
                 {
                     return view('admin.admin_dashboard');
                 }
                 else
                 {
                    return view('student.student_dashboard');
                 }

            }
            else
            {
            return back()->withErrors(['password' => 'wrong password']);
            }
    }

    public function logout()
     {
         Auth::logout();
         return redirect()->route('login');
     }
}
