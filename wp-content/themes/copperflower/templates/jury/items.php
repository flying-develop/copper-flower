<?php

$juryItems = new WP_query([
    'post_type' => 'jury',
    'orderby' => 'title',
    'order' => 'DESC',
    'posts_per_page' => 999,
    'post_status' => 'publish'
]);

$jury = [];
$activeYear = 0;
if ($juryItems->have_posts()) {
    while ($juryItems->have_posts()) {
        $juryItems->the_post();
        ob_start();
        get_template_part('templates/jury/item');
        $members = ob_get_clean();
        $year = get_the_title();
        if (!isset($jury[$year])) {
            $jury[$year] = [];
        }
        $jury[$year][] = $members;
        if (!$activeYear) {
            $activeYear = $year;
        }
    } wp_reset_postdata();
}

?>
<div class="jury-top">
    <div class="page-title">
        <h1><?php the_title(); ?></h1>
    </div>
    <?php if ($jury): ?>
        <div class="jury-nav">
            <div class="wall"></div>
            <div class="jury-items">
                <?php foreach ($jury as $year => $members): ?>
                    <div class="jury-item">
                        <input type="radio" name="jury_year" <?php echo $year == $activeYear ? 'checked' : ''; ?> value="<?php echo $year; ?>" id="jury_year-<?php echo $year; ?>"/>
                        <label for="jury_year-<?php echo $year; ?>"><?php echo $year; ?></label>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="wall"></div>
        </div>
    <?php endif; ?>
</div>
<?php if ($jury): ?>
    <?php foreach ($jury as $year => $menbers): ?>
        <div class="jury-members" data-active="<?php echo $year == $activeYear ? 'true' : 'false'; ?>" data-year="<?php echo $year; ?>">
            <?php foreach ($menbers as $menber): ?>
                <?php echo $menber; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
