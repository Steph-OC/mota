<?php get_template_part('template-parts/site-header'); ?>
<main class="main-photo">
    <section class="content-single-photo">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <article class="content-desc-photo">
                    <div class="desc-photo">
                        <h2 class="photo-title"><?php the_title(); ?></h2>
                        <ul class="list-desc-photo">
                            <li>REFERENCE : <span id="ref"><?php the_field('reference'); ?></span> <br></li>
                            <li><?php the_terms($post->ID, 'categorie', 'Catégorie : '); ?> <br></li>
                            <li><?php the_terms($post->ID, 'format', 'Format : '); ?> <br></li>
                            <li>TYPE : <?php the_field('type'); ?> <br></li>
                            <li>
                            <li>ANNEE : <?php
                                        $date = DateTime::createFromFormat('d/m/Y', get_field('date_prise_de_vue'));
                                        echo $date ? $date->format('Y') : ''; // Affiche l'année si la date est valide
                                        ?> <br></li>
                            </li>
                        </ul>
                    </div>
                    <?php get_template_part('template-parts/site-lightbox'); ?>
                    <div class="single-photo">
                        <div class="single-image-overlay">
                            <?php if (has_post_thumbnail()) {
                                $post_thumbnail_id = get_post_thumbnail_id();
                                $image_url = wp_get_attachment_url($post_thumbnail_id);
                                $categories = get_the_terms($post->ID, 'categorie');
                                $category_name = !empty($categories) ? $categories[0]->name : 'Aucune catégorie';
                                $reference = get_field('reference', $post->ID);

                                echo wp_get_attachment_image($post_thumbnail_id, 'full', false, array(
                                    'class' => 'single-image main-photo-img',
                                ));
                            } ?>
                            <div class="single-overlay-content">
                                <div class="icon-expand icons" 
                                data-postid="<?php echo get_the_ID(); ?>" 
                                data-url="<?php echo esc_url($image_url); ?>" 
                                data-category="<?php echo esc_attr($category_name); ?>" 
                                data-reference="<?php echo esc_attr($reference); ?>">
                                    <i class="fa-solid fa-expand fa-lg icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="content-interest-contact">
                    <div class="interest">
                        <p class="text-interest">Cette photo vous interesse ?</p>
                        <button class="btn-interest" type="button">Contact </button>
                    </div>
                    <?php get_template_part('template-parts/site-mini-carrousel'); ?>
                </article>
    </section>

    <?php get_template_part('template-parts/site-similar-images'); ?>

</main>
<?php endwhile;
            wp_reset_postdata();
        endif; ?>

<?php get_footer(); ?>