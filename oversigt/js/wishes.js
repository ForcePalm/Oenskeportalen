$(document).ready(function(){
    var user_id= userid;

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/read_all_where.php?id=" + user_id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {
        $.each(response, function(key, value) {
            for (var i = 0; i < key.length; i++) {
              document.getElementById("wishlists").append("<p>"+value[i].title+"</p>");
            }


        });
    }
    });
});