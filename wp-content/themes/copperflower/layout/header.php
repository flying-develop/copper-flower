<?php 
	$path = get_template_directory_uri(); 
?>
<header id="header" role="banner" class="layout-part layout-part-header">
	<div class="wrapper header-wrapper">
		<?php if (is_front_page()): ?>
			<div class="logo" id="logo">
		<?php else: ?>
			<a href="/" title="На главную" class="logo" id="logo">
		<?php endif; ?>
		<picture>
			<source media="(min-width: 1024px)" width="64" height="73" srcset="<?php echo $path; ?>/images/logo-big.svg"/>
			<source media="(max-width: 1023px)" width="101" height="32" srcset="<?php echo $path; ?>/images/logo.svg"/>
			<img src="<?php echo $path; ?>/images/logo.png" width="101" height="32" alt="logo">
		</picture>
		<?php if (is_front_page()): ?>
			</div>
		<?php else: ?>
			</a>
		<?php endif;?>
		<div class="menu-btn">
			<span class="line line-one"></span>
			<span class="line line-two"></span>
			<span class="line line-three"></span>
		</div>
	</div>
</header>