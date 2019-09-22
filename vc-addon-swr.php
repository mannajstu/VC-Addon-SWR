<?php
/*
Plugin Name: SWR VC Toolkit

*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Translate direction
// load_plugin_textdomain('xzopro-toolkit', false, dirname(plugin_basename(__FILE__)) . '/languages/');

// Defines
define('SWR_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('SWR_ACC_PATH', plugin_dir_path(__FILE__));



//Visual Composer addons
require_once('inc/custom-addons/custom-addons.php');

require_once('inc/shortcodes/custom-shortcodes.php');
// add style and javascript
function add_my_css_and_my_js_files()
{
    wp_enqueue_style('owl-carousel', plugins_url('/assets/css/owl.carousel.min.css', __FILE__), false, '1.0.0', 'all');

    wp_enqueue_style('owl-theme-default', plugins_url('/assets/css/owl.theme.default.min.css', __FILE__), false, '1.0.0', 'all');

    wp_enqueue_script('owl-carousel', plugins_url('/assets/js/owl.carousel.min.js', __FILE__), false, '1.0.0', true);
    wp_enqueue_script('vc_extend', plugins_url('/assets/js/vc_extend.js', __FILE__), false, '1.0.0', true);
}
add_action('wp_enqueue_scripts', "add_my_css_and_my_js_files");
