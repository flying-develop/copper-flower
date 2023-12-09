<?php

$partners = new WP_query([
    'post_type' => 'partner',
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 999,
    'post_status' => 'publish'
]);
?>
<?php if ($partners->have_posts()): ?>
<div class="partner-items">
    <?php
        while ($partners->have_posts()) {
            $partners->the_post();
            get_template_part('templates/partners/item');
        } wp_reset_postdata();
    ?>
</div>
<?php endif; ?>
