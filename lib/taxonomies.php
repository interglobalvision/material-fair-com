<?php
// hook into the init action and call create_book_taxonomies when it fires

// create two taxonomies, genres and writers for the post type "book"
add_action( 'init', 'create_exhibitor_year_tax' );

function create_exhibitor_year_tax() {
  $labels = array(
    'name'                       => _x( 'Years', 'taxonomy general name' ),
    'singular_name'              => _x( 'Year', 'taxonomy singular name' ),
    'search_items'               => __( 'Search Years' ),
    'popular_items'              => __( 'Popular Years' ),
    'all_items'                  => __( 'All Years' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Year' ),
    'update_item'                => __( 'Update Year' ),
    'add_new_item'               => __( 'Add New Year' ),
    'new_item_name'              => __( 'New Year Name' ),
    'separate_items_with_commas' => __( 'Separate years with commas' ),
    'add_or_remove_items'        => __( 'Add or remove year' ),
    'choose_from_most_used'      => __( 'Choose from the most used years' ),
    'not_found'                  => __( 'No years found.' ),
    'menu_name'                  => __( 'Years' ),
  );

  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
  );

  register_taxonomy( 'exhibitor_year', 'exhibitor', $args );
}

function remove_year_metabox() {
  remove_meta_box( 'tagsdiv-exhibitor_year', 'exhibitor', 'side' );
}
add_action( 'admin_menu', 'remove_year_metabox' );