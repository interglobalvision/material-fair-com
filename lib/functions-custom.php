<?php

// Custom functions (like special queries, etc)

function igv_taxonomies() {
  register_taxonomy(
    'event_location',
    'event',
    array(
      'labels' => array(
        'name' => 'Location',
        'add_new_item' => 'Add New Location',
        'new_item_name' => "New Event Location"
      ),
      'show_ui' => true,
      'show_tagcloud' => false,
      'hierarchical' => true
    )
  );
}

add_action( 'init', 'igv_taxonomies', 0 );