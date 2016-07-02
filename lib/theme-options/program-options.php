<?php

$prefix = '_igv_';
$suffix = '_options';

// PROGRAM

$page_key = $prefix . 'program' . $suffix;
$page_title = 'Program Options';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Publish Program', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_program',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Program Temporary Text', 'IGV' ),
      'desc' => __( 'Temporary intro text to encourage applications. Appears on front page "Program" section. Before publication.', 'IGV' ),
      'id'   => $prefix . 'program_temp_text_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'English', 'IGV' ),
      'id'   => $prefix . 'program_temp_text_en',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Español', 'IGV' ),
      'id'   => $prefix . 'program_temp_text_es',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Program Page Text', 'IGV' ),
      'desc' => __( 'Appears on "Program" page above listing of events.', 'IGV' ),
      'id'   => $prefix . 'program_page_text_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'English', 'IGV' ),
      'id'   => $prefix . 'program_page_text_en',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Español', 'IGV' ),
      'id'   => $prefix . 'program_page_text_es',
      'type' => 'textarea',
    )
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
