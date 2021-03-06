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

// POST

  $post_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'post_metabox',
    'title'         => __( 'Post Options', 'cmb2' ),
    'object_types'  => array( 'post', ), // Post type
  ) );

  $post_metabox->add_field( array(
    'name'     => __( 'Highlight', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'post_highlight',
    'type'     => 'checkbox',
  ) );

// EXHIBITOR

  $exhibitor_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'exhibitor_metabox',
    'title'         => __( 'Exhibitor Options', 'cmb2' ),
    'object_types'  => array( 'exhibitor', ), // Post type
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
    'name'     => __( 'City', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'exhibitor_city',
    'type'     => 'text',
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
  ) );

  $exhibitor_metabox->add_field( array(
    'name'     => __( 'Address', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'exhibitor_address',
    'type'     => 'textarea_small',
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
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
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
  ) );

    // EXHIBITOR ARTISTS

  $exhibitor_artists_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'exhibitor_artists_metabox',
    'title'         => __( 'Artists Exhibiting', 'cmb2' ),
    'object_types'  => array( 'exhibitor', ), // Post type
  ) );

  $exhibitor_artists_metabox->add_field( array(
    'name'     => __( '', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'exhibitor_artists_exhibiting',
    'type'     => 'text',
    'repeatable'     => true,
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
    'name'        => __( 'Title, Year', 'cmb2' ),
    'description' => __( '', 'cmb2' ),
    'id'          => 'title',
    'type'        => 'text_medium',
  ) );

  $exhibitor_featured_metabox->add_group_field( $exhibitor_featured, array(
    'name'        => __( 'Description', 'cmb2' ),
    'description' => __( 'Materials, Dimensions', 'cmb2' ),
    'id'          => 'description',
    'type'        => 'textarea_small',
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
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
  ) );

  $event_metabox->add_field( array(
    'name'     => __( 'Highlight', 'cmb2' ),
    'desc'     => __( 'Appears on Front Page and Program page highlights', 'cmb2' ),
    'id'       => $prefix . 'event_highlight',
    'type'     => 'checkbox',
  ) );

  $event_metabox->add_field( array(
    'name'     => __( 'Public Event', 'cmb2' ),
    'desc'     => __( 'Appears on Program page', 'cmb2' ),
    'id'       => $prefix . 'event_public',
    'type'     => 'checkbox',
  ) );

  $event_metabox->add_field( array(
    'name'     => __( 'VIP Event', 'cmb2' ),
    'desc'     => __( 'Appears on VIP page', 'cmb2' ),
    'id'       => $prefix . 'event_vip',
    'type'     => 'checkbox',
  ) );

  $event_metabox->add_field( array(
    'name'     => __( 'Event Type (at Venue)', 'cmb2' ),
    'desc'     => __( '', 'cmb2' ),
    'id'       => $prefix . 'event_location',
    'type'     => 'text',
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
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

// PRESS

  $press_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'press_metabox',
    'title'         => __( 'Press Options', 'cmb2' ),
    'object_types'  => array( 'press', ), // Post type
  ) );

  $press_metabox->add_field( array(
    'name'     => __( 'Highlight', 'cmb2' ),
    'desc'     => __( 'Appears on Front Page and Press page highlights', 'cmb2' ),
    'id'       => $prefix . 'press_highlight',
    'type'     => 'checkbox',
  ) );

  $press_metabox->add_field( array(
    'name'     => __( 'English', 'cmb2' ),
    'desc'     => __( 'Appears on English site', 'cmb2' ),
    'id'       => $prefix . 'press_lang_en',
    'type'     => 'checkbox',
  ) );

  $press_metabox->add_field( array(
    'name'     => __( 'Español', 'cmb2' ),
    'desc'     => __( 'Appears on Español site', 'cmb2' ),
    'id'       => $prefix . 'press_lang_es',
    'type'     => 'checkbox',
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

// VIP

  $vip_metabox = new_cmb2_box( array(
    'id'            => $prefix . 'vip_metabox',
    'title'         => __( 'VIP Options', 'cmb2' ),
    'object_types' => array( 'page' ), // post type
    'show_on'      => array( 'key' => 'id', 'value' => array( get_id_by_slug('vip'), ) ),
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'VIP login page text', 'cmb2' ),
    'desc'    => __( '', 'cmb2' ),
    'id'      => $prefix . 'vip_login_intro',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 6,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'VIP RSVP text', 'cmb2' ),
    'desc'    => __( '', 'cmb2' ),
    'id'      => $prefix . 'vip_rsvp_text',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 3,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_hotels = $vip_metabox->add_field( array(
    'name'    => __( 'VIP Accomodations', 'cmb2' ),
    'id'          => $prefix . 'vip_hotels',
    'type'        => 'group',
    'description' => __( '', 'cmb2' ),
    'options'     => array(
      'group_title'   => __( 'Hotel {#}', 'cmb2' ), // {#} gets replaced by row number
      'add_button'    => __( 'Add Another Hotel', 'cmb2' ),
      'remove_button' => __( 'Remove Hotel', 'cmb2' ),
      'sortable'      => true, // beta
      // 'closed'     => true, // true to have the groups closed by default
    ),
  ) );

  $vip_metabox->add_group_field( $vip_hotels, array(
    'name' => __( 'Image', 'cmb2' ),
    'id'   => 'image',
    'type' => 'file',
  ) );

  $vip_metabox->add_group_field( $vip_hotels, array(
    'name'     => __( 'Hotel Name', 'cmb2' ),
    'id'       => 'name',
    'type'     => 'text_medium',
    'attributes' => array(
      'class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_metabox->add_group_field( $vip_hotels, array(
    'name'    => __( 'Hotel Text English', 'cmb2' ),
    'id'      => 'text_en',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 6,
    )
  ) );

  $vip_metabox->add_group_field( $vip_hotels, array(
    'name'    => __( 'Hotel Text Español', 'cmb2' ),
    'id'      => 'text_es',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 6,
    )
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'Museums', 'cmb2' ),
    'desc'    => __( 'VIP Recommendations, (Colonia: Heading 3, Item: Heading 4, Sub-item: Bold)', 'cmb2' ),
    'id'      => $prefix . 'vip_museums',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 10,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'Galleries / Project Spaces', 'cmb2' ),
    'desc'    => __( 'VIP Recommendations, (Colonia: Heading 3, Item: Heading 4, Sub-item: Bold)', 'cmb2' ),
    'id'      => $prefix . 'vip_galleries',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 10,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'Restaurants / Bars', 'cmb2' ),
    'desc'    => __( 'VIP Recommendations, (Colonia: Heading 3, Item: Heading 4, Sub-item: Bold)', 'cmb2' ),
    'id'      => $prefix . 'vip_restaurants',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 10,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'Other', 'cmb2' ),
    'desc'    => __( 'VIP Recommendations, (Colonia: Heading 3, Item: Heading 4, Sub-item: Bold)', 'cmb2' ),
    'id'      => $prefix . 'vip_other',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 10,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

  $vip_metabox->add_field( array(
    'name'    => __( 'Sponsors', 'cmb2' ),
    'desc'    => __( 'VIP Sponsors', 'cmb2' ),
    'id'      => $prefix . 'vip_sponsors_text',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 3,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );


  $vip_metabox->add_field( array(
    'name'    => __( 'Contacts', 'cmb2' ),
    'desc'    => __( 'VIP Contacts', 'cmb2' ),
    'id'      => $prefix . 'vip_contacts',
    'type'    => 'wysiwyg',
    'options' => array(
      'media_buttons' => false,
      'textarea_rows' => 6,
      'editor_class' => 'cmb2-qtranslate'
    )
  ) );

}
?>
