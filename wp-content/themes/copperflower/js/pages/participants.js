import "../../css/pages/participants.scss";

document.addEventListener('DOMContentLoaded', () => {

    window.Fancybox.bind("[data-fancybox]", {
        on: {
            reveal: (fancybox, slide) => {
                document.documentElement.classList.add('movie-gallery-showed');
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('movie-gallery-showed');
            }
        }
    });

    document.querySelector('.fancy-close').addEventListener('click', (event) => {
        window.Fancybox.close();
    }, {passive: false});
    window.Fancybox.bind('[data-movie-popup]', {
        mainClass: 'fancy-movie-popup',
        dragToClose: false,
        on: {
            reveal: (fancybox, slide) => {
                if (fancybox && fancybox.container && fancybox.container.classList.contains('fancy-movie-popup')) {
                    fancyMoviePopup(fancybox.container);
                }
                document.documentElement.classList.add('movie-popup-showed');
            },
            resize: (fancybox, slide) => {
                if (fancybox.container.classList.contains('fancy-movie-popup')) {
                    fancyMoviePopup(fancybox.container);
                }
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('movie-popup-showed');
            }
        }
    });
    window.Fancybox.bind('[data-movie-video]', {
        on: {
            reveal: (fancybox, slide) => {
                document.documentElement.classList.add('movie-video-showed');
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('movie-video-showed');
            }
        }
    });

    const block = document.querySelector('.participants-winners');
    if (block) {
        document.querySelectorAll('.participants-winners-item input').forEach(input => {
            input.addEventListener('change', (event) => {
                if (event.target.checked) {
                    document.querySelectorAll('.participants-winners .winners-movies').forEach(item => {
                        if (item.dataset.year == event.target.value) {
                            item.dataset.active = 'true';
                        } else {
                            item.dataset.active = 'false';
                        }
                    })
                }
            }, {passive: false});
        });
        document.querySelectorAll('.participants-winners .winners-movies').forEach(item => {
            const length = parseInt(item.dataset.length);
            if (length > 1) {
                new window.Swiper(item.querySelector('.swiper-container'), {
                    modules: [window.SwiperNavigation, window.SwiperScrollbar, window.SwiperMousewheel],
                    slidesPerView: 'auto',
                    spaceBetween: 8,
                    breakpoints: {
                        768: {
                            spaceBetween: 16
                        },
                        1024: {
                            spaceBetween: 24
                        },
                        1200: {
                            spaceBetween: 32
                        }
                    },
                    //autoHeight: true,
                    mousewheel: {
                        forceToAxis: true,
                        releaseOnEdges: false
                    },
                    scrollbar: {
                        el: item.querySelector('.swiper-scrollbar')
                    },
                    navigation: {
                        nextEl: item.querySelector('.swiper-button-next'),
                        prevEl: item.querySelector('.swiper-button-prev')
                    }
                });
            }
        });
    }

    const interviewsBlock = document.querySelector('.participants-interviews');
    if (interviewsBlock) {
        let length = parseInt(interviewsBlock.querySelector('.interviews-slider').dataset.length);
        if (length > 1) {
            new window.Swiper(interviewsBlock.querySelector('.swiper-container'), {
                modules: [window.SwiperNavigation, window.SwiperScrollbar, window.SwiperMousewheel],
                mousewheel: {
                    forceToAxis: true,
                    releaseOnEdges: false
                },
                scrollbar: {
                    el: interviewsBlock.querySelector('.swiper-scrollbar')
                },
                navigation: {
                    nextEl: interviewsBlock.querySelector('.swiper-button-next'),
                    prevEl: interviewsBlock.querySelector('.swiper-button-prev')
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
    }

});

function fancyMoviePopup(element) {
    if (!element.classList.contains('inited') && element.querySelector('.movie-popup-scroll')) {
        element.classList.add('inited');

    }
    if (element.querySelector('.movie-popup-scroll')) {
        if (element.querySelector('.movie-popup-scroll').scrollHeight <= element.querySelector('.movie-popup-scroll').offsetHeight + 5) {
            element.querySelector('.movie-popup-scroll').classList.add('no-scrolled');
        } else {
            element.querySelector('.movie-popup-scroll').classList.remove('no-scrolled');
        }
    }
}