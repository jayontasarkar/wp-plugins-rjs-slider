<?php
/**
 * @package rjsslider
 * Add Shortcodes for Slider Image
 */

function rjs_wp_gallery_shortcode_init($attrs)
{
	$options = get_option( 'rjs_slider_settings' );
	if(is_single()) {
		extract($attrs);
		$output  = "";
		$i       = 0;
		$output .= "
		<div class='cycle-slideshow' 
			 data-cycle-caption='#alt-caption' 
			 data-cycle-caption-template='{{alt}}'
	         data-cycle-fx='{$options['transition_type']}'	 
	         data-cycle-speed='{$options['cycle_speed']}'	 
	    	 data-cycle-timeout='{$options['cycle_timeout']}' 
		>";
		$output .= "
			<div class='cycle-prev'><i class='fa fa-chevron-left fa-2x'></i></div>
			<div class='cycle-next'><i class='fa fa-chevron-right fa-2x'></i></div>
		";
		foreach (explode(",", $image) as $key => $value):
			$img_url = wp_get_attachment_image_src( $value, 'rjs-slider-img');
			$caption = wp_get_attachment_caption( $value );
			
			$output .= "<img src='{$img_url[0]}' alt='{$caption}' />";
		endforeach;

		$output .= '</div>';
		if($options['slider_caption'] == 1):
			$output .= '
				<div id="alt-caption" class="center slider-caption"></div>
			';
		endif;

		return $output;
	}
}
add_shortcode( 'rjs-slider', 'rjs_wp_gallery_shortcode_init' );