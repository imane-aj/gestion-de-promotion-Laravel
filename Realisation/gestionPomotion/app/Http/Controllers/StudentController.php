<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use App\Models\Promotion;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    public function create($id){
        
        $id = Promotion::findOrFail($id)->id;
        // dd($id);
        return view('student.add', ["id" => $id]);
    }

    public function store(StudentRequest $request){
        $student = Student::create([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'email' => $request->email,
            'promoId' => $request->promoId
        ]);
        return redirect()->route('promotion.edit', $student->promoId);
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
        
        return redirect()->route('promotion.edit', $student->promoId);
    }

    public function destroy($id){
        $student = Student::findOrFail($id);
        $student->delete();
        return back();
    }
}