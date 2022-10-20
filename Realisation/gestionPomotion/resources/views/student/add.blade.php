@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <p class='title'>Ajouter promotion</p>
    </div>
    <div class="col-sm-4">
        <div class="search-box">
            <a href="{{route('promotion.edit', $id)}}" class='addRoute'>Retourner au Tableau d'affichage</a>
        </div>
    </div>
</div>
<form action="{{route('student.store', $id)}}" method="post" class="add">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Nom" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    @error('name')
      <p class="text-danger">{{$message}}</p>
    @enderror

    <div class="input-group mb-3">
        <input type="text" class="form-control" name="lastName" placeholder="Prénom" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    @error('lastName')
      <p class="text-danger">{{$message}}</p>
    @enderror

    <div class="input-group mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
    </div>
    @error('email')
      <p class="text-danger">{{$message}}</p>
    @enderror
    <input type="hidden" name="promoId" value="{{$id}}">
    <button class="input-group-text" id="basic-addon2" type="submit"><i class="fa-solid fa-plus"></i>Ajouter etudient</button>
</form>
@endsection