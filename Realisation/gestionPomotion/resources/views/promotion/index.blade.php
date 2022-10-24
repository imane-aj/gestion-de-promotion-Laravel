@extends('layouts.master')
@section('content')



            <div class="row">
                {{-- <div class="col-md-6"> --}}
                    <div class="table-title">
                        <div class="row">
                            @if (Session::has('true'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('true')}}
                                </div>
                            @endif
                            <div class="col-sm-8">
                                <div class="follow">
                                    <a class="btn btn-shadow" href="{{route('promotion.create')}}"><i class="la la-user-plus"></i>Ajouter Promotion</a>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="search-box">
                                    <i class="material-icons">&#xE8B6;</i>
                                    <input type="text" class="form-control" placeholder="Search&hellip;" id="search">
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover table-bordered promotion">
                        <thead>
                            <tr>
                                <th>Name </th>
                                <th>Totale Apprenants </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="div">
                            @foreach ($promotion as $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>{{DB::table('students')->where('students.promoToken',$value->token)->count()}}</td>
                                <td>
                                    <a href="{{route('promotion.edit', $value->token)}}"  class="edit"><i class="material-icons">&#xE254;</i></a>
                                    <form method="post" action="{{route('promotion.destroy',$value->id)}}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="delete"><i class="material-icons">&#xE872;</i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                   
                    
                </div>
            </div>
         
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{asset('assets/js/promotionSearch.js')}}"></script>
@endsection
            
        
