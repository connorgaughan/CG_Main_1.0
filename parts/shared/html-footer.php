
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
				echo '.'.$selector.' .project-intro:before{
					display:block;
					content:"";
					width:100%;
					height:600px;
					position:absolute;
					top:0;
					left:0;
					z-index:-1000;
					background: '.$primary.';
					background: -moz-linear-gradient(top,  '.$primary.' 0%, '.$secondary.' 100%);
					background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$primary.'), color-stop(100%,'.$secondary.'));
					background: -webkit-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: -o-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: -ms-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
					background: linear-gradient(to bottom,  '.$primary.' 0%,'.$secondary.' 100%);
					filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$primary.'", endColorstr="'.$secondary.'",GradientType=0 );";
				}';
			}

			endforeach; 
			echo '</style>';
		?>
	</body>
</html>