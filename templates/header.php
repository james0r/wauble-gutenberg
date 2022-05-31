<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type"
		content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<?php echo get_template_part('template-parts/theme-css-vars'); ?>
	<?php wp_head(); ?>

  <!-- preload fonts -->
  <link rel="preload" href="<?php echo WAUBLE_THEME_ASSETS_DIR . 'fonts/OpenSans-Regular.woff'; ?>" as="font" type="font/woff" crossorigin>
  <link rel="preload" href="<?php echo WAUBLE_THEME_ASSETS_DIR . 'fonts/OpenSans-Regular.woff2'; ?>" as="font" type="font/woff2" crossorigin>
</head>

<body <?php body_class(''); ?>>
	<?php wp_body_open(); ?>
  <a href="#main" class="skip-to-content-link" tabindex="0">
    Skip to content
  </a>

	<header id="header" class="site-header">
		<div class="site-header-inner">
			<a href="<?php echo get_home_url(); ?>">

				<?php
          // echo wp_get_attachment_image(
          //     $header_logo_id,
          //     'custom_logo',
          //     true,
          //     ['style' => 'width: 400px; height: auto;']
          // );
        ?>
			</a>
			<span>I'm the header</span>
			<?php
        wp_nav_menu([
            'theme_location'  => 'header_menu',
            'container'       => 'nav',
            'container_class' => 'site-header-nav',
            'container_id'    => 'header-nav',
            'menu_id'         => 'header-nav-list',
            'menu_class'      => 'site-header-nav-list',
        ]);
        ?>
			<hr>
		</div>
	</header>

	<main id="main" class="site-main">