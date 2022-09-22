$(document).ready(function(){
    $("#login-but").click(function(){
        var email = $("#loginemail").val().trim();
        var password = $("#loginpassword").val().trim();

        if( email != "" && password != "" ){
            $.ajax({
                url:'../code/login.php',
                type:'post',
                data:{
                  email:email,
                  password:password
                },
                success: function(response){
                    console.log(response);
                    if(response == 1){
                      window.location = "/oversigt";
                    }else{
                      $('#login-error').text('Forkert E-Mail eller Password!');
                    }
                }
            });
        }
    });
});