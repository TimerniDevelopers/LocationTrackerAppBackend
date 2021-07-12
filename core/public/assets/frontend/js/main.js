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
      $('.count').each(function () {
        $(this).prop('Counter',0).animate({
          Counter: $(this).text()
        }, {
          duration: 4000,
          easing: 'swing',
          step: function (now) {
            $(this).text(Math.ceil(now));
          }
        });
      });

      $(function() {
        $("#bars li .bar").each( function( key, bar ) {
          var percentage = $(this).data('percentage');
          
          $(this).animate({
            'height' : percentage + '%'
          }, 1000);
        });
      });







}(jQuery));
