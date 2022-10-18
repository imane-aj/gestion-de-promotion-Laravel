<p>
    AJOUTER PROMOTION
</p>
@if (Session::has("success"))
    <p>{{Session::get('success')}}</p>
@endif
<form action="{{route('promotion.store')}}" method="post">
    @csrf
    <input type="text" name="name">
    <button type="submit">AJOUTER</button>
</form>