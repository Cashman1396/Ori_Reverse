
    (function($) {
        $('.your-class').slick({
            dots: true

        }); 
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.slider-nav'
          });
          
          $('.slider-nav').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            arrows: true,
            dots: true,
            centerMode: true,
            focusOnSelect: true
          }); })(jQuery);

        




