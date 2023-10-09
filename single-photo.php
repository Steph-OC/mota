
<?php get_template_part('template-parts/site-header'); ?>
<main class="main-single-photo">
<section class="content-single-photo">

    <?php if (have_posts()) : ?>
        <article class="content-desc-photo">
            <div class="desc-photo">
                <h2 class="photo-title"><?php the_title(); ?></h2>
                <ul class="list-desc-photo">
                    <li>REFERENCE : <?php the_field('reference'); ?> <br></li>
                    <li><?php the_terms($post->ID, 'categorie', 'Catégorie : '); ?> <br></li>
                    <li><?php the_terms($post->ID, 'format', 'Format : '); ?> <br></li>
                    <li>TYPE : <?php the_field('type'); ?> <br></li>
                    <li>ANNEE : <?php the_field('date_prise_de_vue'); ?> <br></li>
                </ul>
            </div>
            <div class="single-photo">
            <?php the_content(); ?>
    </div>
        </article>
        <article class="content-interest-photo">
            <p>Cette photo vous interesse ?</p>
            <button class="btn-interest" type="button">Contact </button>

        </article>
        

    <?php endif; ?>
   

</section>
<?php get_footer(); ?>
</main>