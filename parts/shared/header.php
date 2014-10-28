<?php wp_nav_menu(
	array(
		'container' 		=> 'nav',
		'container_class' 	=> 'menuContainer',
		'menu_class' 		=> 'menu',
		'theme_location' 	=> 'primary'
	)
);?>
<header>
	<div class="container">
		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<nav class="post-nav">
				<a href="#" class="menu-click"><span></span></a>
				<?php if(is_single()) {?>
					<?php echo previous_post_link('%link', '<span></span>'); ?>
				<?php } ?>
				<?php if(is_single()) {?>
					<?php echo next_post_link('%link', '<span></span>'); ?>
				<?php } ?>

			</nav>
	</div>
</header>
