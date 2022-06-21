<?php

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {
    // Check function exists.
  if (function_exists('acf_register_block_type')) {
        // register a testimonial block.
    acf_register_block_type([
      'name'              => 'ACF Example Block',
      'title'             => __('ACF Hello World'),
      'description'       => __('A Hello World Example Block.'),
      'render_template'   => '/blocks/acf-hello-world/block.php',
      'category'          => 'text',
      'icon'              => 'admin-comments',
      'keywords'          => ['hello world', 'acf'],
    ]);
  }
}