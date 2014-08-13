<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>
<div class="main">
	<section class="intro">
		<div class="container">
			<div class="intro-content">
				<h1><?php bloginfo( 'name' ); ?></h1>
				<div class="columns">
					<?php 
						$post_home_page = get_post(4);
						$home_content = apply_filters('the_content', $post_home_page->post_content);
						echo $home_content;
					?>
				</div>
			</div>
		</div>
	</section>

<?php if ( have_posts() ): ?>
<?php while ( have_posts() ) : the_post(); ?>
	<section class="<?php echo $post->post_name;?> project">
		<div class="container">
			<div class="project-content">
				<h2><?php the_title(); ?></h2>
				<?php the_excerpt(); ?>
				<p><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark">View Project</a></p>
			</div>
			<?php
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo do_shortcode( '[rimg src="' . $url . '"]' );
			?>
		</div>
	</section>
<?php endwhile; wp_reset_postdata(); ?>
<?php endif; ?>

</section>
<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-footer') ); ?>