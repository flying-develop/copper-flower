import "../../css/pages/jury.scss";

document.addEventListener('DOMContentLoaded', () => {

    document.querySelectorAll('.jury-nav input').forEach(input => {
        input.addEventListener('change', (event) => {
            if (event.target.checked) {
                document.querySelectorAll('.jury-members').forEach(item => {
                    if (item.dataset.year == event.target.value) {
                        item.dataset.active = 'true';
                    } else {
                        item.dataset.active = 'false';
                    }
                })
            }
        }, {passive: false});
    });

    document.querySelector('.fancy-close').addEventListener('click', (event) => {
        window.Fancybox.close();
    }, {passive: false});

    window.Fancybox.bind('[data-member-popup]', {
        mainClass: 'fancy-member-popup',
        dragToClose: false,
        on: {
            reveal: (fancybox, slide) => {
                if (fancybox && fancybox.container && fancybox.container.classList.contains('fancy-member-popup')) {
                    fancyMemberPopup(fancybox.container);
                }
                document.documentElement.classList.add('member-popup-showed');
            },
            resize: (fancybox, slide) => {
                if (fancybox.container.classList.contains('fancy-member-popup')) {
                    fancyMemberPopup(fancybox.container);
                }
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('member-popup-showed');
            }
        }
    });
    window.Fancybox.bind('[data-fancybox]', {
        on: {
            reveal: (fancybox, slide) => {
                document.documentElement.classList.add('member-gallery-showed');
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('member-gallery-showed');
            }
        }
    });
    window.Fancybox.bind('[data-member-video]', {
        on: {
            reveal: (fancybox, slide) => {
                document.documentElement.classList.add('member-video-showed');
            },
            close: (fancybox, slide) => {
                document.documentElement.classList.remove('member-video-showed');
            }
        }
    });

});

function fancyMemberPopup(element) {
    if (!element.classList.contains('inited') && element.querySelector('.member-popup-scroll')) {
        element.classList.add('inited');

    }
    if (element.querySelector('.member-popup-scroll')) {
        if (element.querySelector('.member-popup-scroll').scrollHeight <= element.querySelector('.member-popup-scroll').offsetHeight + 5) {
            element.querySelector('.member-popup-scroll').classList.add('no-scrolled');
        } else {
            element.querySelector('.member-popup-scroll').classList.remove('no-scrolled');
        }
    }
}