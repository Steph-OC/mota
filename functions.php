<?php

function mota_register_assets()
{
    wp_enqueue_style('mota', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('fonts-style',  get_stylesheet_directory_uri() . '/assets/css/fonts-style.css');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array(), 1.1, true);
}
add_action('wp_enqueue_scripts', 'mota_register_assets');



/**
 * Menus/Theme options definitions
 */
require_once 'includes/theme-setup.php';
/**
 * Remove auto p from Contact Form 7 shortcode output
 */
require_once 'includes/form-delete-p.php';
