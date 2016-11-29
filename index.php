<?php
/**
 * Plugin Name: RJS Post/Page Slider
 * Description: Adds custom media button into Posts/Page that adds images for scroller and inserts gallery shortcode into wordpress page or post. The plugin also allows configuration/settings for the Slider.
 * Plugin URI: http://rejoysoft.net/wordpress/plugins
 * Author: Jayonta Sarkar
 * Author URI:  http://rejoysoft.net
 * Version: 1.0
 * License: GPLv2.0 
 * @package rjsslider
 */

if(!defined('ABSPATH'))
{
	die("Sorry!, Absolute path is not defined to open this plugin.");
}

/**
* Constants
*/
defined('ASSET_URL')
	|| define('ASSET_URL', plugins_url().'/wp-rjsslider/assets/');

/**
 * Includes
 */
require 'inc/utilities.php';
require 'inc/enqueue-scripts.php';
require 'inc/media-button.php';
require 'inc/shortcodes.php';
require 'inc/admin_menu.php';