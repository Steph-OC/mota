<?php

function mota_register_assets()
{
    wp_enqueue_style('mota', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('fonts-style',  get_stylesheet_directory_uri() . '/assets/css/fonts-style.css');
    wp_enqueue_script('script', get_stylesheet_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);
    wp_enqueue_script('font-awesome-kit', 'https://kit.fontawesome.com/277d797764.js', array(), null);
    wp_enqueue_script('burger-script', get_stylesheet_directory_uri() . '/assets/js/burger-menu.js', array('jquery'), '1.0.0', true);
    if (is_single()) {
        wp_enqueue_script('nav-image', get_stylesheet_directory_uri() . '/assets/js/single.js', array('jquery'), '1.0.0', true);
    };
    wp_enqueue_script('lightbox-ajax-script', get_template_directory_uri() . '/assets/js/lightbox-ajax.js', array('jquery'), null, true);
    wp_localize_script('lightbox-ajax-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
    if (is_front_page() || is_single()) {
        wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax-script.js', array('jquery'), '1.0', true);
        wp_localize_script('ajax-script', 'ajaxscript', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
    if (is_front_page()) {
        wp_enqueue_script('ajax-filters', get_template_directory_uri() . '/assets/js/ajax-filters.js', array('jquery'), '1.0', true);
        wp_enqueue_script('custom-dropdown', get_template_directory_uri() . '/assets/js/custom-dropdown.js', array('jquery'), '', true);
    }
   

}

/**
 * text in menu footer
 */
require_once 'includes/text_in_menu_footer.php';
/**
 * Menus/Theme options definitions
 */
require_once 'includes/theme-setup.php';
/**
 * Remove auto p from Contact Form 7 shortcode output
 */
require_once 'includes/form-delete-p.php';
/**
 * function load more images
 */
require_once 'includes/btn_load_more.php';
/**
 * Filters photos
 */
require_once 'includes/filters_photos.php';
/**
 * lightbox
 */
require_once 'includes/load_lightbox_content.php';