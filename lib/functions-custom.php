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

add_filter( 'manage_posts_columns', 'add_highlight_column' );
function add_highlight_column($columns) {
  if (get_post_type() == 'event') {
    $columns['post_highlight'] = __( 'Highlight', 'IGV' );
    $columns['event_vip'] = __( 'VIP', 'IGV' );
  } elseif (get_post_type() == 'press') {
    $columns['post_highlight'] = __( 'Highlight', 'IGV' );
  }
  return $columns;
}

add_action( 'manage_posts_custom_column' , 'display_highlight_column', 10, 2 );
function display_highlight_column( $column, $post_id ) {
  if (get_post_type() == 'press') {
    switch ( $column ) {
      case 'post_highlight' :
      $highlight = get_post_meta( $post_id , '_igv_press_highlight' , false );
      if ( !empty($highlight[0]) )
        echo $highlight[0];
      break;
    }
  } elseif (get_post_type() == 'event') {
    switch ( $column ) {
      case 'post_highlight' :
      $highlight = get_post_meta( $post_id , '_igv_event_highlight' , false );
      if ( !empty($highlight[0]) )
        echo $highlight[0];
      break;

      case 'event_vip' :
      $vip = get_post_meta( $post_id , '_igv_event_vip' , false );
      if ( !empty($vip[0]) )
        echo $vip[0];
      break;
    }
  }
}

