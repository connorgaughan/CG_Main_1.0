<?php

function get_attachment_id_from_src($url) {
  global $wpdb;
  $prefix = $wpdb->prefix;
  $attachment = $wpdb->get_col($wpdb->prepare("SELECT ID FROM " . $prefix . "posts" . " WHERE guid='%s';", $url )); 
    return $attachment[0]; 
}

function fw_responsive_image($atts){
  extract( shortcode_atts( array(
    'src' => '',
  ), $atts ) );
  if($src != '')
  {
    $img_ID   = get_attachment_id_from_src($src);
    $native   = wp_get_attachment_image_src( $img_ID, 'native' );
    $full     = wp_get_attachment_image_src( $img_ID, 'full' );
    $large    = wp_get_attachment_image_src( $img_ID, 'large' );
    $medium   = wp_get_attachment_image_src( $img_ID, 'medium' );

    $output.= '</div><div class="fw_image responsive-image">';
    $output.= '  <div class="project-image" data-picture data-alt="' . $caption . '">';
    $output.= '    <div data-src="' . $medium[0] . '"></div>';
    $output.= '    <div data-src="' . $large[0] . '" data-media="(min-width: 60em)"></div>';
    $output.= '    <div data-src="' . $full[0] . '" data-media="(min-width: 70em)"></div>';
    $output.= '    <div data-src="' . $native[0] . '" data-media="(min-width: 85em)"></div>';
    $output.= '    <noscript>';
    $output.= '      <img src="' . $small[0] . '" alt="' . $caption . '">';
    $output.= '    </noscript>';
    $output.= '  </div>';
    $output.= '</div><div class="contain">';
  }

  return $output;

}

add_shortcode('mw_rimg', 'mw_responsive_image');

function mw_responsive_image($atts){
  extract( shortcode_atts( array(
    'src' => '',
  ), $atts ) );
  if($src != '')
  {
    $img_ID   = get_attachment_id_from_src($src);
    $native   = wp_get_attachment_image_src( $img_ID, 'native' );
    $full     = wp_get_attachment_image_src( $img_ID, 'full' );
    $large    = wp_get_attachment_image_src( $img_ID, 'large' );
    $medium   = wp_get_attachment_image_src( $img_ID, 'medium' );
    $small    = wp_get_attachment_image_src( $img_ID, 'small' );
    $thumb    = wp_get_attachment_image_src( $img_ID, 'thumb' );

    $output.= '</div><div class="mw_image responsive-image">';
    $output.= '  <div class="project-image" data-picture data-alt="' . $caption . '">';
    $output.= '    <div data-src="' . $thumb[0] . '"></div>';
    $output.= '    <div data-src="' . $small[0] . '" data-media="(min-width: 36em)"></div>';
    $output.= '    <div data-src="' . $medium[0] . '" data-media="(min-width: 48em)"></div>';
    $output.= '    <div data-src="' . $large[0] . '" data-media="(min-width: 60em)"></div>';
    $output.= '    <div data-src="' . $full[0] . '" data-media="(min-width: 70em)"></div>';
    $output.= '    <noscript>';
    $output.= '      <img src="' . $small[0] . '" alt="' . $caption . '">';
    $output.= '    </noscript>';
    $output.= '  </div>';
    $output.= '</div><div class="contain">';
  }

  return $output;

}

add_shortcode('fw_rimg', 'fw_responsive_image');

function responsive_image($atts){
  extract( shortcode_atts( array(
    'src' => '',
  ), $atts ) );
  if($src != '')
  {
    $img_ID   = get_attachment_id_from_src($src);
    $native   = wp_get_attachment_image_src( $img_ID, 'native' );
    $full     = wp_get_attachment_image_src( $img_ID, 'full' );
    $large    = wp_get_attachment_image_src( $img_ID, 'large' );
    $medium   = wp_get_attachment_image_src( $img_ID, 'medium' );
    $small    = wp_get_attachment_image_src( $img_ID, 'small' );
    $thumb    = wp_get_attachment_image_src( $img_ID, 'thumb' );

    $output.= '<div class="responsive-image">';
    $output.= '  <div class="project-image" data-picture data-alt="' . $caption . '">';
    $output.= '    <div data-src="' . $thumb[0] . '"></div>';
    $output.= '    <div data-src="' . $small[0] . '" data-media="(min-width: 36em)"></div>';
    $output.= '    <div data-src="' . $medium[0] . '" data-media="(min-width: 48em)"></div>';
    $output.= '    <div data-src="' . $large[0] . '" data-media="(min-width: 60em)"></div>';
    $output.= '    <noscript>';
    $output.= '      <img src="' . $small[0] . '" alt="' . $caption . '">';
    $output.= '    </noscript>';
    $output.= '  </div>';
    $output.= '</div>';
  }

  return $output;

}

add_shortcode('rimg', 'responsive_image');


// Filter Wordpress Images Output to Accomodate for our Picturefill Polyfill Shortcode
function rimg_insert_image($html, $id, $caption, $title, $align, $url){
  return '[rimg src="'.$url.'"]';
} 
add_filter('image_send_to_editor', 'rimg_insert_image', 10, 9);