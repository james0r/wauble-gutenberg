<?php

if (!function_exists('dd')) {
  function dd($data) {
    ini_set('highlight.comment', '#969896; font-style: italic');
    ini_set('highlight.default', '#FFFFFF');
    ini_set('highlight.html', '#D16568');
    ini_set('highlight.keyword', '#7FA3BC; font-weight: bold');
    ini_set('highlight.string', '#F2C47E');
    $output = highlight_string("<?php\n\n" . var_export($data, true), true);
    echo "<div style=\"background-color: #1C1E21; padding: 1rem\">{$output}</div>";
    die();
  }
}

if (!function_exists('get_id_from_path')) {
  function get_id_from_path($slug) {
    $page = get_page_by_path($slug);
  
    if ($page) {
      return $page->ID;
    } else {
      return null;
    } 
  }
}

function wauble_console_log($data) {
  echo '<script>';
  echo 'console.log(' . json_encode($data) . ')';
  echo '</script>';
}

function wauble_get_directions($address) {
  return sprintf('https://www.google.com/maps/dir/?api=1&destination=%s', $address);
}

function wauble_get_attachment_image_no_srcset($attachment_id, $size = 'thumbnail', $icon = false, $attr = '') {
  // add a filter to return null for srcset
  add_filter('wp_calculate_image_srcset_meta', '__return_null');
  // get the srcset-less img html
  $html = wp_get_attachment_image($attachment_id, $size, $icon, $attr);
  // remove the above filter
  remove_filter('wp_calculate_image_srcset_meta', '__return_null');

  return $html;
}

// Wrap this awkwardly named WP function
function wauble_attachment_id_from_url($url) {
  return attachment_url_to_postid($url);
}
