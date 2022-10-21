@foreach ($promotion as $item)
    <p>{{$item->name}}</p>
    <a href="{{route('promotion.edit', $item->id)}}">edit</a>
@endforeach