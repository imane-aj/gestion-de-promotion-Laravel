@extends('layouts.master')
@section('content')



            <div class="row">
                <div class="col-md-6">
                    <div class="table-title">
                        <div class="row">
                            @if (Session::has('true'))
                                <div class="alert alert-success" role="alert">
                                    {{Session::get('true')}}
                                </div>
                            @endif
                            <div class="col-sm-8">
                                <a href="{{route('promotion.create')}}" class='addRoute'>Ajouter promotion</a>
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
                                <th>Name <i class="fa fa-sort"></i></th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="div">
                            @foreach ($promotion as $value)
                            <tr>
                                <td>{{$value->name}}</td>
                                <td>
                                    <a href="{{route('promotion.edit', $value->id)}}"  class="edit"><i class="material-icons">&#xE254;</i></a>
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
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="promotionCount">
                                <i class="fa-solid fa-graduation-cap"></i>
                                <p>Total Promotion <span>{{$promotion->count()}}</span></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="studentCount">
                                <i class="fa-solid fa-users"></i>
                                <p>Total Etudients <span>100</span></p>
                            </div>
                        </div>
                    </div>
                   
                    
                </div>
            </div>
         
    

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
 $('#search').on('keyup',function(){
    $value=$(this).val(); 
    if($value != ' '){
        $.ajax({
        type : 'get',
        url : 'search',
        data:{'query':$value},
        success:function(data){
        $('#div').html(data);
    }})
    }else{
        $("#div").css("display", "none");
    }  
    
    }) 
</script>
<script type="text/javascript">
$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script> 

@endsection
            
        
