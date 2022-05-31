<?php

use Carbon_Fields\Container\Container;
use Carbon_Fields\Field\Field;

Container::make('post_meta', 'Page Meta')
  ->where('post_id', '=', get_id_from_path('example'))
  ->set_context( 'side' )
  ->set_priority( 'low' )
  ->add_fields([
    Field::make('text', 'crb_example_field', __('Example Field'))
  ]);
