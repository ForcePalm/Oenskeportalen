$(document).ready(function(){
    $("#newlist-but").click(function(){
        var title = $("#title").val();
        var description = $("#description").val();
        var user_id = $("#user_id").val();

        var settings = {
            "url": "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/create.php",
            "method": "POST",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json"
            },
            "data": JSON.stringify({
              "title": title,
              "description": description,
              "users_id": user_id
            }),
          };

          $.ajax(settings).done(function (response) {
            window.location = "/oversigt";
          });
    });
});
