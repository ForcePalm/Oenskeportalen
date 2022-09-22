$(document).ready(function(){
    var list_id = listid;

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/read_one.php?id=" + list_id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {

          $(".headline h2").text(response.title);
          $(".description").text(response.description);
      }
    });

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wish/read_all_where.php?id=" + list_id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {

          const formatter = new Intl.NumberFormat('da-DK', {
            style: 'currency',
            currency: 'DKK',
            minimumFractionDigits: 2
          })

        $.each(response, function(key, value) {
            for (var i = 0; i < value.length; i++) {
              var desc;
              if(value[i].description == ""){
                desc = "&nbsp;";
              }else{
                desc = value[i].description;
              }
              $(".wish-wrapper").append("\
              <div class=\"wish\">\
                <div class=\"wish-img\">\
                  <img src=\"../wishimgs/"+value[i].image+"\" alt=\""+value[i].title+"\" />\
                </div>\
                <div class=\"wish-text\">\
                  <p>"+value[i].title+"</p>\
                  <p>"+desc+"</p>\
                  <p class=\"wish-price\">"+formatter.format(value[i].price)+"</p>\
                  <div class=\"wish-links\">\
                    <a href=\""+value[i].link+"\" target=\"_blank\">Link</a>\
                    <button id=\""+value[i].id+"\" onclick=\"editwish();\">Rediger</a>\
                    <button id=\""+value[i].id+"\" onclick=\"delwish();\">Slet</button>\
                  </div>\
                </div>\
              </div>");
            }
        });
      },
      error: function(response){
        $(".pager").append("<p>Ingen ønsker.</p>");
      }
    });
});
