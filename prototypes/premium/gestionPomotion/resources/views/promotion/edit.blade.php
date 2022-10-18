
<form action="{{route('promotion.update', $promotion->id)}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name ='name' value="{{$promotion->name}}">
    <input type="submit" value="Modifier">
</form>