<header>
	<div class="container">
		<h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<?php if(is_single()) {?>
			<nav>
			<?php
				$next = next_post_link(); 
				$prev = previous_post_link();
			if($prev){ ?>
				<?php echo $prev; ?>
			<?php } ?>
				<a href="#" class="menu-click"><span></span></a>
			<?php if($next) { ?>
				<?php echo $next; ?>
			<?php } ?>
			</nav>
		<?php } ?>
	</div>
</header>
