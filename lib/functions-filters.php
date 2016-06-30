<?php

// Custom filters (like pre_get_posts etc)

// Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Replace 'Enter title here' text on Committee post type edit screen
function committee_title_text( $title ){
     $screen = get_current_screen();

     if  ( 'committee' == $screen->post_type ) {
          $title = 'Enter year here';
     }

     return $title;
}
add_filter( 'enter_title_here', 'committee_title_text' );