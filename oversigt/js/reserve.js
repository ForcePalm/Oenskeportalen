function reserveWish() {
  var rid = event.target.id;

  $.ajax({
      url:"code/reserve.php",
      type:'POST',
      data:{
        rid:rid,
      },
      success: function (response) {
        location.reload(true);
    }
  })
}
