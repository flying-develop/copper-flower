import "../../css/pages/about.scss";

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.about-history-nav input').forEach(input => {
        input.addEventListener('change', (event) => {
            if (event.target.checked) {
                document.querySelectorAll('.about-history .history-events').forEach(item => {
                    if (item.dataset.year == event.target.value) {
                        item.dataset.active = 'true';
                    } else {
                        item.dataset.active = 'false';
                    }
                })
            }
        }, {passive: false});
    });

    window.Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    const teamSlider = document.querySelector('.about-team-slider');
    if (teamSlider && parseInt(teamSlider.dataset.length) > 1) {
        new window.Swiper(teamSlider.querySelector('.swiper-container'), {
            modules: [window.SwiperNavigation, window.SwiperScrollbar, window.SwiperMousewheel],
            loop: true,
            //autoHeight: true,
            mousewheel: {
                forceToAxis: true,
                releaseOnEdges: false
            },
            scrollbar: {
                el: teamSlider.querySelector('.swiper-scrollbar')
            },
            navigation: {
                nextEl: teamSlider.querySelector('.swiper-button-next'),
                prevEl: teamSlider.querySelector('.swiper-button-prev')
            }
        });
    }

});