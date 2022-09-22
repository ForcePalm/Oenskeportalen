$(document).ready(function(){
    $("#profile-but").click(function(){
        var name = $("#name").val();
        var email = $("#email").val();
        var birthday = $("#birthday").val();
        var password = $("#password").val();
        var users_id = $("#userid").val();

        if(name !="" && email != "" && birthday != ""){
            $.ajax({
                url:'code/profile_update.php',
                type:'post',
                data:{
                  name:name,
                  email:email,
                  birthday:birthday,
                  password:password,
                  users_id:users_id
                },
                success:function(response){
                    if(response == 1){
                        console.log(response);
                      $('#successtxt').text('Successfuldt oprettet liste!');

                    }else{
                        console.log(response);
                        $('#errortxt').text('Something went wrong, please try again!');
                    }
                }
            });
        }
    });
});
