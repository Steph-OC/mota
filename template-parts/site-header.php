<!DOCTYPE html>
<html <?php language_attributes(); ?>> <!--définit automatiquement la langue en fonction des régalages WP -->

<head>
    <meta charset="<?php bloginfo('charset'); ?>"><!-- permet de définir l'encodage et permet de récupérer d'autres infos -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?> <!-- !important, c'est par cette fonction que sont déclarer les scripts de style -->
</head>

<body <?php body_class('site'); ?>> <!-- permet d'obtenir des noms de classe css en fonction de la page visitée -->

    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <header class="site_header">
            <nav class="site_nav">
                <img class="site_logo" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="Logo">
                <?php wp_nav_menu(
                    array(
                        'theme_location' => 'nav_menu',
                        'container' => 'ul', //afin d'éviter que WP ajoute un div autour
                        'menu_class' => 'site_header_menu', //ma classe personnalisée
                    )
                ); ?>
            </nav>
        </header>