<?php

// Custom hooks (like excerpt length etc)

// add Exhibitor and Project booth level terms for each new fair year term
function add_year_booth_levels( $term_id, $tt_id, $taxonomy ){
  // only run this on new fair year terms
  if ($taxonomy === 'fair_year') {
    $year_term = get_term($term_id, $taxonomy);
    $year_slug = $year_term->slug;

    // array of booth level terms to create
    $terms = array('Exhibitor', 'Project');

    foreach ($terms as $term) {
      // insert booth level term
      wp_insert_term( 
        $year_slug . ' ' . $term, 
        'booth_level', 
        array(
          'slug'    => $year_slug . '-' . strtolower($term)
        ) 
      );
    }
  }
}
add_action( 'create_term', 'add_year_booth_levels', 10, 3 );