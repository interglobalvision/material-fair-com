<?php

$prefix = '_igv_';
$suffix = '_options';

// Fair History INFO

$page_key = $prefix . 'fair_history' . $suffix;
$page_title = 'Fair History / Organizers';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Fair History (English)', 'cmb2' ),
      'id'   => $prefix . 'fair_history_en',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Fair History (Español)', 'cmb2' ),
      'id'   => $prefix . 'fair_history_es',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Organizers', 'cmb2' ),
      'id'   => $prefix . 'organizers_title',
      'type' => 'title',
    ),
    array(
      'id'          => $prefix . 'organizers_group',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Organizer {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Organizer', 'cmb2' ),
        'remove_button' => __( 'Remove Organizer', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
      'fields'      => array(
        array(
          'name'       => __( 'Name', 'cmb2' ),
          'id'         => 'name',
          'type'       => 'text',
        ),
        array(
          'name'       => __( 'Bio (English)', 'cmb2' ),
          'id'         => 'bio_en',
          'type'       => 'textarea_small',
        ),
        array(
          'name'       => __( 'Bio (Español)', 'cmb2' ),
          'id'         => 'bio_es',
          'type'       => 'textarea_small',
        ),
        array(
          'name'       => __( 'Photo', 'cmb2' ),
          'id'         => 'photo',
          'type'       => 'file',
        ),
      )
    ),
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
