$(document).ready(function(){
    var id= listid;

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/read_One.php?id=" + id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {
        $.each(response, function(key, value) {
            for (var i = 0; i < value.length; i++) {
              document.getElementById("wishlists").append("<p>"+value[i].title+"</p>");
            }


        });
    }
    });
});
