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

    $output.= '<figure class="fw_image responsive-image">';
    $output.= '<picture>';
   
    $output.= '  <!--[if IE 9]><video style="display: none;"><![endif]-->';
    
    $output.= '  <source srcset="' . $native[0] . '" media="(min-width: 85em)">';
    $output.= '  <source srcset="' . $full[0] . '" media="(min-width: 70em)">';
    $output.= '  <source srcset="' . $large[0] . '" media="(min-width: 60em)">';
    
    $output.= '  <!--[if IE 9]></video><![endif]-->';
    
    $output.= '  <img srcset="' . $medium[0] . '">';
    $output.= '  <noscript>';
    $output.= '    <img src="' . $medium[0] . '" alt="' . $caption . '">';
    $output.= '  </noscript>';
    $output.= '</picture>';
    $output.= '</figure>';
  }

  return $output;

}
add_shortcode('fw_rimg', 'fw_responsive_image');



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


    $output.= '<figure class="mw_image responsive-image">';
    $output.= '<picture>';
   
    $output.= '  <!--[if IE 9]><video style="display: none;"><![endif]-->';
    
    $output.= '  <source srcset="' . $full[0] . '" media="(min-width: 70em)">';
    $output.= '  <source srcset="' . $large[0] . '" media="(min-width: 60em)">';
    $output.= '  <source srcset="' . $medium[0] . '" media="(min-width: 48em)">';
    $output.= '  <source srcset="' . $small[0] . '" media="(min-width: 36em)">';
    
    $output.= '  <!--[if IE 9]></video><![endif]-->';
    
    $output.= '  <img srcset="' . $thumb[0] . '">';
    $output.= '  <noscript>';
    $output.= '    <img src="' . $medium[0] . '" alt="' . $caption . '">';
    $output.= '  </noscript>';
    $output.= '</picture>';
    $output.= '</figure>';
  }

  return $output;

}
add_shortcode('rimg', 'mw_responsive_image');



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

    $output.= '<figure class="responsive-image">';
    $output.= '<picture>';
   
    $output.= '  <!--[if IE 9]><video style="display: none;"><![endif]-->';
    
    $output.= '  <source srcset="' . $large[0] . '" media="(min-width: 60em)">';
    $output.= '  <source srcset="' . $medium[0] . '" media="(min-width: 48em)">';

    $output.= '  <!--[if IE 9]></video><![endif]-->';
    
    $output.= '  <img srcset="' . $small[0] . '">';
    $output.= '  <noscript>';
    $output.= '    <img src="' . $small[0] . '" alt="' . $caption . '">';
    $output.= '  </noscript>';
    $output.= '</picture>';
    $output.= '</figure>';
  }

  return $output;

}
add_shortcode('featured', 'responsive_image');


// Filter Wordpress Images Output to Accomodate for our Picturefill Polyfill Shortcode
function rimg_insert_image($html, $id, $caption, $title, $align, $url){
  return '[rimg src="'.$url.'"]';
} 
add_filter('image_send_to_editor', 'rimg_insert_image', 10, 9);