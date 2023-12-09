import "../../css/pages/news.scss";

import $ from 'jquery';
window.jQuery = $;

document.addEventListener('DOMContentLoaded', () => {

    document.querySelector('.fancy-close').addEventListener('click', (event) => {
        window.Fancybox.close();
    }, {passive: false});

    window.Fancybox.bind('[data-news-popup]', {
        mainClass: 'fancy-news-popup',
        dragToClose: false,
        on: {
            reveal: (fancybox, slide) => {
                if (fancybox && fancybox.container && fancybox.container.classList.contains('fancy-news-popup')) {
                    fancyNewsPopup(fancybox.container);
                }
                document.documentElement.classList.add('news-popup-showed');
            },
            resize: (fancybox, slide) => {
                if (fancybox.container.classList.contains('fancy-news-popup')) {
                    fancyNewsPopup(fancybox.container);
                }
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('news-popup-showed');
            }
        }
    });
    window.Fancybox.bind('[data-fancybox]', {
        on: {
            reveal: (fancybox, slide) => {
                document.documentElement.classList.add('news-gallery-showed');
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('news-gallery-showed');
            }
        }
    });
    window.Fancybox.bind('[data-news-video]', {
        on: {
            reveal: (fancybox, slide) => {
                document.documentElement.classList.add('news-video-showed');
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('news-video-showed');
            }
        }
    });

    loadMore();
    window.jQuery(window).on('scroll resize', function () {
        loadMore();
    });

});
function fancyNewsPopup(element) {
    if (!element.classList.contains('inited') && element.querySelector('.news-popup-scroll')) {
        element.classList.add('inited');

        if (element.querySelector('.slider')) {
            const block = element.querySelector('.slider');
            const slideLength = parseInt(block.querySelectorAll('.swiper-slide').length);
            if (slideLength > 1) {
                new window.Swiper(block.querySelector('.swiper-container'), {
                    modules: [window.SwiperNavigation, window.SwiperScrollbar, window.SwiperMousewheel],
                    loop: true,
                    autoHeight: true,
                    mousewheel: {
                        forceToAxis: true,
                        releaseOnEdges: false
                    },
                    scrollbar: {
                        el: block.querySelector('.swiper-scrollbar')
                    },
                    navigation: {
                        nextEl: block.querySelector('.swiper-button-next'),
                        prevEl: block.querySelector('.swiper-button-prev')
                    },
                    on: {
                        slideChange: function () {
                            if (element.querySelector('.news-popup-scroll')) {
                                if (element.querySelector('.news-popup-scroll').scrollHeight == element.querySelector('.news-popup-scroll').offsetHeight) {
                                    element.querySelector('.news-popup-scroll').classList.add('no-scrolled');
                                } else {
                                    element.querySelector('.news-popup-scroll').classList.remove('no-scrolled');
                                }
                            }
                        }
                    }
                });
            }
        }

    }
    if (element.querySelector('.news-popup-scroll')) {
        if (element.querySelector('.news-popup-scroll').scrollHeight <= element.querySelector('.news-popup-scroll').offsetHeight + 5) {
            element.querySelector('.news-popup-scroll').classList.add('no-scrolled');
        } else {
            element.querySelector('.news-popup-scroll').classList.remove('no-scrolled');
        }
    }
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
                action: 'newsmore'
            },
            beforeSend: function (xhr) {
                document.documentElement.classList.add('infinite-loading');
            },
            success:function(data){
                if ( data ) {
                    window.jQuery(button).after(data);
                    button.remove();
                    document.documentElement.classList.remove('infinite-loading');
                }
            }
        })
    }
}