<?php

$prefix = '_igv_';
$suffix = '_options';

// VISITOR INFO

$page_key = $prefix . 'visitor_info' . $suffix;
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
    ),
    array(
      'name' => __( 'How to Arrive (English)', 'cmb2' ),
      'id'   => $prefix . 'how_to_arrive_en',
      'type' => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ),
    array(
      'name' => __( 'How to Arrive (Español)', 'cmb2' ),
      'id'   => $prefix . 'how_to_arrive_es',
      'type' => 'wysiwyg',
      'options' => array( 'textarea_rows' => 5, ),
    ),
    array(
      'name' => __( 'Venue Map Embed URL', 'cmb2' ),
      'description' => __( 'Google maps', 'cmb2' ),
      'id'   => $prefix . 'venue_map_url',
      'type' => 'text_url',
    ),
    array(
      'name' => __( 'Ticket Info', 'cmb2' ),
      'id'   => $prefix . 'ticket_info_title',
      'type' => 'title',
    ),
    array(
      'id'          => $prefix . 'ticket_info',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Group {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Group', 'cmb2' ),
        'remove_button' => __( 'Remove Group', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
      'fields'      => array(
        array(
          'name'       => __( 'Group (English)', 'cmb2' ),
          'id'         => 'group_en',
          'type'       => 'text',
        ),
        array(
          'name'       => __( 'Group (Español)', 'cmb2' ),
          'id'         => 'group_es',
          'type'       => 'text',
        ),
        array(
          'name'       => __( 'Price (English)', 'cmb2' ),
          'id'         => 'price_en',
          'type'       => 'text',
        ),
        array(
          'name'       => __( 'Price (Español)', 'cmb2' ),
          'id'         => 'price_es',
          'type'       => 'text',
        ),
      )
    ),
    array(
      'name' => __( 'Schedule', 'cmb2' ),
      'id'   => $prefix . 'schedule_title',
      'type' => 'title',
    ),
    array(
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
          'name'       => __( 'Schedule (English)', 'cmb2' ),
          'id'         => 'schedule_en',
          'type'       => 'textarea_small',
        ),
        array(
          'name'       => __( 'Schedule (Español)', 'cmb2' ),
          'id'         => 'schedule_es',
          'type'       => 'textarea_small',
        )
      )
    )
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
