<?php
/**
 * Plugin Name: Basement Slider
 * Plugin URI: http://aisconverse.com
 * Description: A Basement Framework slider with great potential
 * Version: 1.0
 * Author: Aisconverse team
 * Author URI: http://aisconverse.com
 * License: GPL2
 */

defined('ABSPATH') or die();

add_action( 'basement_loaded', 'basement_slider_init', 999 );

function basement_slider_init() {
	require 'modules/slide/slide.php';
}