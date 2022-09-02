$(document).ready(function(){
    //register
    $("#register").click(function(){
      $(".popup-overlay").show();
    });

    //Login
    $("#login").click(function(){
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
