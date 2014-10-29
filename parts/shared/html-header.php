<!DOCTYPE HTML>
<!--[if IEMobile 7 ]><html class="no-js iem7" manifest="default.appcache?v=1"><![endif]--> 
<!--[if lt IE 7 ]><html class="no-js ie6" lang="en"><![endif]--> 
<!--[if IE 7 ]><html class="no-js ie7" lang="en"><![endif]--> 
<!--[if IE 8 ]><html class="no-js ie8" lang="en"><![endif]--> 
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<head>
		<title><?php bloginfo( 'name' ); ?><?php wp_title( '|' ); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
	  	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"><!-- Remove if you're not building a responsive site. (But then why would you do such a thing?) -->
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/img/favicon.ico"/>
		<script src="//use.typekit.net/fzt1sdn.js"></script>
		<script>try{Typekit.load();}catch(e){}</script>
		<?php wp_head(); ?>
		<?php 
		$query = new WP_Query( array('posts_type'=> 'post') );
		if ( $query->have_posts() ) : ?>

			<style type="text/css">

			<?php while ( $query->have_posts() ) : $query->the_post();

			$primary = get_post_meta($post->ID, '_cmb_primary_color', true);
			$secondary = get_post_meta($post->ID, '_cmb_secondary_color', true);
			$selector = $post->post_name;
			
			if(is_home()){

				echo '	
				.'.$selector.' a.button{
					border: 2px solid #ffffff;
				 	background: '.$primary.';
				 	-webkit-transition: 	all .25s ease-in-out;
					-moz-transition: 		all .25s ease-in-out;
					-ms-transition: 		all .25s ease-in-out;
					-o-transition: 			all .25s ease-in-out;
					transition: 			all .25s ease-in-out;
				}';

				echo '	
				.'.$selector.' a.button:hover{
				 	border: 2px solid '.$primary.';
				 	background: #ffffff;
				 	color: '.$secondary.';
				}';

			} elseif(is_single()){
							
				echo '
				.'.$selector.' h3, 
				.'.$selector.' h4, 
				.'.$selector.' .contain a,
				.'.$selector.' .folio{
					color:'.$primary.'
				}';
							
				echo '
				@media screen and (min-width: 40em){
					.'.$selector.' .project-bg{
						display:block;
						content:"";
						width:100%;
						height:600px;
						position:absolute;
						top:-300px;
						left:0;
						z-index:-1000;
						-webkit-transform:  skew(0deg, -8deg);
						-moz-transform: 	skew(0deg, -8deg);
						-ms-transform: 		skew(0deg, -8deg);
						-o-transform: 		skew(0deg, -8deg);
						transform: 			skew(0deg, -8deg);
						background: '.$primary.';
						background: -moz-linear-gradient(top,  '.$primary.' 0%, '.$secondary.' 100%);
						background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,'.$primary.'), color-stop(100%,'.$secondary.'));
						background: -webkit-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
						background: -o-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
						background: -ms-linear-gradient(top,  '.$primary.' 0%,'.$secondary.' 100%);
						background: linear-gradient(to bottom,  '.$primary.' 0%,'.$secondary.' 100%);
						filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="'.$primary.'", endColorstr="'.$secondary.'",GradientType=0 );";
					} 
				}';
			} ?>
			<?php endwhile; ?>
			
			</style>
			
			<?php wp_reset_postdata(); ?>
			
		<?php endif; ?>

	</head>
	<body <?php body_class(); ?>>
