<?php

add_action('wp_ajax_btn_load_more', 'btn_load_more');
add_action('wp_ajax_nopriv_btn_load_more', 'btn_load_more');

function btn_load_more()
{
    $paged = $_POST['paged'];
    $taxonomy = $_POST['taxonomy'];
    
    $ajaxposts = new WP_Query([
        'post_type' => 'photo',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => [
            [
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $taxonomy,
            ]
        ],
        
        'paged' => $paged,
    ]);

    $response = '';

    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            $response .= '<div class="image-similar">';
            $response .= get_the_post_thumbnail(get_the_ID(), array(564, 495));
            $response .= '</div>';
        endwhile;
    } else {
        $response = '';
    }
    
    echo $response;
    exit;
}