{{-- <form action="/promotion" method="post"> --}}
<form action="{{route('promotion.store')}}" method="post">
    @csrf
    <input type="text" name="name">
    <button type="submit">Ajouter</button>
</form>