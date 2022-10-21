@extends('layouts.master')
@section('content')
@if (Session::has('false'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('false')}}
    </div>
@endif
<div class="row editProJs">
    <div class="col-md-6"><form action="{{route('promotion.update', $promotion->token)}}" method="post" class='edit'>
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <p class='title' onclick="change()">{{$promotion->name}}</p>
            <input type="text" value="{{$promotion->name}}" class="form-control input" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <button class="input-group-text butn" id="basic-addon2" type="submit"><i class="material-icons">&#xE254;</i> Modifier</button>
        </div>
        @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
    </form></div>
    <div class="col-md-6">
        <div class="row searchStd editPro">
            <div class="col-sm-8">
                <a href="{{route('student.create', ['token' => $promotion->token])}}" class='addRoute'>Ajouter Student</a>
            </div>
            <div class="col-sm-4">
                <div class="search-box">
                    <i class="material-icons">&#xE8B6;</i>
                    <input type="text" class="form-control" placeholder="Search&hellip;" id="search">
                </div>
            </div>
        </div>
    </div>
</div>



{{-- <table class="table table-striped table-hover table-bordered promotion">
    <thead>
        <tr>
            <th>Prénom <i class="fa fa-sort"></i></th>
            <th>Nom <i class="fa fa-sort"></i></th>
            <th>Email <i class="fa fa-sort"></i></th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="div">
        @foreach ($students as $value)
        <tr>
            <td>{{$value->name}}</td>
            <td>{{$value->lastName}}</td>
            <td>{{$value->email}}</td>
            <td>
                <a href="{{route('student.edit', $value->id)}}"  class="edit"><i class="material-icons">&#xE254;</i></a>
                <form method="post" action="{{route('student.destroy',$value->id)}}">
                    @method('delete')
                    @csrf
                    <button type="submit" class="delete"><i class="material-icons">&#xE872;</i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> --}}

<div class="row">
    @foreach ($studentPromo as $value)
        <div class="col-xl-3 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="dropdown float-end">
                        <a class="text-muted dropdown-toggle font-size-16" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="bx bx-dots-horizontal-rounded"></i></a>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#">Edit</a><a class="dropdown-item" href="#">Remove</a></div>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="img"><img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="avatar-md rounded-circle img-thumbnail" /></div>
                        <div class="flex-1 ms-3">
                            <h5 class="font-size-16 mb-1"><a href="#" class="text-dark">Phyllis Gatlin</a></h5>
                        </div>
                    </div>
                    <div class="mt-3 pt-1 info">
                        <p class="text-muted mb-0"><i class="fa-regular fa-user"></i> Nom: {{$value->name}}</p>
                        <p class="text-muted mb-0 mt-2"><i class="fa-regular fa-user"></i> Prenom: {{$value->lastName}}</p>
                        <p class="text-muted mb-0 mt-2"><i class="fa-regular fa-envelope"></i> {{$value->email}}</p>
                    </div>
                    <div class="d-flex gap-2 pt-4">
                        <button type="button" class="btn btn-soft-primary btn-sm w-50"><i class="bx bx-user me-1"></i> Profile</button>
                        <button type="button" class="btn btn-primary btn-sm w-50 contact"><i class="bx bx-message-square-dots me-1"></i> Contact</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>






<script>
    let input = document.querySelector('.input');
    let text = document.querySelector('.title');
    let butn = document.querySelector('.butn');

    input.setAttribute("type", "hidden");
    
    function change(){
        input.setAttribute("type", "text");
        text.style.display = "none"
        butn.style.cssText = null;
    }
    butn.style.cssText = 'position: absolute; right: 0; marginTop: 0.5em'
</script>
@endsection

