<?php 
// Récupération de la catégorie du post
$postCats = get_the_terms(get_the_ID(), 'categorie');
$postCatName = $postCats ? esc_html($postCats[0]->name) : ''; // Utilise le premier terme trouvé
?>

<div class="overlay-content">
    <div class="icon-eye icons">
    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="icon-eye">
        <i class="fa-regular fa-eye fa-2xl"></i>
    </a>
    </div>
    <div class="icon-expand icons" data-postid="<?php echo get_the_ID(); ?>"><i class="fa-solid fa-expand fa-lg icon"></i></div>
    <div class="ref-overlay icons"><?php echo esc_html(get_field('reference')); ?></div>
    <div class="category-overlay icons"><?php echo $postCatName; ?></div>
  
</div>
