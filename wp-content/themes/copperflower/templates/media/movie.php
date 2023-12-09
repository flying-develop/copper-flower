<?php

$articles = new WP_query([
    'post_type' => 'movie',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 6,
    'post_status' => 'publish'
]);

?>
<div class="wrapper page-wrapper">
    <div class="page-title">
        <div class="h1">Медиа</div>
        <div class="media-nav" data-active="news">
            <div class="wall"></div>
            <div class="links">
                <a href="<?php echo get_permalink(109); ?>" data-nav="news">
                    <span>Новости</span>
                </a>
                <a href="<?php echo get_permalink(115); ?>" data-nav="gallery">
                    <span>Фотогалерея</span>
                </a>
                <div class="active-nav" data-nav="movie">
                    <span>Видеогалерея</span>
                </div>
            </div>
            <div class="wall"></div>
        </div>
    </div>
    <div class="page-content">
        <?php if ($articles->have_posts()): ?>
            <div class="movie-wrapper">
                <?php
                    while ($articles->have_posts()) {
                        $articles->the_post();
                        get_template_part('templates/news/movie');
                    } wp_reset_postdata();
                ?>
                <?php if ($articles->max_num_pages > 1): ?>
                    <div class="infinite-loadmore" data-max="<?php echo $articles->max_num_pages; ?>" data-paged="1"></div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="movie-wrapper-empty">
                <p>Ничего не найдено</p>
            </div>
        <?php endif; ?>
    </div>
</div>