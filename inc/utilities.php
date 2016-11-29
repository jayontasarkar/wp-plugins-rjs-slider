<?php 
/**
 * @package rjsslider
 * Utilities & Helper Functions
 */

$height = get_option( 'rjs_slider_settings' )['img_height'] ?: 400;
$width  = get_option( 'rjs_slider_settings' )['img_width'] ?: 600;


function rjs_add_slider_image_size() {
    add_image_size( 'rjs-slider-img', $width, $height, true );
}

add_action( 'init', 'rjs_add_slider_image_size' );