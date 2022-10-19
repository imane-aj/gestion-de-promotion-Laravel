<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //exemple 1
    function index(Request $request){
        $name = $request->input("name");
        return view('index',compact("name"));
    }


    


    //exemple 2
    function findId(Request $request,$id){

        if($id > 1){
        $name = $request->input("name");
        return "Hello $name";
    }
    }
}
