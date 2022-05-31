<?php
get_template_part('templates/header');

if (is_404()) {
  get_template_part('templates/404'); 
} elseif (is_home()) {
  get_template_part('templates/blog');
} elseif (is_page('search') || is_search()) {
  get_template_part('templates/search');
} elseif (is_page()) {
  $page_slug = get_post_field( 'post_name' );
  get_template_part('templates/page', $page_slug , null);
} elseif (is_single()) {
  get_template_part('templates/single');
}

get_template_part('templates/footer');

