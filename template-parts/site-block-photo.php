<?php
// Récupére les données passées
$post_id = get_query_var('post_id', '');
?>
<div class="image-similar">
  <div class="image-overlay">
    <?php the_post_thumbnail([564, 495], ['alt' => esc_attr(get_the_title())]); ?>
    <?php get_template_part('template-parts/site-overlay-content', null, array('post_id' => $post_id)); ?>
  </div>
</div>