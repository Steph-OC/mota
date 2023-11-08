<!-- overlay-content.php -->
<?php 
// Récupération de la catégorie du post
$postCats = get_the_terms(get_the_ID(), 'categorie');
$postCatName = $postCats ? esc_html($postCats[0]->name) : ''; // Utilisez le premier terme trouvé
?>

<div class="overlay-content">
    <!-- Ici, vous pouvez ajouter les icônes, les références, et tout autre contenu -->
    <div class="icon-eye icons">
    <a href="<?php echo esc_url(get_the_permalink()); ?>" class="icon-eye">
        <i class="fa-regular fa-eye fa-2xl"></i>
    </a>
    </div>
    <div class="icon-expand icons"><i class="fa-solid fa-expand fa-lg icon"></i></div>
    <div class="ref-overlay icons"><?php echo esc_html(get_field('reference')); ?></div>
    <div class="category-overlay icons"><?php echo $postCatName; ?></div>
    <!-- ... autres éléments de l'overlay ... -->
</div>
