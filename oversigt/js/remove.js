function removelist() {
  var id = event.target.id;

  $.ajax({
      url:"code/remove.php",
      type:'POST',
      data:{
        id:id,
      },
      success: function (response) {
        location.reload(true);
    }
  })
}
