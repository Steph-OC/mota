<?php
add_action('wp_ajax_btn_load_more', 'btn_load_more');
add_action('wp_ajax_nopriv_btn_load_more', 'btn_load_more');

function btn_load_more()
{
    $paged = $_POST['paged'];
    $taxonomy = $_POST['taxonomy'];

    if (isset($_POST['taxonomy'])) {
        //première requête éliminer les 3 images déjà présentes
        $first_images = new WP_Query([
            'post_type' => 'photo',
            'posts__per_page' => 3,
            'orderby' => 'date',
            'order' => 'DESC',
            'fields' => 'ids',
        ]);

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
            'post__not_in' => $first_images->get_posts(),
            'paged' => $paged,
        ]);
    } else {
        $ajaxposts = new WP_Query([
            'post_type' => 'photo',
            'posts_per_page' => 12,
            'orderby' => 'rand',
            'paged' => $paged,
        ]);
    }

    $response = '';

    if ($ajaxposts->have_posts()) {
        while ($ajaxposts->have_posts()) : $ajaxposts->the_post();
            ob_start();
?>

            <div class="image-similar">
                <div class="image-overlay">
                    <?php echo get_the_post_thumbnail(get_the_ID(), array(564, 495)); ?>
                    <?php get_template_part('template-parts/site-overlay-content');
                    ?>
                </div>
            </div>

<?php
            $response .= ob_get_clean();
        endwhile;
    } else {
        $response = 'Aucune autre photo disponible';
    }

    echo $response;
    wp_die();
}
