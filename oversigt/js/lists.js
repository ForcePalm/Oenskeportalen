$(document).ready(function(){
    var user_id = userid;

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/read_all_where.php?id=" + user_id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {

        $.each(response, function(key, value) {
            for (var i = 0; i < value.length; i++) {
              $(".wishlist-wrapper").append("\
              <div class=\"wishlist\">\
                <p class=\"listheader\">"+value[i].title+"</p>\
                <p class=\"listdescription\">"+value[i].description+"</p>\
                <p class=\"wishcount\">Ønsker: "+value[i].wishcount+"</p>\
                <div class=\"wishlist-links\">\
                  <a id=\""+value[i].id+"\" class=\"listid\" href=\"liste\" onclick=\"listID();\">Se Liste</a>\
                  <a id=\""+value[i].id+"\" class=\"listid\" href=\"redigerliste\" onclick=\"listID();\">Rediger</a>\
                  <button id=\""+value[i].id+"\" onclick=\"del();\">Slet</button>\
                </div>\
              </div>");
            }
        });
    }
    });
});
