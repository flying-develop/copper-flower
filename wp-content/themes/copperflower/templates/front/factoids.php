<?php
    $facts = get_field('facts');
    $img = get_field('img');
    $img_mobile = get_field('img_mobile');
?>
<?php if ($facts || $img): ?>
    <div class="front-facts">
        <div class="wrapper facts-wrapper">
            <?php if ($facts): ?>
                <div class="facts" data-length="<?php echo count($facts); ?>">
                    <?php foreach ($facts as $index => $fact): ?>
                        <div class="facts--item" data-index="<?php echo $index; ?>">
                            <div class="facts--item__number"><?php echo $fact['number']; ?></div>
                            <div class="facts--item__description"><?php echo $fact['description']; ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if ($img): ?>
                <div class="picture">
                    <?php if ($img_mobile): ?>
                        <?php echo generateImage($img_mobile, '(max-width: 1023.98px) 200vw, 140vw', true, 'mobile-img'); ?>
                    <?php endif; ?>
                    <?php echo generateImage($img, '(max-width: 1023.98px) 200vw, 140vw', true); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>