@if (Session::has('success'))
    <p>{{Session::get('success')}}</p>
@endif
@foreach ($promotion as $value)
    <p>{{$value->name}}</p>
    <a href="{{route('promotion.edit', $value->id)}}">Edit</a>
    <form method="post" action="{{route('promotion.destroy',$value->id)}}">
        @method('delete')
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
@endforeach