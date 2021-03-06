<?php
//Register Custom Post Types
add_action( 'init', 'register_cpt_exhibitor' );

function register_cpt_exhibitor() {

  $labels = array( 
    'name' => _x( 'Exhibitors', 'exhibitor' ),
    'singular_name' => _x( 'Exhibitor', 'exhibitor' ),
    'add_new' => _x( 'Add New', 'exhibitor' ),
    'add_new_item' => _x( 'Add New Exhibitor', 'exhibitor' ),
    'edit_item' => _x( 'Edit Exhibitor', 'exhibitor' ),
    'new_item' => _x( 'New Exhibitor', 'exhibitor' ),
    'view_item' => _x( 'View Exhibitor', 'exhibitor' ),
    'search_items' => _x( 'Search Exhibitors', 'exhibitor' ),
    'not_found' => _x( 'No exhibitors found', 'exhibitor' ),
    'not_found_in_trash' => _x( 'No exhibitors found in Trash', 'exhibitor' ),
    'parent_item_colon' => _x( 'Parent Exhibitor:', 'exhibitor' ),
    'menu_name' => _x( 'Exhibitors', 'exhibitor' ),
  );

  $args = array( 
    'labels' => $labels,
    'hierarchical' => false,
    
    'supports' => array( 'title', 'thumbnail' ),
    
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => array( 'slug' => 'exhibitors' ),
    'capability_type' => 'post'
  );

  register_post_type( 'exhibitor', $args );
}

add_action( 'init', 'register_cpt_press' );

function register_cpt_press() {

  $labels = array( 
    'name' => _x( 'Press', 'press' ),
    'singular_name' => _x( 'Press', 'press' ),
    'add_new' => _x( 'Add New', 'press' ),
    'add_new_item' => _x( 'Add New Press', 'press' ),
    'edit_item' => _x( 'Edit Press', 'press' ),
    'new_item' => _x( 'New Press', 'press' ),
    'view_item' => _x( 'View Press', 'press' ),
    'search_items' => _x( 'Search Press', 'press' ),
    'not_found' => _x( 'No press found', 'press' ),
    'not_found_in_trash' => _x( 'No press found in Trash', 'press' ),
    'parent_item_colon' => _x( 'Parent Press:', 'press' ),
    'menu_name' => _x( 'Press', 'press' ),
  );

  $args = array( 
    'labels' => $labels,
    'hierarchical' => false,
    
    'supports' => array( 'title', 'editor', 'thumbnail' ),
    
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'press', $args );
}

add_action( 'init', 'register_cpt_event' );

function register_cpt_event() {

  $labels = array( 
    'name' => _x( 'Program', 'event' ),
    'singular_name' => _x( 'Event', 'event' ),
    'add_new' => _x( 'Add New', 'event' ),
    'add_new_item' => _x( 'Add New Event', 'event' ),
    'edit_item' => _x( 'Edit Event', 'event' ),
    'new_item' => _x( 'New Event', 'event' ),
    'view_item' => _x( 'View Event', 'event' ),
    'search_items' => _x( 'Search Events', 'event' ),
    'not_found' => _x( 'No events found', 'event' ),
    'not_found_in_trash' => _x( 'No events found in Trash', 'event' ),
    'parent_item_colon' => _x( 'Parent Event:', 'event' ),
    'menu_name' => _x( 'Event', 'event' ),
  );

  $args = array( 
    'labels' => $labels,
    'hierarchical' => false,
    
    'supports' => array( 'title', 'editor', 'thumbnail' ),
    
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => array( 'slug' => 'program' ),
    'capability_type' => 'post'
  );

  register_post_type( 'event', $args );
}

add_action( 'init', 'register_cpt_committee' );

function register_cpt_committee() {

  $labels = array( 
    'name' => _x( 'Committees', 'committee' ),
    'singular_name' => _x( 'Committee', 'committee' ),
    'add_new' => _x( 'Add New', 'committee' ),
    'add_new_item' => _x( 'Add New Committee', 'committee' ),
    'edit_item' => _x( 'Edit Committee', 'committee' ),
    'new_item' => _x( 'New Committee', 'committee' ),
    'view_item' => _x( 'View Committee', 'committee' ),
    'search_items' => _x( 'Search Committees', 'committee' ),
    'not_found' => _x( 'No committees found', 'committee' ),
    'not_found_in_trash' => _x( 'No committees found in Trash', 'committee' ),
    'parent_item_colon' => _x( 'Parent Committee:', 'committee' ),
    'menu_name' => _x( 'Committee', 'committee' ),
  );

  $args = array( 
    'labels' => $labels,
    'hierarchical' => false,
    
    'supports' => array( 'title','editor' ),
    
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'committee', $args );
}

add_action( 'init', 'register_cpt_photo_gallery' );

function register_cpt_photo_gallery() {

  $labels = array( 
    'name' => _x( 'Photo galleries', 'photo_gallery' ),
    'singular_name' => _x( 'Photo gallery', 'photo_gallery' ),
    'add_new' => _x( 'Add New', 'photo_gallery' ),
    'add_new_item' => _x( 'Add New Photo gallery', 'photo_gallery' ),
    'edit_item' => _x( 'Edit Photo gallery', 'photo_gallery' ),
    'new_item' => _x( 'New Photo gallery', 'photo_gallery' ),
    'view_item' => _x( 'View Photo gallery', 'photo_gallery' ),
    'search_items' => _x( 'Search Photo galleries', 'photo_gallery' ),
    'not_found' => _x( 'No photo galleries found', 'photo_gallery' ),
    'not_found_in_trash' => _x( 'No photo galleries found in Trash', 'photo_gallery' ),
    'parent_item_colon' => _x( 'Parent Photo gallery:', 'photo_gallery' ),
    'menu_name' => _x( 'Photo galleries', 'photo_gallery' ),
  );

  $args = array( 
    'labels' => $labels,
    'hierarchical' => false,
    
    'supports' => array( 'title','editor', 'thumbnail' ),
    
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 5,
    
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => false,
    'has_archive' => true,
    'query_var' => true,
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'photo_gallery', $args );
}


