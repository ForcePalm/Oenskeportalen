$(document).ready(function(){
    //register
    $(".register-btn").click(function(){
      $(".popup-overlay").show();
    });

    //Login
    $(".login-btn").click(function(){
      $(".popup-overlay").show();
    });

    //Popup
    $(".popup-overlay").click(function(){
      $(".popup-overlay").hide();
      $(".login").hide();
      $(".register").hide();
    });

    //Close
    $(".close-popup").click(function(){
      $(".popup-overlay").hide();
      $(".login").hide();
      $(".register").hide();
    });
});
