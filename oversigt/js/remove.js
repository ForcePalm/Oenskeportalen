function removelist() {
  if (confirm('Er du helt sikker på at du vil slette den delte ønskeliste ?')) {
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
}
