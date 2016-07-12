<?php
add_action( 'init', 'create_fair_year_tax' );

function create_fair_year_tax() {
  $labels = array(
    'name'                       => _x( 'Fair Years', 'taxonomy general name' ),
    'singular_name'              => _x( 'Fair Year', 'taxonomy singular name' ),
    'search_items'               => __( 'Search Fair Years' ),
    'popular_items'              => __( 'Popular Fair Years' ),
    'all_items'                  => __( 'All Fair Years' ),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __( 'Edit Fair Year' ),
    'update_item'                => __( 'Update Fair Year' ),
    'add_new_item'               => __( 'Add New Fair Year' ),
    'new_item_name'              => __( 'New Fair Year Name' ),
    'separate_items_with_commas' => __( 'Separate Fair Years with commas' ),
    'add_or_remove_items'        => __( 'Add or remove Fair Year' ),
    'choose_from_most_used'      => __( 'Choose from the most used Fair Years' ),
    'not_found'                  => __( 'No Fair Years found.' ),
    'menu_name'                  => __( 'Fair Years' ),
  );

  $args = array(
    'hierarchical'          => true,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'query_var'             => true,
  );

  register_taxonomy( 'fair_year', array('exhibitor','press','committee','event','photo_gallery'), $args );
}

add_action('admin_head', 'hide_fair_year_fields');

function hide_fair_year_fields() {
  echo '<style>
    .taxonomy-fair_year .term-parent-wrap,
    .taxonomy-fair_year .term-description-wrap,
    #newfair_year_parent 
    {
      display: none !important
    }

    #side-sortables #fair_yeardiv .inside:after {
      content: \'Fair Year is used to associate this content with a year of the fair. This content will be shown for any years selected here in its respective section (i.e Exhibitors, Press, or Program). Multiple years should only be selected for Exhibitors who participate for multiple years (i.e. Lodos or Parallel Oaxaca). Multiple years may be assigned to other content, but this will result in it appearing multiple times on the website.\'
    }
  </style>';
}