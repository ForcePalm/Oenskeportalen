$(document).ready(function(){
    //Menu
    $("#menu").click(function(){
      $("#menu span").toggleClass("fa-bars fa-times");
      $(".menu").slideToggle();

    });
});
