<?php

if( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'admin-thumb', 150, 150, false );
  add_image_size( 'opengraph', 1200, 630, true );
  add_image_size( 'sponsor', 300, 100, false );
  add_image_size( 'splash', 1440, 550, true );
  add_image_size( 'col-6', 540, 9999, false );

  add_image_size( 'name', 199, 299, true );
}
