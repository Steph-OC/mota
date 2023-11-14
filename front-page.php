<?php get_header(); ?>

<main class="main-photo">
    <?php
    $args = array(
        'post_type' => 'photo',
        'posts_per_page' => 12,
        'orderby' => 'rand',
        'paged' => 1, //pagination pour le btn load-more
    );
    ?>
    <article class="container-filter">

        <?php get_template_part('template-parts/site-photo-filters'); ?>

        <section class="container-similar-images">
            <div class="img-similar-images">

                <?php
                $my_query = new WP_Query($args);
                if ($my_query->have_posts()) :

                    while ($my_query->have_posts()) : $my_query->the_post(); ?>
                        <?php get_template_part('template-parts/site-block-photo', null, array('post_id' => get_the_ID())); ?>
                <?php
                    endwhile;
                    wp_reset_postdata();

                else : echo "Aucune autre photo ne correspond à votre demande...";
                endif;
                ?>

            </div>
            <div class="container-button">
                <button id="load-more-button" class="btn-all-images" type="button">Charger plus</button>
            </div>

        </section>
    </article>
</main>
<?php get_footer(); ?>