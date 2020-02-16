(function($) {

    'use strict';

    var $owl = $('#section-appscreen1 .owl-carousel');

    $owl.children().each(function(index) {
        $(this).attr('data-position', index); // NB: .attr() instead of .data()
    });

    $owl.owlCarousel({
        loop: false,
        margin: 30,
        nav: false,
        center: false,
        dots: false,
        responsive: {
            1655: {
                items: 4,
            },
            1200: {
                items: 4,
            },
            768: {
                items: 3,
            },
            576: {
                items: 2,
                spaceBetween: 15,
            },
            0: {
                items: 1,
            }
        }
    });

    $(document).on('click', '#section-appscreen1 .owl-item>div', function() {
        $owl.trigger('to.owl.carousel', $(this).data('position'));
    });

})(jQuery);