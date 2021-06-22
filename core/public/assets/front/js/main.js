$(document).ready(function($){
  "use strict";

//==============================
// smooth scroll
//==============================


  // hero-carousel

  $(".hero-carousel").owlCarousel({
    loop:true,
    margin:20,
    nav:true,
    navText:["<i class='fas fa-chevron-left'></i>",	"<i class='fas fa-chevron-right'></i>"],
    dots:true,

    responsive:{
      0:{
        items:1
      },
      410:{
        items:1
      },
      600:{
        items:1
      },
      1000:{
        items:1
      }
    }
});


    $(window).on('scroll', function() {
    if ($(window).scrollTop() > 1) {
        $("#f-header").addClass("fixed-nav");
    } else {
        $("#f-header").removeClass("fixed-nav");
    }
});




}(jQuery));
