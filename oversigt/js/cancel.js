function cancelres() {
  var cid = event.target.id;

  $.ajax({
      url:"code/cancel.php",
      type:'POST',
      data:{
        cid:cid,
      },
      success: function (response) {
        location.reload(true);
    }
  })
}
