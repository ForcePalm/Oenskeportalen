function delwish() {
  if (confirm('Er du helt sikker på at du vil slette dit ønske ?')) {
    var delid = event.target.id;
    var wishimg;

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/read_one.php?id=" + delid + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {
          wishimg = response.image;

          if(wishimg != "nopic.jpg"){
            $.ajax({
              url:"code/deleteimg.php",
              type:'POST',
              data:{
                wishimg:wishimg
              },
                success: function (response) {

              }
            })
          }
          $.ajax({
            url:"code/deletewish.php",
            type:'POST',
            data:{
              delid:delid
            },
              success: function (response) {
                location.reload(true);
            }
          })
          /*
          var settings = {
              "url": "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/delete.php",
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
              location.reload(true);
            });
            */
      }
    })
  }
}
