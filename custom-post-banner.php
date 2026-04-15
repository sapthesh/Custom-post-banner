<?php
/**
 * Plugin Name: Custom Post Banner
 * Description: Dynamically prepends a customizable banner to the content of all single posts.
 * Version: 1.0.0
 * License: GPL v2 or later
 * Author: Sapthesh V
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Define plugin constants
define( 'CPB_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'CPB_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Include core classes
require_once CPB_PLUGIN_DIR . 'includes/class-cpb-admin.php';
require_once CPB_PLUGIN_DIR . 'includes/class-cpb-frontend.php';

/**
 * Initialize the plugin classes.
 */
function cpb_init_plugin() {
    new CPB_Admin();
    new CPB_Frontend();
}
add_action( 'plugins_loaded', 'cpb_init_plugin' );
