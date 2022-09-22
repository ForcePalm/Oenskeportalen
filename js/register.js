$(document).ready(function(){
    $("#reg-but").click(function(){
        var name = $("#regname").val().trim();
        var email = $("#regemail").val().trim();
        var password = $("#regpassword").val().trim();
        var birthday = $("#regbirthday").val().trim();

        if(name !="" && email != "" && password != "" && birthday != ""){
            $.ajax({
                url:'../code/register.php',
                type:'post',
                data:{
                  name:name,
                  email:email,
                  password:password,
                  birthday:birthday
                },
                success:function(response){
                    if(response == 1){
                        console.log(response);
                      $('#successtxt').text('Registeret Successfuldt!');
                      window.location = "/oversigt";
                    }else{
                        $('#errortxt').text('Something went wrong, please try again!');
                    }
                }
            });
        }
    });
});