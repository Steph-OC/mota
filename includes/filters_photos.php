<?php
add_action('wp_ajax_filters_photos', 'filters_photos');
add_action('wp_ajax_nopriv_filters_photos', 'filters_photos');

function filters_photos()
{
    // Vérifie le nonce. Si ça ne passe pas, arrête tout.
    if (!isset($_POST['photos_filter_nonce']) || !wp_verify_nonce($_POST['photos_filter_nonce'], 'photos_filter_action')) {
        echo 'La valeur du nonce est invalide.';
        die();
    }

    // Si les données soumises via Ajax
    if (isset($_POST['action']) && $_POST['action'] === 'filters_photos') {
        // Récupére les valeurs des filtres
        $categorie = $_POST['categorie'];
        $format = $_POST['format'];
        $date = intval($_POST['date']);  // Convertit la date en entier

        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 12,
            'orderby' => 'date',
        );

        // Construit dynamiquement tax_query en fonction des valeurs reçues
        $tax_query = array();
        if (!empty($categorie)) {
            $tax_query[] = array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $categorie,
            );
        }

        if (!empty($format)) {
            $tax_query[] = array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $format,
            );
        }

        if (count($tax_query) > 1) {
            $tax_query['relation'] = 'AND';
        }

        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }

        // Ajoute meta_query si nous avons une date valide
        if (!empty($date) && $date > 0) {
            $args['meta_query'] = array(
                array(
                    'key' => 'date_prise_de_vue',
                    'value' => (string)$date, // convertit la date en string pour s'assurer qu'elle est sous la bonne forme
                    'compare' => 'LIKE',
                ),
            );
        }
        $response = '';

        $my_query = new WP_Query($args);

        if ($my_query->have_posts()) {
            while ($my_query->have_posts()) {
                $my_query->the_post();

                ob_start(); // Début de la mise en mémoire tampon
?>
                <div class="image-similar">
                    <div class="image-overlay">
                        <?php echo get_the_post_thumbnail(get_the_ID(), array(564, 495)); ?>
                        <?php get_template_part('template-parts/site-overlay-content');  ?>
                    </div>
                </div>
<?php
                $response .= ob_get_clean(); // Fin de la mise en mémoire tampon et ajout au contenu de la réponse
            }
            wp_reset_postdata();
        } else {
            $response = 'Aucun résultat trouvé.';
        }

        echo $response;
        die();
    }
}
