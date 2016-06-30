<?php

/* Get post objects for select field options */
function get_post_objects( $query_args ) {
$args = wp_parse_args( $query_args, array(
    'post_type' => 'post',
) );
$posts = get_posts( $args );
$post_options = array();
if ( $posts ) {
    foreach ( $posts as $post ) {
        $post_options [ $post->ID ] = $post->post_title;
    }
}
return $post_options;
}


/**
 * Include and setup custom metaboxes and fields.
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

/**
 * Hook in and add metaboxes. Can only happen on the 'cmb2_init' hook.
 */
add_action( 'cmb2_init', 'igv_cmb_metaboxes' );
function igv_cmb_metaboxes() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_igv_';

	/**
	 * Metaboxes declarations here
   * Reference: https://github.com/WebDevStudios/CMB2/blob/master/example-functions.php
	 */

// EXHIBITOR

  $exhibitor_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'exhibitor_metabox',
    'title'         => __( 'Exhibitor Options', 'cmb2' ),
    'object_types'  => array( 'exhibitor', ), // Post type
  ) );

  $exhibitor_metabox->add_field( array(
    'name'             => __( 'Year', 'cmb2' ),
    'desc'             => __( '', 'cmb2' ),
    'id'               => $prefix . 'exhibitor_year',
    'type'             => 'select',
    'show_option_none' => false,
    'options'          => get_exhibitor_year_options(),
  ) );

  $exhibitor_metabox->add_field( array(
    'name'     => __( 'Stand #', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'exhibitor_stand',
    'type'     => 'text_small',
  ) );

  $exhibitor_metabox->add_field( array(
    'name'     => __( 'Homepage URL', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'exhibitor_url',
    'type'     => 'text_url',
  ) );

  $exhibitor_metabox->add_field( array(
    'name'     => __( 'Address', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'exhibitor_address',
    'type'     => 'textarea_small',
  ) );

    // EXHIBITOR STAFF

  $exhibitor_staff_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'exhibitor_staff_metabox',
    'title'         => __( 'Staff', 'cmb2' ),
    'object_types'  => array( 'exhibitor', ), // Post type
  ) );

  $exhibitor_staff = $exhibitor_staff_metabox->add_field( array(
    'id'          => $prefix . 'exhibitor_staff',
    'type'        => 'group',
    'description' => __( '', 'cmb2' ),
    'options'     => array(
      'group_title'   => __( 'Staff {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => __( 'Add Another Staff', 'cmb2' ),
      'remove_button' => __( 'Remove Staff', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $exhibitor_staff_metabox->add_group_field( $exhibitor_staff, array(
    'name'        => __( 'Name', 'cmb2' ),
    'description' => __( '', 'cmb2' ),
    'id'          => 'name',
    'type'        => 'text_medium',
  ) );

  $exhibitor_staff_metabox->add_group_field( $exhibitor_staff, array(
    'name'        => __( 'Role', 'cmb2' ),
    'description' => __( '', 'cmb2' ),
    'id'          => 'role',
    'type'        => 'text_medium',
  ) );

    // EXHIBITOR ARTISTS

  $exhibitor_artists_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'exhibitor_artists_metabox',
    'title'         => __( 'Artists Exhibiting', 'cmb2' ),
    'object_types'  => array( 'exhibitor', ), // Post type
  ) );

  $exhibitor_artists = $exhibitor_artists_metabox->add_field( array(
    'id'          => $prefix . 'exhibitor_artists',
    'type'        => 'group',
    'description' => __( '', 'cmb2' ),
    'options'     => array(
      'group_title'   => __( 'Artist {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => __( 'Add Another Artist', 'cmb2' ),
      'remove_button' => __( 'Remove Artist', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $exhibitor_artists_metabox->add_group_field( $exhibitor_artists, array(
    'name'        => __( 'Name', 'cmb2' ),
    'description' => __( '', 'cmb2' ),
    'id'          => 'name',
    'type'        => 'text_medium',
  ) );

    // EXHIBITOR FEATURED

  $exhibitor_featured_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'exhibitor_featured_metabox',
    'title'         => __( 'Featured Artworks (Max 3)', 'cmb2' ),
    'object_types'  => array( 'exhibitor', ), // Post type
  ) );

  $exhibitor_featured = $exhibitor_featured_metabox->add_field( array(
    'id'          => $prefix . 'exhibitor_featured',
    'type'        => 'group',
    'description' => __( '', 'cmb2' ),
    'options'     => array(
      'group_title'   => __( 'Featured Artwork {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => __( 'Add Another Featured Artwork', 'cmb2' ),
      'remove_button' => __( 'Remove Featured Artwork', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $exhibitor_featured_metabox->add_group_field( $exhibitor_featured, array(
    'name'        => __( 'Artist Name', 'cmb2' ),
    'description' => __( '', 'cmb2' ),
    'id'          => 'name',
    'type'        => 'text_medium',
  ) );

  $exhibitor_featured_metabox->add_group_field( $exhibitor_featured, array(
    'name' => __( 'Image', 'cmb2' ),
    'id'   => 'image',
    'type' => 'file',
  ) );


// EVENT

  $event_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'event_metabox',
    'title'         => __( 'Event Options', 'cmb2' ),
    'object_types'  => array( 'event', ), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $event_metabox->add_field( array(
    'name'     => __( 'Location', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'event_location',
    'type'     => 'textarea_small',
  ) );

  $event_metabox->add_field( array(
    'name' => __( 'Start', 'cmb2' ),
    'desc' => __( 'Date / Time of event start', 'cmb2' ),
    'id'   => $prefix . 'event_start',
    'type' => 'text_datetime_timestamp',
  ) );

  $event_metabox->add_field( array(
    'name' => __( 'End', 'cmb2' ),
    'desc' => __( 'Date / Time of event end', 'cmb2' ),
    'id'   => $prefix . 'event_end',
    'type' => 'text_datetime_timestamp',
  ) );

  $event_metabox->add_field( array(
    'name'     => __( 'External link', 'cmb2' ),
    'desc'     => __( 'FB event?', 'cmb2' ),
    'id'       => $prefix . 'event_url',
    'type'     => 'text_url',
  ) );

  $event_metabox->add_field( array(
    'name'    => __( 'RSVP info', 'cmb2' ),
    'desc'    => __( '', 'cmb2' ),
    'id'      => $prefix . 'event_rsvp',
    'type'    => 'wysiwyg',
    'options' => array( 'textarea_rows' => 3, ),
  ) );

// PRESS
  
  $press_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'press_metabox',
    'title'         => __( 'Press Options', 'cmb2' ),
    'object_types'  => array( 'press', ), // Post type
    // 'show_on_cb' => 'yourprefix_show_if_front_page', // function should return a bool value
    // 'context'    => 'normal',
    // 'priority'   => 'high',
    // 'show_names' => true, // Show field names on the left
    // 'cmb_styles' => false, // false to disable the CMB stylesheet
    // 'closed'     => true, // true to keep the metabox closed by default
  ) );

  $press_metabox->add_field( array(
    'name'     => __( 'Author', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'press_author',
    'type'     => 'text_medium',
  ) );

  $press_metabox->add_field( array(
    'name'     => __( 'Publication', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'press_publication',
    'type'     => 'text_medium',
  ) );

  $press_metabox->add_field( array(
    'name'     => __( 'Article URL', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'press_url',
    'type'     => 'text_url',
  ) );

  $press_metabox->add_field( array(
    'name' => __( 'Date published', 'cmb2' ),
    'desc' => __( '', 'cmb2' ),
    'id'   => $prefix . 'press_date',
    'type' => 'text_date_timestamp',
    // 'timezone_meta_key' => $prefix . 'timezone', // Optionally make this field honor the timezone selected in the select_timezone specified above
  ) );

}
?>
