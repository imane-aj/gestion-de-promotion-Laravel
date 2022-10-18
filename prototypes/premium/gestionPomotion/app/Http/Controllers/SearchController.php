<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    // public function index(){
    //     return view('promotion.index');
    // }
    public function searchPromo(Request $request){
        if($request->ajax()){
            
            $query = $request->get('query');
            // dd($query);
            if(!empty($query)){
                $output = '';
                $promotions = Promotion::where('name', 'like', '%' . $query . '%')->get();
                if($promotions){
                    foreach($promotions as $promotion){
                        $output.='<tr>'.
                        '<td>'.$promotion->name.'</td>'.
                        '<td> <a href="' .route('promotion.edit',$promotion->id ).'">Edit</a></td>'.
                        '<td> <form method="post" action="'.route('promotion.destroy',$promotion->id ).'">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="'. csrf_token() .'">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form></td>'.
                        '</tr>';
                    }
                    return Response($output);
                }
            
            }
        }
    }
}
