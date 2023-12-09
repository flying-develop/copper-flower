import "../../css/pages/movie.scss";

import $ from 'jquery';
window.jQuery = $;

document.addEventListener('DOMContentLoaded', () => {

    document.querySelector('.page-title .media-nav').scrollLeft = document.querySelector('.page-title .media-nav .active-nav').offsetLeft;

    window.Fancybox.bind("[data-fancybox]", {
        // Your custom options
    });

    loadMore();
    window.jQuery(window).on('scroll resize', function () {
        loadMore();
    });

});

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
                action: 'moviemore'
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