<?php

$prefix = '_igv_';

// Get year options
function get_fair_year_options() {
  $first_year = '2014';
  $next_year = date('Y') + 1;

  $year_options = array();

  for ($i = $next_year; $i >= $first_year; $i--) {
    $year_options[ $i ] = $i;
  }

  return $year_options;
}

// PROGRAM

$page_key = $prefix . 'page_options';
$page_title = 'Page Options';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name'       => __( 'Current Fair Year', 'cmb2' ),
      'desc'       => __( '', 'cmb2' ),
      'id'         => $prefix . 'current_fair_year',
      'type'       => 'select',
      'show_option_none' => false,
      'options'          => get_fair_year_options(), 
    ),
    array(
      'name' => __( 'Program', 'cmb2' ),
      'id'   => $prefix . 'program_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Publish Program', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_program',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Program Temporary Text', 'IGV' ),
      'id'   => $prefix . 'program_temp_text',
      'type' => 'textarea',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
    ),
    array(
      'name' => __( 'Program Page Text', 'IGV' ),
      'id'   => $prefix . 'program_page_text_en',
      'type' => 'textarea',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
    ),
    array(
      'name' => __( 'Exhibitors', 'cmb2' ),
      'id'   => $prefix . 'exhbitors_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Publish Exhibitors', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_exhibitors',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Exhibitors Temporary Text', 'IGV' ),
      'id'   => $prefix . 'exhibitors_temp_text',
      'type' => 'textarea',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
    ),
    array(
      'name' => __( 'Exhibitors Page Text', 'IGV' ),
      'id'   => $prefix . 'exhibitors_page_text',
      'type' => 'textarea',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
    ),
    array(
      'name' => __( 'Fair History', 'cmb2' ),
      'id'   => $prefix . 'fair_history_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Fair History', 'cmb2' ),
      'id'   => $prefix . 'fair_history',
      'type' => 'textarea',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
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
          'name'       => __( 'Bio', 'cmb2' ),
          'id'         => 'bio',
          'type'       => 'textarea_small',
          'attributes' => array(
            'class' => 'cmb2-qtranslate'
          )
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
