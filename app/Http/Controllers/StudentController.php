<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    public function create()
     {
        return view('student.create_student');
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

        $file_path = 'assets/upload/student';
        File::isDirectory($file_path) or File::makeDirectory($file_path, 0777, true,true);
        $file_name = Carbon::now()->timestamp;
        $file_extension = $request['file']->getClientOriginalExtension();
        $data['file']->move($file_path,$file_name.'.'.$file_extension);

        $student = Student::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'number' => $request['number'],
            'address' => $request['address'],
            'dob' => $request['dob'],
            'password' => Hash::make($request->password),
            'file' => $file_name.'.'.$file_extension,
            'role'  => 2,
        ]);

        // create User table
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request->password),
            'role' => 2
        ]);
        return redirect('/');
     }

     public function show()
      {
        $student = Student::all();
        return view('student.show_student',compact('student'));
      }

    public function edit($id)
     {
        $student = Student::find($id);
        return view('student.edit_student', compact('student'));
     }

     // only Update Student table
    public function update(Request $request, $id)
     {
        $student = Student::find($id);
        $student->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'number' => $request['number'],
            'address' => $request['address'],
            'dob' => $request['dob'],
        ]);

        return redirect()->route('show.student');
     }

     public function destroy($id)
      {
        $student = Student::find($id);
        $student->delete();
        return redirect()->route('show.student');
      }

}
