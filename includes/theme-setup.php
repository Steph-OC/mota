<?php
// Ajouter la prise en charge des images mises en avant
add_theme_support('post-thumbnails');
// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support('title-tag');

//insertion de l'onglet menu dans l'admin
function register_my_menu() {
register_nav_menus(array(
    'nav_menu' => 'Menu principal',
    'footer_menu' => 'Bas de page'
));
}
add_action('after_setup_theme', 'register_my_menu');