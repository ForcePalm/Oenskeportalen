$(document).ready(function(){
      $(".show-password").click(function(){
        $(".show-password").toggleClass("fa-eye fa-eye-slash");
        if($(".toggle-password").attr('type') == 'password'){
          $(".toggle-password").attr("type", "text");
          $(".show-password").attr("title", "Skjul password")
        }else{
          $(".toggle-password").attr("type", "password");
          $(".show-password").attr("title", "Vis password")
        }
      });
});
