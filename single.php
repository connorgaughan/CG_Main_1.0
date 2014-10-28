<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article class="<?php echo $post->post_name;?>">
	<div class="contain">
		<div class="project-intro">
			<?php
				$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
				echo do_shortcode( '[featured src="' . $url . '"]' );
			?>
			<div class="project-bg"></div>
		</div>
		<h2><?php the_title(); ?></h2>
		<?php the_content(); ?>		
	</div>
</article>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>