<!-- Wauble CSS Variables Start -->
<style id="theme-css-vars">
:root {
<?php
  if (!empty(carbon_get_theme_option('crb_color_primary'))) {
    echo '--wauble-primary-color: ' . carbon_get_theme_option('crb_color_primary') . ';' . PHP_EOL;
  }
  if (!empty(carbon_get_theme_option('crb_color_body_background'))) {
    echo '--wauble-body-background-color: ' . carbon_get_theme_option('crb_color_body_background') . ';' . PHP_EOL;
  }
?>
}
</style>
<!-- Wauble CSS Variables End -->