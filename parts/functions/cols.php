<?php

function one_third_column($atts, $content = null){
	return '<div class="third">' . do_shortcode($content) . '</div>';
}
add_shortcode('col', 'one_third_column');

function half_sc( $atts, $content = null ) {
   	return '<div class="half">' . do_shortcode($content) . '</div>';
}
add_shortcode('half', 'half_sc');

function halfLast_sc( $atts, $content = null ) {
   	return '<div class="half">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('halfLast', 'halfLast_sc');

?>