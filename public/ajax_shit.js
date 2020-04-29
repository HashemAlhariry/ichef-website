$(document).ready(function(){

    $('form').on('submit', function(){

        $.ajax({
            type: 'POST',
            url: '/user',
            data: 'BLA',
            success: function(data){
                location.reload();
            }
        });
    });
});


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('form').on('submit', function(){
            var username = $('form #username');
            var password = $('form #password');
            var login_data = {username: username.val(), password: password.val()};
            //location.reload();
            $.ajax({
                type: 'POST',
                url: '/register',
                data: login_data,
                // success: function(data){
                //     location.href = '/login'
                // }
            });
            return false;
        });
    });
</script>