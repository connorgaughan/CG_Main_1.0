	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/_assets/css/style.css" type="text/css"/>
	<?php if(is_front_page()){
		echo '<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/_assets/css/onepage.css" type="text/css"/>';
	} ?>
	<?php wp_footer(); ?>
		<?php 
			echo '<style type="text/css">';	
			$posts = get_posts(); foreach( $posts as $post ) : 
			$primary = get_post_meta($post->ID, '_cmb_primary_color', true);
			$secondary = get_post_meta($post->ID, '_cmb_secondary_color', true);
			$selector = $post->post_name;
			
			if(is_home()){

				echo '.'.$selector.'{
	 				background: '.$primary.';
					background: -moz-linear-gradient(top,  '.$primary.' 0%, '.$secondary.' 100%);
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$primary.'), color-stop(100%,'.$secondary.'));
					background: -webkit-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: -o-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: -ms-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: linear-gradient(to bottom,  '.$primary.' 0%,'.$secondary.' 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$primary.'", endColorstr="'.$secondary.'",GradientType=0 );
				}';

			}elseif(is_single()){
				echo '.'.$selector.' h3, .'.$selector.' h4, .'.$selector.' .contain a{color:'.$primary.'}';
				echo '.'.$selector.' .fw_image{background:'.$secondary.'}';
				echo '@media screen and (min-width: 40em){.'.$selector.' .project-bg{
					display:block;
					content:"";
					width:100%;
					height:600px;
					position:fixed;
					top:-300px;
					left:0;
					z-index:-1000;
					-webkit-transform: skew(0deg, -8deg);
					-moz-transform: skew(0deg, -8deg);
					-ms-transform: skew(0deg, -8deg);
					-o-transform: skew(0deg, -8deg);
					transform: skew(0deg, -8deg);
					background: '.$primary.';
					background: -moz-linear-gradient(top,  '.$primary.' 0%, '.$secondary.' 100%);
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$primary.'), color-stop(100%,'.$secondary.'));
					background: -webkit-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: -o-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: -ms-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: linear-gradient(to bottom,  '.$primary.' 0%,'.$secondary.' 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$primary.'", endColorstr="'.$secondary.'",GradientType=0 );";
				} }';
			}
			endforeach; 
			echo '</style>';
		?>
	</body>
</html>