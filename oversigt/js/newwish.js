$(document).ready(function(){
    $("#newwish-btn").click(function(){
        var wishname = $("#wishname").val();
        var wishprice = $("#wishprice").val();
        var wishlink = $("#wishlink").val();
        var wishdescription = $("#wishdescription").val();
        var list_id = listid;
        var wishimg;

        if(wishname !=""){

          if ($('#wishimg').get(0).files.length === 0) {
            wishimg = "nopic.jpg";
          }else{
            var file_data = $('#wishimg').prop('files')[0];
            wishimg = file_data.name;
            // Making the image file object
             var file = $('#wishimg').prop("files")[0];

             // Making the form object
             var form = new FormData();

             // Adding the image to the form
             form.append("image", file);

            $.ajax({
              url: "code/uploadimg.php",
              type: "POST",
              data:  form,
              contentType: false,
              processData:false,
            }).done(function(response){
              console.log(response);
              console.log("Success: Files sent!");
            }).fail(function(response){
              console.log(response);
              console.log("An error occurred, the files couldn't be sent!");
            });
          }

          var settings = {
              "url": "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/create.php",
              "method": "POST",
              "timeout": 0,
              "headers": {
                "Content-Type": "application/json"
              },
              "data": JSON.stringify({
                "title": wishname,
                "link": wishlink,
                "description": wishdescription,
                "price": wishprice,
                "image": wishimg,
                "wishlist_id": list_id
              }),
            };

        }else{
          alert("Fejl: Du skal som min angive et ønske navn")
        }
          $.ajax(settings).done(function (response) {
            window.history.back();
          });

    });

});
