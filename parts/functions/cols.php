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

function photos_sc( $atts, $content = null ) {
   	return '<div class="photos">' . do_shortcode($content) . '</div>';
}
add_shortcode('photos', 'photos_sc');

function fw_sc( $atts, $content = null ) {
   	return '</div><div class="fw_images">' . do_shortcode($content) . '</div><div class="photos">';
}
add_shortcode('fw', 'fw_sc');

?>