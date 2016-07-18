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

// Only return non-highlight, current year press for archive
function filter_press_posts( $query ) {
  if ( $query->is_main_query() && is_post_type_archive('press') && !is_admin() ) {

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


    if (get_fair_year_id()) {
      //posts with current year
      $taxquery = array(
        array(
          'taxonomy' => 'fair_year',
          'field' => 'term_id',
          'terms' => get_fair_year_id(),
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
}
add_action( 'pre_get_posts', 'filter_press_posts' );

// Only return current year events for archive, and order results by start date
function filter_event_posts( $query ) {
  if ( $query->is_main_query() && is_post_type_archive('event') && !is_admin() ) {
    $query->set( 'meta_key', '_igv_event_start' );
    $query->set( 'orderby', 'meta_value_num' );
    $query->set( 'order', 'ASC' );

    if (get_fair_year_id()) {
      //posts with current year
      $taxquery = array(
        array(
          'taxonomy' => 'fair_year',
          'field' => 'term_id',
          'terms' => get_fair_year_id(),
        ),
      );
      //get non-highlight, current year posts
      $args = array(
        'post_type' => 'event',
        'tax_query' => $taxquery,
      );
      $current_year_posts = get_posts($args);

      //if there are more than 2 current posts
      //exclude all others from query
      if (count($current_year_posts) > 2) {
        $query->set( 'tax_query', $taxquery );
      }
    }
  }
}
add_action( 'pre_get_posts', 'filter_event_posts' );

/**
 * Extend get terms with post type parameter.
 *
 * @global $wpdb
 * @param string $clauses
 * @param string $taxonomy
 * @param array $args
 * @return string
 */
function df_terms_clauses( $clauses, $taxonomy, $args ) {
  if ( isset( $args['post_type'] ) && ! empty( $args['post_type'] ) && $args['fields'] !== 'count' ) {
    global $wpdb;

    $post_types = array();

    if ( is_array( $args['post_type'] ) ) {
      foreach ( $args['post_type'] as $cpt ) {
        $post_types[] = "'" . $cpt . "'";
      }
    } else {
      $post_types[] = "'" . $args['post_type'] . "'";
    }

    if ( ! empty( $post_types ) ) {
      $clauses['fields'] = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] ) . ', COUNT(p.post_type) AS count';
      $clauses['join'] .= ' LEFT JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id LEFT JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
      $clauses['where'] .= ' AND (p.post_type IN (' . implode( ',', $post_types ) . ') OR p.post_type IS NULL)';
      $clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
    }
  }
  return $clauses;
}

add_filter( 'terms_clauses', 'df_terms_clauses', 10, 3 );
