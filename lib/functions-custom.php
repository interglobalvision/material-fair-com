<?php

// Custom functions (like special queries, etc)

/**
 * Gets a number of terms and displays them as options
 * @param  CMB2_Field $field 
 * @return array An array of options that matches the CMB2 options array
 */
function cmb2_get_term_options( $field ) {
  $args = $field->args( 'get_terms_args' );
  $args = is_array( $args ) ? $args : array();

  $args = wp_parse_args( $args, array( 'taxonomy' => 'category' ) );

  $taxonomy = $args['taxonomy'];

  $terms = get_terms( $taxonomy, $args );

  // Initate an empty array
  $term_options = array();
  if ( ! empty( $terms ) ) {
    foreach ( $terms as $term ) {
      $term_options[ $term->term_id ] = $term->name;
    }
  }

  return $term_options;
}

add_filter( 'manage_press_posts_columns', 'add_press_highlight_column' );
function add_press_highlight_column($columns) {
  $columns['press_highlight'] = __( 'Highlight', 'IGV' );
  return $columns;
}

add_action( 'manage_press_posts_custom_column' , 'display_press_highlight_column', 10, 2 );
function display_press_highlight_column( $column, $post_id ) {
  switch ( $column ) {
    case 'press_highlight' :
    $highlight = get_post_meta( $post_id , '_igv_press_highlight' , false );
    if ( !empty($highlight[0]) )
      echo $highlight[0];
    break;
  }
}

