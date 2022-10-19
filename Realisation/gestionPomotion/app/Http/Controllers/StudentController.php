<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', ['student' => $student]);
    }

    public function update(Request $request,$id){
        $student = Student::findOrFail($id);
        // dd($student);
        $student->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
        ]);
        
        return redirect()->route('promotion.edit');
    }
}
