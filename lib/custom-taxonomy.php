<?php
//Register Custom Taxonomy
add_action( 'init', 'register_tax_location', 0 );

function register_tax_location() {
  $labels = array(
    'name'                       => _x( 'Location', 'taxonomy general name' ),
    'singular_name'              => _x( 'Location', 'taxonomy singular name' ),
    'search_items'               => __( 'Search Locations' ),
    'popular_items'              => __( 'Popular Locations' ),
    'all_items'                  => __( 'All Locations' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Location' ),
    'update_item'                => __( 'Update Location' ),
    'add_new_item'               => __( 'Add New Location' ),
    'new_item_name'              => __( 'New Location Name' ),
    'separate_items_with_commas' => __( 'Enter only one location' ),
    'add_or_remove_items'        => __( 'Add or remove location' ),
    'choose_from_most_used'      => __( 'Choose from the most used locations' ),
    'not_found'                  => __( 'No locations found.' ),
    'menu_name'                  => __( 'Locations' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'show_ui' => true,
    'show_admin_column' => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var' => true,
    'rewrite' => array( 'slug' => 'location' ),
  );

  register_taxonomy( 'event_location', 'event', $args );
}

