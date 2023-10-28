<?php

$args = array(
    'post_type' => 'photo',
    'posts_per_page' => 1,
    'orderby' => 'rand',
);

$my_query = new WP_Query($args);
if ($my_query->have_posts()) :
    while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <div class="site_hero_header">
            <?php the_post_thumbnail('large', array('class' => 'site_hero_image')); ?>
            <h1>PHOTOGRAPHE EVENT</h1>
        </div>
<?php
    endwhile;
endif;
wp_reset_postdata();

?>