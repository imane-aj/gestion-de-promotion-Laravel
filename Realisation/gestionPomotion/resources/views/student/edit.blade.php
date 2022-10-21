@extends('layouts.master')
@section('content')
@if (Session::has('false'))
    <div class="alert alert-danger" role="alert">
        {{Session::get('false')}}
    </div>
@endif
<div class="row">
    <div class="col-sm-8">
        <p class='title'>Modifer promotion</p>
    </div>
    <div class="col-sm-4">
        <div class="search-box">
            <a href="{{route('promotion.edit', $student->promoToken)}}" class='addRoute'>Retourner au Tableau d'affichage</a>
        </div>
    </div>
</div>
<form action="{{route('student.update', $student->id)}}" method="post" class='edit'>
    @csrf
    @method('PUT')
    <div class="input-group mb-3">
        <input type="text" value="{{$student->name}}" class="form-control" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    @error('name')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <div class="input-group mb-3">
        <input type="text" value="{{$student->lastName}}" class="form-control" name="lastName" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    @error('lastName')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <div class="input-group mb-3">
        <input type="text" value="{{$student->email}}" class="form-control" name="email" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    @error('email')
        <p class="text-danger">{{$message}}</p>
    @enderror

    <button type="submit">Modifier</button>
</form>
@endsection