<?php

if( function_exists( 'add_theme_support' ) ) {
  add_theme_support( 'post-thumbnails' );
}

if( function_exists( 'add_image_size' ) ) {
  add_image_size( 'admin-thumb', 150, 150, false );
  add_image_size( 'opengraph', 1200, 630, true );
  add_image_size( 'sponsor', 300, 100, false );
  add_image_size( 'splash', 1440, 550, true );

  add_image_size( 'col-3-crop', 252, 175, true );
  add_image_size( 'col-3-square', 252, 252, true );
  add_image_size( 'col-4-crop', 384, 230, true );
  add_image_size( 'col-6', 696, 9999, false );
  add_image_size( 'col-8', 770, 9999, false );
  add_image_size( 'col-8-4to3', 770, 577.5, false );

  add_image_size( 'name', 199, 299, true );
}
