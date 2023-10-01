<footer class="site_footer">
    <?php wp_nav_menu(
        array(
            'theme_location' => 'footer_menu',
            'container' => 'ul',
            'menu_class' => 'site_footer_menu',
        )
    );
    ?>
</footer>
</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>