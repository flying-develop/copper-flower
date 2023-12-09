<?php $become = get_field('become'); ?>
<?php if ($become['enable']): ?>
    <div class="about-become" style="background: url(/wp-content/themes/copperflower/images/aef502fde0cd3081617ccd63cc7a42fe.png), lightgray -52125359130.865px -2395033320.002px / 18505882169.553% 6527515266.773% no-repeat;">
        <div class="about-become-text">Хотите стать <b>победителем</b> сезона <?php echo $become['year']; ?>?</div>
        <div class="about-become-card">
            <div class="about-become-title">Заполняйте заявку на&nbsp;участие в&nbsp;фестивале</div>
            <a href="<?php echo get_permalink(103); ?>" class="btn">
                <span>Стать участником</span>
            </a>
            <div class="about-become-period"> <?php echo $become['period']; ?></div>
        </div>
    </div>
<?php endif; ?>
