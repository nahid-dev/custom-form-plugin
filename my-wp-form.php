<?php

/*
Plugin Name: My WP Form
Author : Nahid
Author URI : https://nahid.com
Version: 1.0.0
Description: New Wordpress custom form
Text Domain: My WP From
*/

if (!defined('ABSPATH')) : exit();
endif;


// Define plugin contents
define('MNWP_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('MNWP_URL', trailingslashit(plugins_url("/", __FILE__)));

// Loading necessary scripts
add_action('admin_enqueue_scripts', 'load_scripts',);
function load_scripts()
{
    wp_enqueue_script('my-wp-form', MNWP_URL . 'dist/bundle.js', ['jquery', 'wp-element'], wp_rand(), true);
    wp_localize_script('my-wp-form', 'appLocalizer', [
        'apiUrl' => home_url('/wp-json'),
        'nonce' => wp_create_nonce('wp_rest')
    ]);
}

require_once MNWP_PATH . 'classes/class-create-admin-menu.php';
require_once MNWP_PATH . 'classes/class-create-setting-route.php';
