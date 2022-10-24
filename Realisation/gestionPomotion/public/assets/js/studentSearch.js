
    $('#searchS').on('keyup',function(){
        $value=$(this).val();
        $token=$('#token').val();
        console.log($token)
        console.log($value) 
            $.ajax({
            type : 'get',
            url : '/student/searchStudent',
            data:{'key':$value, 'token':$token},
            success:function(data){
            $('#div').html(data);
        }})
    }) 

// $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
