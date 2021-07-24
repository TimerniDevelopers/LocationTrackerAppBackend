
//     new WOW().init();
//     AOS.init();
//     $(function() {
//     $("#bars li .bar").each(function(key, bar) {
//         var percentage = $(this).data('percentage');
//
//         $(this).animate({
//             'height': percentage + '%'
//         }, 1000);
//     });
// });
    // Magnific popup
    $('.videos-icon').magnificPopup({
    type: 'iframe',
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
