import "../../css/pages/gallery.scss";

import $ from 'jquery';
window.jQuery = $;

document.addEventListener('DOMContentLoaded', () => {

    document.querySelector('.page-title .media-nav').scrollLeft = document.querySelector('.page-title .media-nav .active-nav').offsetLeft;
    galleryItems();

    window.Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    loadMore();
    window.jQuery(window).on('scroll resize', function () {
        loadMore();
    });

});

function galleryItems() {

    document.querySelectorAll('.gallery-item:not(.inited)').forEach(element => {
        element.classList.add('inited');
        let length = parseInt(element.querySelector('.slider').dataset.length);
        if (length > 1) {
            new window.Swiper(element.querySelector('.swiper-container'), {
                modules: [window.SwiperNavigation, window.SwiperScrollbar, window.SwiperMousewheel],
                mousewheel: {
                    forceToAxis: true,
                    releaseOnEdges: false
                },
                scrollbar: {
                    el: element.querySelector('.swiper-scrollbar')
                },
                navigation: {
                    nextEl: element.querySelector('.swiper-button-next'),
                    prevEl: element.querySelector('.swiper-button-prev')
                },
                slidesPerView: 'auto',
                spaceBetween: 8,
                breakpoints: {
                    576: {
                        spaceBetween: 12
                    },
                    1024: {
                        spaceBetween: 20
                    }
                }
            });
        }
    });

}

function loadMore() {
    let bottomOffset = 1000,
        button = document.querySelector('.infinite-loadmore');

    const threshold = document.body.offsetHeight - document.getElementById('footer').offsetHeight;
    const position = window.innerHeight + window.scrollY;

    if (button && position > threshold && !document.documentElement.classList.contains('infinite-loading')) {
        let paged = button.dataset.paged;
        window.jQuery.ajax({
            type: 'POST',
            url: infinite.ajax_url,
            data: {
                paged: paged,
                action: 'gallerymore'
            },
            beforeSend: function (xhr) {
                document.documentElement.classList.add('infinite-loading');
            },
            success:function(data){
                if ( data ) {
                    window.jQuery(button).after(data);
                    button.remove();
                    document.documentElement.classList.remove('infinite-loading');
                    galleryItems();
                }
            }
        })
    }
}