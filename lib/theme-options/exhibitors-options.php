<?php

$prefix = '_igv_';
$suffix = '_options';

// EXHIBITORS

$page_key = $prefix . 'exhibitors' . $suffix;
$page_title = 'Exhibitors Options';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Publish Exhibitors', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_exhibitors',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Exhibitors Temporary Text', 'IGV' ),
      'desc' => __( 'Temporary intro text to encourage applications. Appears on front page "Exhibitors" section. Before publication.', 'IGV' ),
      'id'   => $prefix . 'exhibitors_temp_text_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'English', 'IGV' ),
      'id'   => $prefix . 'exhibitors_temp_text_en',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Español', 'IGV' ),
      'id'   => $prefix . 'exhibitors_temp_text_es',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Exhibitors Page Text', 'IGV' ),
      'desc' => __( 'Appears on "Exhibitors" page above listing of exhibitors.', 'IGV' ),
      'id'   => $prefix . 'exhibitors_page_text_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'English', 'IGV' ),
      'id'   => $prefix . 'exhibitors_page_text_en',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Español', 'IGV' ),
      'id'   => $prefix . 'exhibitors_page_text_es',
      'type' => 'textarea',
    )
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
