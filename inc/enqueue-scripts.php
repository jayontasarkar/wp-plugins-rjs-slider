<?php 

/**
 * @package rjsslider
 * Enqueue Stylesheets & Scripts
 */

// Public enqueue script
function rjs_public_scripts_file() {
    wp_enqueue_style('rjs-fa', ASSET_URL . 'css/font-awesome.min.css');
    wp_enqueue_style('rjs-public', ASSET_URL . 'css/main.css');

	wp_enqueue_script(
		'rjs-cycle2', 
		ASSET_URL . 'js/cycle2.min.js', 
		array('jquery')
	);
}
add_action('wp_enqueue_scripts', 'rjs_public_scripts_file');

// Enqueue admin scripts
function rjs_admin_scripts_file() {
    wp_enqueue_script(
    	'rjs-media-button', 
    	ASSET_URL . 'js/media_button.js', 
    	array('jquery'), '1.0', true
    );
}
add_action('admin_enqueue_scripts', 'rjs_admin_scripts_file');