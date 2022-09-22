$(document).ready(function(){
    $("#editlist-but").click(function(){
        var title = $("#listname").val();
        var description = $("#description").val();
        var listid = $("#listid").val();

        var settings = {
            "url": "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/update.php",
            "method": "PUT",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json"
            },
            "data": JSON.stringify({
              "title":title,
              "description":description,
              "id":listid
            }),
          };
          $.ajax(settings).done(function (response) {
            window.location = "/oversigt";
          });
    });
});
