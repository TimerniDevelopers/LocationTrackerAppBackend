$(document).ready(function($){
  "use strict";
//==============================
// smooth scroll
//==============================
  $("[data-background").each(function(){
    $(this).css("background-image", "url(" + $(this).attr("data-background")+")")
 })


  $(window).on('scroll', function () {
    var wscroll = $(this).scrollTop();
    //fixed-nav
    wscroll > 1 ? $("#header").addClass("fixed") : $("#header").removeClass("fixed");

    // go top appear
    wscroll > 700 ? $("#goTop").fadeIn() : $("#goTop").fadeOut();

  });


  $( document ).ready(function() {
    $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      dots:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:2
          },
          800:{
            items:3
        },
    
          1000:{
              items:4
          },
          1500:{
            items:5
        }
      }
  })


});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

 // Magnific popup
       $('.videos-icon').magnificPopup({
        type:'iframe',
        iframe: {
          patterns: {
            youtube: {
              index: 'youtube.com/', 

              id: 'v=', 
              src: 'http://www.youtube.com/embed/%id%?autoplay=1' 
            }

          },
          srcAction: 'iframe_src',
        }
      });

// portfolio popup image
$('.image-link').magnificPopup({type:'image'});

}(jQuery));

