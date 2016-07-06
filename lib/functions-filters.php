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

function exclude_past_exhibitors( $query ) {
  if ( $query->is_main_query() && is_post_type_archive('exhibitor') && !is_admin() ) {
    $current_year = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
    $taxquery = array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $current_year,
      )
    );
    $query->set( 'tax_query', $taxquery );
  }
}
add_action( 'pre_get_posts', 'exclude_past_exhibitors' );
