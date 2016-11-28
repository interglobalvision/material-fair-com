<?php

// Custom hooks (like excerpt length etc)

function add_year_booth_levels( $term_id, $tt_id, $taxonomy ){
  if ($taxonomy === 'fair_year') {
    $year_term = get_term($term_id, $taxonomy);

    if ($year_term->parent === 0) {
      $year_slug = $year_term->slug;
      $terms = array('Exhibitor', 'Project');

      foreach ($terms as $term) {
        wp_insert_term( 
          $year_slug . ' ' . $term, 
          'booth_level', 
          array(
            'slug'    => $year_slug . '-' . strtolower($term)
          ) 
        );
      }
    }

    die;
  }
}
add_action( 'create_term', 'add_year_booth_levels', 10, 3 );