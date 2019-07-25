<?php
/*
Plugin Name: SWR VC Toolkit

*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Translate direction
load_plugin_textdomain('xzopro-toolkit', false, dirname(plugin_basename(__FILE__)) . '/languages/');

// Defines
define('SWR_ACC_URL', WP_PLUGIN_URL . '/' . plugin_basename(dirname(__FILE__)) . '/');
define('SWR_ACC_PATH', plugin_dir_path(__FILE__));



//Visual Composer addons
require_once('inc/custom-addons/custom-addons.php');

require_once('inc/shortcodes/custom-shortcodes.php');
