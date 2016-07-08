<?php

$prefix = '_igv_';

// VISITOR INFO

$page_key = $prefix . 'visitor_options';
$page_title = 'Visitor Info';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Venue Address', 'cmb2' ),
      'id'   => $prefix . 'venue_address',
      'type' => 'textarea',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
    ),
    array(
      'name' => __( 'Visitor Info Introduction Text', 'cmb2' ),
      'id'   => $prefix . 'visitor_info_page_text',
      'description' => 'Description of the fair'
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 10, 
        'editor_class' => 'cmb2-qtranslate',
        'media_buttons' => false,
      ),
    ),
    array(
      'name' => __( 'Visitor Info Introduction Image', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'visitor_info_page_image',
      'type' => 'file',
    ),
    array(
      'name' => __( 'How to Arrive', 'cmb2' ),
      'id'   => $prefix . 'how_to_arrive',
      'description' => 'Wrap methods (Metro, Ecobici, etc) in Heading 4 (H4 tags)',
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 10, 
        'editor_class' => 'cmb2-qtranslate',
        'media_buttons' => false,
      ),
    ),
    array(
      'name' => __( 'Venue Map Embed', 'cmb2' ),
      'description' => __( 'Paste Google Maps iframe embed.', 'cmb2' ),
      'id'   => $prefix . 'venue_map',
      'type' => 'textarea_code',

    ),
    array(
      'name' => __( 'Ticket Info', 'cmb2' ),
      'id'          => $prefix . 'ticket_info',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Class {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Class', 'cmb2' ),
        'remove_button' => __( 'Remove Class', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
      'fields'      => array(
        array(
          'name'       => __( 'Class', 'cmb2' ),
          'id'         => 'class',
          'type'       => 'text_medium',
          'attributes' => array(
            'class' => 'cmb2-qtranslate'
          )
        ),
        array(
          'name'       => __( 'Price', 'cmb2' ),
          'id'         => 'price',
          'type'       => 'text',
          'attributes' => array(
            'class' => 'cmb2-qtranslate'
          )
        ),
      )
    ),
    array(
      'name'        => __( 'Schedule', 'cmb2' ),
      'id'          => $prefix . 'schedule',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Day {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Day', 'cmb2' ),
        'remove_button' => __( 'Remove Day', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
      'fields'      => array(
        array(
          'name'       => __( 'Day', 'cmb2' ),
          'id'         => 'date',
          'type'       => 'text_date_timestamp',
        ),
        array(
          'name'       => __( 'Schedule', 'cmb2' ),
          'id'         => 'schedule',
          'type'       => 'textarea_small',
          'attributes' => array(
            'class' => 'cmb2-qtranslate'
          )
        )
      )
    )
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
