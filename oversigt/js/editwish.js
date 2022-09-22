$(document).ready(function(){
    var edit_id = editid;
    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/read_one.php?id=" + edit_id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {
        $("#wishname").val(response.title);
        $("#wishprice").val(response.price);
        $("#wishlink").val(response.link);
        $("#description").text(response.description);
        var source = "../../wishimgs/"+response.image;
        $('#output').attr('src', source);
        $("#output").attr("alt", response.title);
      }
  });
    $("#editwish").click(function(){
      $.ajax({
          url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/read_one.php?id=" + edit_id + "",
          type:'GET',
          dataType: 'json',
          success: function (response) {
          var oldimg = response.image;
          if(oldimg != "nopic.jpg"){
            $.ajax({
              url:"code/deleteimg.php",
              type:'POST',
              data:{
                wishimg:oldimg
              },
                success: function (response) {
                  console.log(response);
              }
            })
          }
        }
      })

      var wishname = $("#wishname").val();
      var wishimg;
      if(wishname !=""){
        var wishprice = $("#wishprice").val();
        var wishlink = $("#wishlink").val();
        var description = $("#description").val();

        if($("#wishimg").get(0).files.length === 0){
          //update uden billede skift
          wishimg = $("#output").attr('src').slice(15);

        }else{
          //update billede

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
            "url": "https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/update.php",
            "method": "PUT",
            "timeout": 0,
            "headers": {
              "Content-Type": "application/json"
            },
            "data": JSON.stringify({
              "title":wishname,
              "description":description,
              "link":wishlink,
              "price":wishprice,
              "image":wishimg,
              "id":edit_id
            }),
          };

          $.ajax(settings).done(function (response) {

          });


      }else{
        alert("Du skal som min angive et ønske navn");
      }
        window.history.back();
    });
});
