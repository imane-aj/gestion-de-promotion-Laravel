<!DOCTYPE html>
<html>
<head>
<meta name="_token" content="{{ csrf_token() }}">
<title>Live Search</title>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
@if (Session::has('success'))
    <p>{{Session::get('success')}}</p>
@endif

<input type="text" id="search">
<table>
    <thead>
            <th>name</th>
            <th>actions</th>
    </thead>
    <tbody id="div">
        @foreach ($promotion as $value)
            <tr>
                <td>{{$value->name}}</td>
                <td>
                    <a href="{{route('promotion.edit', $value->id)}}">Edit</a>
                    <form method="post" action="{{route('promotion.destroy',$value->id)}}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
     $('#search').on('keyup',function(){
        $value=$(this).val(); 
        if($value != ' '){
            $.ajax({
            type : 'get',
            url : 'search',
            data:{'query':$value},
            success:function(data){
            $('#div').html(data);
        }})
        }else{
            $("#div").css("display", "none");
        }  
        
        })
</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>
</body>
</html>