<?php

define('WAUBLE_THEME_DIR', dirname(__FILE__) . '/');
define('WAUBLE_THEME_ASSETS_DIR', get_stylesheet_directory_uri() . '/dist/');
require_once WAUBLE_THEME_DIR . '/inc/helpers.php';

if (!function_exists('wauble_setup')) {
  function wauble_setup() {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Twenty Twenty-One, use a find and replace
     * to change 'wauble' to the name of your theme in all the template files.
     */
    load_theme_textdomain('wauble', get_template_directory() . '/languages');

    /*
     * Let WordPress manage the document title.
     * This theme does not use a hard-coded <title> tag in the document head,
     * WordPress will provide it for us.
     */
    add_theme_support('title-tag');

    /**
     * Add post-formats support.
     */
    add_theme_support(
      'post-formats',
      [
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
      ]
    );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(800, 9999);

    register_nav_menus(
      [
        'header_menu' => esc_html__('Header Menu', 'wauble'),
        'footer_menu' => __('Footer Menu', 'wauble'),
      ]
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
      'html5',
      [
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
      ]
    );

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    $logo_width  = 300;
    $logo_height = 100;

    add_theme_support(
      'custom-logo',
      [
        'height'               => $logo_height,
        'width'                => $logo_width,
        'flex-width'           => true,
        'flex-height'          => true,
        'unlink-homepage-logo' => true,
      ]
    );

    add_image_size('custom_logo', 400);
    add_image_size('custom_logo_2X', 800);

    // Add support for Block Styles.
    add_theme_support('wp-block-styles');

    // Add support for full and wide align images.
    add_theme_support('align-wide');

    // Add support for editor styles.
    add_theme_support('editor-styles');

    // Add custom editor font sizes.
    add_theme_support(
      'editor-font-sizes',
      [
        [
          'name'      => esc_html__('Extra small', 'wauble'),
          'shortName' => esc_html_x('XS', 'Font size', 'wauble'),
          'size'      => 16,
          'slug'      => 'extra-small',
        ],
        [
          'name'      => esc_html__('Small', 'wauble'),
          'shortName' => esc_html_x('S', 'Font size', 'wauble'),
          'size'      => 18,
          'slug'      => 'small',
        ],
        [
          'name'      => esc_html__('Normal', 'wauble'),
          'shortName' => esc_html_x('M', 'Font size', 'wauble'),
          'size'      => 20,
          'slug'      => 'normal',
        ],
        [
          'name'      => esc_html__('Large', 'wauble'),
          'shortName' => esc_html_x('L', 'Font size', 'wauble'),
          'size'      => 24,
          'slug'      => 'large',
        ],
        [
          'name'      => esc_html__('Extra large', 'wauble'),
          'shortName' => esc_html_x('XL', 'Font size', 'wauble'),
          'size'      => 40,
          'slug'      => 'extra-large',
        ],
        [
          'name'      => esc_html__('Huge', 'wauble'),
          'shortName' => esc_html_x('XXL', 'Font size', 'wauble'),
          'size'      => 96,
          'slug'      => 'huge',
        ],
        [
          'name'      => esc_html__('Gigantic', 'wauble'),
          'shortName' => esc_html_x('XXXL', 'Font size', 'wauble'),
          'size'      => 144,
          'slug'      => 'gigantic',
        ],
      ]
    );

    // Add support for responsive embedded content.
    add_theme_support('responsive-embeds');

    // Add support for custom line height controls.
    add_theme_support('custom-line-height');

    // Add support for experimental link color control.
    add_theme_support('experimental-link-color');

    // Add support for experimental cover block spacing.
    add_theme_support('custom-spacing');

    // Remove comments page in menu
    add_action('admin_menu', function () {
      remove_menu_page('edit-comments.php');
    });

    add_action('init', function () {
      // Remove comments links from admin bar
      if (is_admin_bar_showing()) {
        remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
      }

      // Remove noisy SVGs in <body>
      remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

      // Remove page attributies box for pages
      remove_post_type_support('page', 'page-attributes');
    });

    // Remove Quick Draft Dashboard Widget
    add_action('wp_dashboard_setup', 'remove_draft_widget', 999);

    function remove_draft_widget() {
      remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    }

    //Remove Comments and Links from WP Admin Main Nav
    function wauble_remove_menus() {
      global $menu;
      $restricted = [__('Links'), __('Comments')];
      end($menu);
      while (prev($menu)) {
        $value = explode(' ', $menu[key($menu)][0]);
        if (in_array($value[0] != null ? $value[0] : '', $restricted)) {
          unset($menu[key($menu)]);
        }
      }
    }

    add_action('admin_menu', 'wauble_remove_menus');
  }
}
add_action('after_setup_theme', 'wauble_setup');

/**
 * Enqueue scripts and styles.
 *
 * @return void
 */
function wauble_scripts() {

  // Enqueue the theme's stylesheet
  wp_enqueue_style('theme-styles', get_stylesheet_directory_uri() . '/style.css');

 
  if (file_exists(dirname(__FILE__) . '/dist/css/frontend-bundle.css.map')) {
    wp_enqueue_style('frontend-styles', get_stylesheet_directory_uri() . '/dist/css/frontend-bundle.css');
    if (is_front_page()) {
      wp_enqueue_style('template-front-page-styles', get_stylesheet_directory_uri() . '/dist/css/template-front-page.css');
    } elseif (is_page('example')) {
      wp_enqueue_style('page-template-example-styles', get_stylesheet_directory_uri() . '/dist/css/page-template-example.css');
    }
  }

  // Enqueue Wauble scripts
  wp_enqueue_script('jquery');
  wp_enqueue_script('frontend-bundle', get_stylesheet_directory_uri() . '/dist/js/frontend-bundle.js', 'jquery', 1.0, true);
  wp_enqueue_script('wp-responsive-embeds', get_stylesheet_directory_uri() . '/dist/vendor/wp-responsive-embeds.js', null, 1.0, true);

  // Threaded comment reply styles.
  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'wauble_scripts');

/**
 * Enqueue admin scripts and styles.
 *
 * @return void
 */
function wauble_admin_scripts() {
  wp_enqueue_style('admin-styles', get_template_directory_uri() . '/dist/admin/admin.css');
  wp_enqueue_script('jquery-ui', get_template_directory_uri() . '/dist/admin/jquery-ui.min.js');
  wp_enqueue_script('admin-scripts', get_template_directory_uri() . '/dist/admin/admin.js');
}

add_action('admin_enqueue_scripts', 'wauble_admin_scripts');

require_once WAUBLE_THEME_DIR . '/inc/register-plugins.php';

function wauble_create_and_set_theme_pages() {
  $pages = [
    [
      'page_title'    => 'Search',
      'page_content'  => '',
      'page_template' => 'page-templates/search.php',
      'post_name'     => 'search'
    ],
    [
      'page_title'   => 'Blog',
      'page_content' => 'This text is auto generated and can be changed or deleted',
      'post_name'    => 'blog'
    ],
    [
      'page_title'    => 'Front Page',
      'page_content'  => 'This text is auto generated and can be changed or deleted',
      'post_name'     => 'frontpage',
      'page_template' => 'front-page.php',
    ],
    [
      'page_title'    => 'Example Page',
      'page_content'  => 'This text is auto generated and can be changed or deleted',
      'page_template' => 'page-templates/example.php',
      'post_name'     => 'example'
    ]
  ];

  foreach ($pages as $page) {
    $page_check = get_page_by_title($page['page_title']);   // Check if the page already exists
    // Store the above data in an array
    $new_page = [
      'post_type'    => 'page',
      'post_title'   => $page['page_title'],
      'post_content' => $page['page_content'],
      'post_status'  => 'publish',
      'post_author'  => 1,
      'post_name'    => $page['post_name']
    ];
    // If the page doesn't already exist, create it
    if (!isset($page_check->ID)) {
      $new_page_id = wp_insert_post($new_page);
      if (!empty($page['page_template'])) {
        update_post_meta($new_page_id, '_wp_page_template', $page['page_template']);
      } else {
        update_post_meta($new_page_id, '_wp_page_template', 'page-templates/example.php');
      }

      if ($page['page_title'] === 'Blog') {
        // Set the blog page
        $blog = get_page_by_title('Blog');
        update_option('page_for_posts', $blog->ID);
      }

      if ($page['page_title'] === 'Front Page') {
        // Set the static front page
        $frontpage = get_page_by_title('Front Page');
        update_option('page_on_front', $frontpage->ID);
        update_option('show_on_front', 'page');
      }
    }
  }
}

add_action('after_switch_theme', 'wauble_create_and_set_theme_pages');

function wauble_console_table_info() {
  global $template;

  $markup = '<script>
      window.wauble = window.wauble || {}
      window.wauble.wordpress = {}
      window.wauble.wordpress.currentTemplate = "%s"
      window.wauble.wordpress.wpVersion = "%s"
    </script>';

  echo sprintf($markup, basename($template), get_bloginfo('version'));
}

add_action('wp_footer', 'wauble_console_table_info');

function condensed_body_class($classes) {
  global $post;

  // add a class for the name of the page - later might want to remove the auto generated pageid class which isn't very useful
  if (is_page()) {
    $pn        = $post->post_name;
    $classes[] = 'page-' . $pn;
  }

  // add a class for the parent page name
  if (is_page() && $post->post_parent) {
    $post_parent = get_post($post->post_parent);
    $parentSlug  = $post_parent->post_name;
    $classes[]   = 'parent-' . $parentSlug;
  }

  // add class for the name of the custom template used (if any)
  $temp = get_page_template();
  if ($temp != null) {
    $path      = pathinfo($temp);
    $tmp       = $path['filename'] . '.' . $path['extension'];
    $tn        = str_replace('.php', '', $tmp);
    $classes[] = 'template-' . $tn;
  }

  if (is_front_page()) {
    $classes[] = 'template-front-page';
  }

  wp_reset_postdata();

  return $classes;
}

add_filter('body_class', 'condensed_body_class');

add_action('wp_dashboard_setup', 'remove_dashboard_widgets');
function remove_dashboard_widgets() {
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  remove_meta_box('dashboard_secondary', 'dashboard', 'side');
}

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    // Check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a testimonial block.
        acf_register_block_type(array(
            'name'              => 'ACF Example Block',
            'title'             => __('ACF Hello World'),
            'description'       => __('A Hello World Example Block.'),
            'render_template'   => '/blocks/acf-hello-world/block.php',
            'category'          => 'text',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'hello world', 'acf' ),
        ));
    }
}