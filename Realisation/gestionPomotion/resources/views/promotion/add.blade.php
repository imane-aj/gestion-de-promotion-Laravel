@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-sm-8">
        <p class='title'>Ajouter promotion</p>
    </div>
    <div class="col-sm-4">
        <div class="search-box">
            <a href="{{route('promotion.index')}}" class='addRoute'>Retourner au Tableau d'affichage</a>
        </div>
    </div>
</div>
<form action="{{route('promotion.store')}}" method="post" class="add">
    @csrf
    <div class="input-group mb-3">
        <input type="text" class="form-control" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <button class="input-group-text" id="basic-addon2" type="submit"><i class="fa-solid fa-plus"></i> Ajouter</button>
    </div>
    @error('name')
      <p class="text-danger">{{$message}}</p>
    @enderror
</form>
@endsection