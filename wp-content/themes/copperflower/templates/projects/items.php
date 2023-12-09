<?php
    $projects = new WP_query([
        'post_type' => 'project',
        'orderby' => 'date',
        'order' => 'DESC',
        'posts_per_page' => 999,
        'post_status' => 'publish'
    ]);
?>
<?php if ($projects->have_posts()): ?>
    <div class="project-items">
        <?php
            while ($projects->have_posts()) {
                $projects->the_post();
                get_template_part('templates/projects/item');
            } wp_reset_postdata();
        ?>
    </div>
<?php endif; ?>