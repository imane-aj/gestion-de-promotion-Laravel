<?php

namespace App\Http\Controllers;
use App\Models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{
//exmple 1
 public function afficher(){
     return'hello world';
 }
//exmple 2
 public function index(){
   $name= " nada";
   $age=21;
   return view('index',compact('name','age'));
   
 }

 //exmple 3
    public function __invoke()
    {
        return 'This is an invokable controller';
    }
}
