<?php

function mota_register_assets()
{
    wp_enqueue_style('mota', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('fonts-style',  get_stylesheet_directory_uri() . '/assets/css/fonts-style.css');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
    if (is_single()) {
        wp_enqueue_script('nav-image', get_stylesheet_directory_uri() . '/assets/js/single.js', array('jquery'), '1.0.0', true);
    };
    wp_enqueue_script('ajax-pagination', get_template_directory_uri() . '/assets/js/btn_all_images.js', ['jquery'], '1.0', true);
    wp_localize_script('ajax-pagination', 'ajaxpagination', array('ajaxurl'=> admin_url('admin-ajax.php') ));

   
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
/**
 * image order by date
 */
require_once 'includes/nav-single-image.php';
/**
 * request ajax traitment
 */
require_once 'includes/ajax-load-more.php';
