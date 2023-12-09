class FrontSlider
{
    constructor() {

        this.block = document.querySelector('.front-slider');

        if (this.block && parseInt(this.block.dataset.length) > 1) {
            this.init();
        }

    }

    init() {

        const progressCircle = this.block.querySelector('.autoplay-progress svg');
        this.slider = new window.Swiper(this.block, {
            modules: [window.SwiperNavigation, window.SwiperScrollbar, window.SwiperMousewheel, window.SwiperAutoplay],
            loop: true,
            autoplay: {
                delay: 5000,
                pauseOnMouseEnter: true
            },
            mousewheel: {
                forceToAxis: true,
                releaseOnEdges: false
            },
            scrollbar: {
                el: this.block.querySelector('.swiper-scrollbar')
            },
            navigation: {
                nextEl: this.block.querySelector('.swiper-button-next'),
                prevEl: this.block.querySelector('.swiper-button-prev')
            },
            on: {
                autoplayTimeLeft(s, time, progress) {
                    progressCircle.style.setProperty("--progress", 1 - progress);
                }
            }
        });

    }

}

export default FrontSlider;