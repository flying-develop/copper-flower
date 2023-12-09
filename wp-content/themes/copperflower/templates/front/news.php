<?php
    global $post;
    $posts = get_posts([
        'numberposts' => 2,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'post_type' => [
            'news'
        ]
    ]);
?>
<?php if ($posts): ?>
    <div class="front-news">
        <div class="wrapper news-wrapper">
            <h2>Последние события</h2>
            <div class="news-items">
                <?php foreach ($posts as $post): ?>
                    <?php
                        setup_postdata($post);
                        get_template_part('templates/news/teaser');
                    ?>
                <?php endforeach; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <div class="news-btn">
                <a href="<?php echo get_permalink(109); ?>" class="btn btn--border">
                    <span>Читать все новости</span>
                </a>
            </div>
        </div>
    </div>
<?php endif; ?>
