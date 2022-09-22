function editwish() {
  var editid = event.target.id;

  $.ajax({
      url:'code/editidlist.php',
      type:'post',
      data:{
        editid:editid,
      },
      success:function(response){
          if(response == 1){
              window.location = "/oversigt/rediger";
          }else{
          }
      }
  });

}
