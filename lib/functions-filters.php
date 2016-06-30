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

// Show exhibitor year column
add_filter( 'manage_exhibitor_posts_columns', 'add_exhibitor_year_column' );
function add_exhibitor_year_column($columns) {
    $columns['exhibitor_year'] = __( 'Year', 'IGV' );
    return $columns;
}

add_action( 'manage_exhibitor_posts_custom_column' , 'display_exhibitor_year_column', 10, 2 );
function display_exhibitor_year_column( $column, $post_id ) {
  switch ( $column ) {
    case 'exhibitor_year' :
    $year = get_post_meta( $post_id , '_igv_exhibitor_year' , false );
    if ( !empty($year[0]) )
        echo $year[0];
    else
        _e( 'Not supported in theme', 'IGV' );
    break;
  }
}