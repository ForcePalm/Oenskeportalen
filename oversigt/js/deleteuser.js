$(document).ready(function(){
    $(".delete").click(function(e){
      if (confirm('Er du helt sikker på at du vil slette din profil på ønskeportalen ?')) {
        var user_id = this.id;

        var settings = {
            "url": "code/deleteuser.php",
            "method": "delete",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json"
            },
            "data": JSON.stringify({
              "users_id": user_id
            }),
          };

          $.ajax(settings).done(function (response) {
            console.log(response);
          });
      }

    });
});
