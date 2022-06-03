</main>
<footer id="footer" class="site-footer">
  <div class="site-footer-inner">
    <hr>
    I'm the footer
    <?php
    wp_nav_menu([
        'theme_location'    => 'footer_menu', // (string) Theme location to be used. Must be registered with register_nav_menu() in order to be selectable by the user.
        'container'         => 'nav',
        'container_class'   => 'site-footer-nav', // (string) Class that is applied to the container. Default 'menu-{menu slug}-container'.
        'container_id'      => 'footer-nav', // (string) The ID that is applied to the container.
        'menu_id'           => 'footer-nav-list', // (string) The ID that is applied to the ul element which forms the menu. Default is the menu slug, incremented.
        'menu_class'        => 'site-footer-nav-list', // (string) CSS class to use for the ul element which forms the menu. Default 'menu'.
    ]);
    ?>
  </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>