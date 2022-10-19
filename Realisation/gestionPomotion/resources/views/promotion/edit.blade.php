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
            <a href="{{route('promotion.index')}}" class='addRoute'>Retourner au Tableau d'affichage</a>
        </div>
    </div>
</div>
<form action="{{route('promotion.update', $promotion->id)}}" method="post" class='edit'>
    @csrf
    @method('PUT')
    <div class="input-group mb-3">
        <input type="text" value="{{$promotion->name}}" class="form-control" name="name" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <button class="input-group-text" id="basic-addon2" type="submit"><i class="fa-solid fa-plus"></i> Ajouter</button>
    </div>
    @error('name')
        <p class="text-danger">{{$message}}</p>
    @enderror
</form>
<table class="table table-striped table-hover table-bordered promotion">
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
                <a href="{{route('edit', $value->id)}}"  class="edit"><i class="material-icons">&#xE254;</i></a>
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
@endsection