<main class="main-single"></main>
<section class="single-photo">

    <?php if (have_posts()) : ?>

        <div class="desc-photo">
            <h1 class="photo-title"><?php the_title(); ?></h1>
            <ul class="content-desc-photo">
                <li><?php the_terms($post->ID, 'categorie', 'Catégories : '); ?> <br></li>
                <li><?php the_terms($post->ID, 'format', 'Format : '); ?> <br></li>
            </ul>
        </div>

        <?php get_footer(); ?>

        </article><!-- #post-<?php the_ID(); ?> -->
    <?php endif; ?>
</section>
</main>