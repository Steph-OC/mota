<?php
// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

function mota_register_assets()
{
    wp_enqueue_style('mota', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('fonts-style',  get_stylesheet_directory_uri() . '/assets/css/fonts-style.css');
}
add_action('wp_enqueue_scripts', 'mota_register_assets');


//insertion de l'onglet menu dans l'admin
register_nav_menus(array(
    'nav_menu' => 'Menu principal',
    'footer_menu' => 'Bas de page'
));
