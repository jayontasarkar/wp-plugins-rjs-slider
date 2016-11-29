<?php 
/**
 * @package rjsslider
 * Add Media Button in Post/Page
 */

function rjs_add_my_media_button()
{
	$scope = get_option( 'rjs_slider_settings' )['slider_scope'] ?: 3;
	if($scope == 3) {
		echo rjs_get_media_button();
	}
	if($scope == 1 & get_current_screen()->post_type == 'post'){
		echo rjs_get_media_button();
	}
	if($scope == 2 & get_current_screen()->post_type == 'page'){
		echo rjs_get_media_button();
	}	
}
add_action('media_buttons', 'rjs_add_my_media_button');

function rjs_get_media_button() {
	return '
		<a href="#" id="insert-my-media" class="button">
		<span><img src="'. ASSET_URL . 'img/logo.png"/></span>
		<strong>RJS Slider</strong>
		</a>
	';
}