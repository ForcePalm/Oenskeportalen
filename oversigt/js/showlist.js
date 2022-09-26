function listID() {
  var list_id = event.target.id;

  $.ajax({
      url:'code/listses.php',
      type:'post',
      data:{
        listid:list_id
      },
      success:function(response){
        console.log(response);
          if(response == 1){
              
          }else{
          }
      }
  });

}
