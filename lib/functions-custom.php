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