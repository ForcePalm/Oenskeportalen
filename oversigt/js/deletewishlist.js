function del() {
  if (confirm('Er du helt sikker på at du vil slette din ønskeliste ?')) {
    var delid = event.target.id;
    console.log(delid);
    $.ajax({
        url:"code/removewishlist.php",
        type:'POST',
        data:{
          delid:delid,
        },
        success: function (response) {
          location.reload(true);
      }
    })
    /*
    var settings = {
        "url": "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/delete.php",
        "method": "delete",
        "timeout": 0,
        "headers": {
        "Content-Type": "application/json"
        },
        "data": JSON.stringify({
          "id": delid
        }),
      };

      $.ajax(settings).done(function (response) {
        location.reload();
      });
      */
    }
}
