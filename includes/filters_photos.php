<?php
add_action('wp_ajax_filters_photos', 'filters_photos');
add_action('wp_ajax_nopriv_filters_photos', 'filters_photos');

function filters_photos()
{
    // Vérifiez le nonce. Si ça ne passe pas, arrêtez tout.
    if (!isset($_POST['photos_filter_nonce']) || !wp_verify_nonce($_POST['photos_filter_nonce'], 'photos_filter_action')) {
        echo 'La valeur du nonce est invalide.';
        die();
    }

    // Si les données soumises via Ajax
    if (isset($_POST['action']) && $_POST['action'] === 'filters_photos') {
        // Récupérer les valeurs des filtres
        $categorie = $_POST['categorie'];
        $format = $_POST['format'];
        $date = intval($_POST['date']);  // Convertit la date en entier

        $args = array(
            'post_type' => 'photo',
            'posts_per_page' => 12,
            'orderby' => 'date',
        );

        // Construire dynamiquement tax_query en fonction des valeurs reçues
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

        // Si nous avons plus d'une taxonomie à interroger, nous devons définir la relation
        if (count($tax_query) > 1) {
            $tax_query['relation'] = 'AND';
        }

        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }

        // Ajoutez meta_query si nous avons une date valide
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
                // génrer la balise img manuellement
                //on récupère l'id de la miniature, puis on récupere l'url pour générer la balise img
                $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                $thumbnail_url = wp_get_attachment_image_src($thumbnail_id, array(564, 495), true);

                echo '<div class="image-similar">';
                echo ' <div class="image-overlay">';
                if ($thumbnail_url) {
                    echo '<img src="' . esc_url($thumbnail_url[0]) . '" alt="' . esc_attr(get_the_title()) . '" width="564" height="495" style="object-fit: cover;">';
                }
                echo '</div>';
                echo '</div>';
            }
            wp_reset_postdata();
        } else {
            $response = 'Aucun résultat trouvé.';
        }
        echo $response;
        die();
    }
}
