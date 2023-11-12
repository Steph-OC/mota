<footer class="site_footer">
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer_menu',
            'container' => 'ul',
            'menu_class' => 'site_footer_menu',
        )
    );
    ?>
     <?php get_template_part('template-parts/site-modal-contact'); ?>
     <?php get_template_part('template-parts/site-lightbox'); ?>
   
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>