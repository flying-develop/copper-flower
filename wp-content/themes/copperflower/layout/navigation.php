<?php
    $partners = get_field('sponsors', 'option');
?>
<nav id="navigation" role="navigation" class="layout-part layout-part-nav" data-partners="<?php echo $partners ? count($partners) : 0; ?>">
	<div class="wrapper navigation-wrapper">
		<?php
			wp_nav_menu(
				[
					'menu'		     => 3,
					'container'      =>  false,
					'menu_class'      => 'main-menu', 
					'link_before'	=> '<span>',
					'link_after'	=> '</span>',
				]
			);
		?>
		<div class="become-btn">
			<a class="btn" href="<?php echo get_permalink(103); ?>">
				<span>Стать участником</span>
			</a>
		</div>
        <?php if ($partners): ?>
            <div class="partners">
                <?php foreach ($partners as $partner): ?>
                    <?php if ($partner['link']): ?>
                        <a href="<?php echo $partner['link']; ?>" target="_blank" class="partner">
                            <img src="<?php echo $partner['logo']['sizes']['medium']; ?>" width="<?php echo $partner['logo']['sizes']['medium-width']; ?>" height="<?php echo $partner['logo']['sizes']['medium-height']; ?>" alt="<?php echo $partner['logo']['alt']; ?>"/>
                        </a>
                    <?php else: ?>
                        <div class="partner partner-dost">
                            <img src="<?php echo $partner['logo']['sizes']['medium']; ?>" width="<?php echo $partner['logo']['sizes']['medium-width']; ?>" height="<?php echo $partner['logo']['sizes']['medium-height']; ?>" alt="<?php echo $partner['logo']['alt']; ?>"/>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
	</div>
</nav>