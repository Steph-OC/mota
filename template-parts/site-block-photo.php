<?php 
// Récupération de la catégorie du post
$postCats = get_the_terms(get_the_ID(), 'categorie');
$postCatName = $postCats ? esc_html($postCats[0]->name) : ''; // Utilisez le premier terme trouvé
?>

<div class="image-similar">
    <div class="image-overlay">
        <?php the_post_thumbnail([564, 495], ['alt' => esc_attr(get_the_title())]); ?>
      <?php get_template_part('template-parts/site-overlay-content'); ?>
    </div>
</div>

