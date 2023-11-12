<?php
add_action('wp_ajax_nopriv_load_lightbox_content', 'load_lightbox_content');
add_action('wp_ajax_load_lightbox_content', 'load_lightbox_content');

function load_lightbox_content() {
    $post_id = isset($_POST['postID']) ? intval($_POST['postID']) : null;

    if (!$post_id) {
        wp_send_json_error('Identifiant du post est manquant.');
        return;
    }

    echo json_encode(get_post_data($post_id));
    wp_die();
}

function get_post_data($post_id) {
    $ref = get_field('reference', $post_id);
    $taxo = wp_get_post_terms($post_id, 'categorie');
    $taxo_name = !empty($taxo) ? $taxo[0]->name : '';
    $img_url = get_the_post_thumbnail_url($post_id, 'full');

    return [
        'img' => $img_url,
        'ref' => $ref,
        'taxo' => $taxo_name,
        'postID' => $post_id
    ];
}
