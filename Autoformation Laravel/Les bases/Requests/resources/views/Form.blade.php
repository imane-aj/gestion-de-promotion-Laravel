{{-- <form action="Request" method="POST"> --}}
<form action="route" method="POST">
    @csrf
    Name<input name="name" type="text">
    email<input name="email" type="text">
    <button>click</button>
</form>