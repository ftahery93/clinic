(function($) {

    'use strict';

    var swiper = new Swiper('.swiper-container.features1', {
        slidesPerView: 1,
        spaceBetween: 20,
        width: 300,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 'auto',
                spaceBetween: 10
            },
            // when window width is >= 480px
            480: {
                slidesPerView: 'auto',
                spaceBetween: 10
            },
            // when window width is >= 640px
            640: {
                slidesPerView: 'auto',
                spaceBetween: 20
            }
        },
        navigation: {
            nextEl: "#section-features1 .fa-long-arrow-right",
            prevEl: "#section-features1 .fa-long-arrow-left"
        },

    });

})(jQuery);