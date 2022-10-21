<form action="{{route('promotion.update', $prm->id)}}" method="post">
    @csrf
    @method('put')
    <input type="text" name="name" value="{{$prm->name}}">
    <button type="submit">Modifier</button>
</form>