<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Requests\PromotionRequest;
use App\Models\Student;
use GuzzleHttp\Promise\Promise;
use Illuminate\Database\QueryException;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $false = 'Vérifier votre validation ou votre Connection';
    public function index()
    {
        //
        $promotion = Promotion::get();
        $students = Student::all();
        return view('promotion.index', [
            'promotion'=>$promotion,
            'students'=>$students
        ]);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("promotion.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        //
        $promotion = Promotion::create([
            "name" => $request->name
        ]);
        
        if($promotion){
            return redirect()->route('promotion.index')->with(['true' => 'La promotion a etait ajoute avec succés']);
        }else{
            return redirect()->back()->with(['false' => 'Y a un problem dans l"ajout']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // //
        // $promotion = Promotion::findOrFail($id);
        // return view('student.add', ['promotion', $promotion]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 
        $promotion = Promotion::findOrFail($id);
        $students  = Student::where('promoId', $id)->get();
        return view('promotion.edit', [
            'promotion' => $promotion,
            'students'  => $students
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionRequest $request,$id)
    {
        dd($id);
        $promotion = Promotion::findOrFail($id);
        $promotion->update([
            "name" => $request->name
        ]);
        if($promotion){
            return redirect()->route('promotion.index')->with(['true' => 'La promotion à été modifié avec succés']);
        }else{
            return back()->with(['false' => "Vérifier votre validation ou votre Connection"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
        $promotion = $promotion->first();
        $promotion->delete();
        return redirect()->route("promotion.index");
    }
}
