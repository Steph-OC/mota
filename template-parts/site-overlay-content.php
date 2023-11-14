<?php
//recupere les données issues de la boucle
$post_id = get_the_ID();
$image_url = get_the_post_thumbnail_url($post_id, 'full');
$categories = get_the_terms($post_id, 'categorie');
$category_name = !empty($categories) ? $categories[0]->name : 'Aucune catégorie';
$reference = get_field('reference', $post_id);

$lightbox_data[] = array(
    'id' => $post_id,
    'url' => $image_url,
    'category' => $category_name,
    'reference' => $reference
);

?>
<div class="overlay-content">
    <div class="icon-eye icons">
        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="icon-eye">
            <i class="fa-regular fa-eye fa-2xl"></i>
        </a>
    </div>
    <div class="icon-expand icons" 
    data-postid="<?php echo esc_attr($post_id); ?>" 
    data-url="<?php echo esc_url($image_url); ?>" 
    data-category="<?php echo esc_attr($category_name); ?>" 
    data-reference="<?php echo esc_attr($reference); ?>">

        <i class="fa-solid fa-expand fa-lg icon"></i>
    </div>
    <div class="ref-overlay icons"><?php echo esc_html($reference); ?></div>
    <div class="category-overlay icons"><?php echo esc_html($category_name); ?></div>
</div>