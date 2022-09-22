function getshareid() {
  var sharelistid = event.target.id;

  $.ajax({
      url:'code/sharelistid.php',
      type:'post',
      data:{
        sharelistid:sharelistid,
      },
      success:function(response){
          if(response == 1){
              window.location = "/oversigt/deltliste";
              console.log(sharelistid);
          }else{
          }
      }
  });

}
