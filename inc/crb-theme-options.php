<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

$options_container;

$options_container = Container::make('theme_options', __('Theme Options'))
  ->add_fields([
    Field::make('color', 'crb_color_primary', 'Primary Color')
    ->set_alpha_enabled(true)
    ->set_default_value('#FF00FF'),
    Field::make('color', 'crb_color_body_background', 'Background Color')
    ->set_alpha_enabled(true)
    ->set_default_value('#FFFFFF')
  ]);

Container::make('theme_options', __('Header'))
  ->set_page_parent($options_container)
  ->add_fields([
    Field::make('image', 'crb_header_logo_desktop', __('Desktop Logo', 'wauble')),
    Field::make('image', 'crb_header_logo_mobile', __('Mobile Logo', 'wauble')),
  ]);

Container::make('theme_options', __('Footer'))
  ->set_page_parent($options_container)
  ->add_fields([
    Field::make('text', 'crb_footer_copyright', __('Copyright Line Text', 'wauble')),
  ]);

$social_networks = [
  'facebook',
  'twitter',
  'instagram',
  'linkedin',
  'pinterest',
  'youtube'
];

$social_fields = [];

foreach ($social_networks as $s) {
  array_push($social_fields, Field::make('text', 'crb_' . $s . '_url', ucfirst($s))
  ->set_attribute('placeholder', 'https://example.org'));
};

Container::make('theme_options', __('Social Links'))
  ->set_page_parent($options_container)
  ->add_fields([
    ...$social_fields
  ]);
