<?php

// Custom hooks (like excerpt length etc)

function add_year_tax_children( $term_id, $tt_id, $taxonomy ){
  $parent_term = get_term($term_id, $taxonomy);

  if ($parent_term->parent === 0) {
    $parent_slug = $parent_term->slug;
    $terms = array('Gallery', 'Project');

    foreach ($terms as $term) {
      wp_insert_term( 
        $term, 
        $taxonomy, 
        array(
          'parent'  =>  $term_id,
          'slug'    =>  strtolower($term) . '-' . $parent_slug
        ) 
      );
    }
  }
}
add_action( 'create_term', 'add_year_tax_children', 10, 3 );