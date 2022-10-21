<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function create($token){
        return view('student.add', ["token" => $token]);
    }

    public function store(StudentRequest $request){
        // dd('store');
        $student = Student::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'promoToken' => $request->promoToken
        ]);
        return redirect()->route('promotion.edit', $student->promoToken);
    }

    public function edit($id){
        $student = Student::findOrFail($id);
        return view('student.edit', ['student' => $student]);
    }

    public function update(StudentRequest $request,$id){
        // dd($id);
        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
        ]);
        
        return redirect()->route('promotion.edit', $student->promoToken);
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return back();
    }
}