<?php
//on récupère la categorie du single post
foreach (get_the_terms(get_the_ID(), 'categorie') as $cat) {
    $postCat = $cat->name; //nom de la taxonomie du post courant
}

$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 2,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'categorie', //nom de la taxonomie
            'field' => 'slug', //récupérer par son slug
            'terms' => $postCat,
        )
    ),
    'post__not_in' => array($post->ID),
    'paged' => 1, //pagination pour le btn load-more
);
?>

<section class="container-similar-images">
    <h3 class="title-similar-images">VOUS AIMEREZ AUSSI</h3>
    <div class="img-similar-images">
        <?php
        $my_query = new WP_Query($args);
        if ($my_query->have_posts()) :
            while ($my_query->have_posts()) : $my_query->the_post();
                get_template_part('template-parts/site-block-photo');


            endwhile;
        else : echo "Aucune autre photo dans cette catégorie...";
        endif;

        wp_reset_postdata();
        ?>
        
    </div>
    <div class="container-button">
    <button id="load-more-button" class="btn-all-images" data-taxonomy="<?php echo $postCat; ?>" type="button">Toutes les photos</button>
    </div>
</section>