<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use App\Http\Requests\PromotionRequest;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try{
            $promotion = Promotion::get();
            return view('promotion.index')->with(['promotion'=>$promotion]);
        }catch(\Exception $e){
            dd("General Exception" . $e->getMessage());
        }catch(\Error $e){
            dd("php Exception" . $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        try{
            return view("promotion.add");
        }catch(\Exception $e){
            dd("General Exception" . $e->getMessage());
        }catch(\Error $e){
            dd("PHP Exception" . $e->getMessage());
        }
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
        try{
            $promotion = Promotion::create([
                "name" => $request->name
            ]);
        }catch(\Exception $e){
            dd("General exception" . $e->getMessage());
        }
        catch(\Error $e){
            dd("PHP exception" . $e->getMessage());
        }
        return redirect()->back()->with(['success' => 'La promotion a etait ajoute avec succee']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
