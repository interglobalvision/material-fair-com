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
        'name' => _x( 'Events', 'event' ),
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
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'event', $args );
}
