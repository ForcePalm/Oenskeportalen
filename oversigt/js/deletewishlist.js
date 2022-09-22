function del() {
  var delid = event.target.id;
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
}
