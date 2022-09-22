$(document).ready(function(){
    var list_id = listid;

    $.ajax({
        url:"https://oenskeportalen.zap345502-1.plesk08.zap-webspace.com/API/Wishlist/read_one.php?id=" + list_id + "",
        type:'GET',
        dataType: 'json',
        success: function (response) {

        $("#listname").val(response.title);
        $("#description").text(response.description);
        $("#listid").val(response.id);
      }
    });
});
