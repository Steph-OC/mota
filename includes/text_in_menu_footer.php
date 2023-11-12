<?php
add_action('wp_enqueue_scripts', 'mota_register_assets');

function text_in_menu_footer( $items, $args ) {
    if ( $args->theme_location == 'footer_menu' ) {
        $nouvel_item = '<li class="menu-item">TOUS DROITS RESERVES</li>';
        $items = $nouvel_item . $items;
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'text_in_menu_footer', 10, 2 );