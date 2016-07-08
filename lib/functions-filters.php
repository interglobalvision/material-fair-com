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

// Replace 'Enter title here' text on 
// Committee post type edit screen
function year_title_text( $title ){
  $screen = get_current_screen();

  if  ( 'committee' == $screen->post_type ) {
    $title = 'Enter year here';
  }

  return $title;
}
add_filter( 'enter_title_here', 'year_title_text' );

// Only return current year exhibitors for archive
function exclude_past_exhibitors( $query ) {
  if ( $query->is_main_query() && is_post_type_archive('exhibitor') && !is_admin() ) {
    $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
    $taxquery = array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $current_year_id,
      )
    );
    $query->set( 'tax_query', $taxquery );
  }
}
add_action( 'pre_get_posts', 'exclude_past_exhibitors' );


// Only return non-highlight, current year exhibitors for archive
function filter_press_posts( $query ) {
  if ( $query->is_main_query() && is_post_type_archive('press') && !is_admin() ) {

    $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');


    //add metaquery for highlight posts
    $highlight_metaquery = array( 
      array(
        'key' => '_igv_press_highlight',
        'value' => 'on',
      ),
    );
    $args = array(
      'post_type' => 'press',
      'meta_query' => $highlight_metaquery,
      'numberposts' => 2,
    );

    //get highlight posts
    $highlight_posts = get_posts($args);

    //put hightlight post ids in array
    $highlight_ids = array();
    foreach ( $highlight_posts as $post ) {
       $highlight_ids[] += $post->ID;
    }

    //exclude highlighted posts from query
    $query->set( 'post__not_in', $highlight_ids );



    //posts with current year
    $taxquery = array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $current_year_id,
      ),
    );
    //get non-highlight, current year posts
    $args = array(
      'post_type' => 'press',
      'tax_query' => $taxquery,
      'post__not_in' => $highlight_ids
    );
    $current_year_posts = get_posts($args);


    //if there are more than 2 current posts
    //exclude all others from query
    if (count($current_year_posts) > 2) {
      $query->set( 'tax_query', $taxquery );
    }
  }
}
add_action( 'pre_get_posts', 'filter_press_posts' );
