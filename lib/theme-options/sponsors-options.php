<?php

$prefix = '_igv_';
$suffix = '_options';

// SPONSORS

$page_key = $prefix. 'sponsors' . $suffix;
$page_title = 'Sponsors';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Primary Sponsor Logo', 'IGV' ),
      'desc' => __( 'displayed in header', 'IGV' ),
      'id'   => $prefix . 'primary_sponsor_logo',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Primary Sponsor URL', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'primary_sponsor_url',
      'type' => 'text_url',
    ),
    array(
      'name' => __( 'Lead Sponsors', 'cmb2' ),
      'id'   => $prefix . 'sponsors_title',
      'type' => 'title',
    ),
    array(
      'id'          => $prefix . 'sponsors_group',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Lead Sponsor {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Lead Sponsor', 'cmb2' ),
        'remove_button' => __( 'Remove Lead Sponsor', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
      'fields'      => array(
        array(
          'name'       => __( 'Logo', 'cmb2' ),
          'id'         => 'logo',
          'type'       => 'file',
        ),
        array(
          'name'       => __( 'URL', 'cmb2' ),
          'id'         => 'url',
          'type'       => 'text_url',
        )
      )
    ), 
    array(
      'name' => __( 'Partners', 'cmb2' ),
      'id'   => $prefix . 'partners_title',
      'type' => 'title',
    ),
    array(
      'id'          => $prefix . 'partners_group',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Partner {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Partner', 'cmb2' ),
        'remove_button' => __( 'Remove Partner', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
      'fields'      => array(
        array(
          'name'       => __( 'Logo', 'cmb2' ),
          'id'         => 'logo',
          'type'       => 'file',
        ),
        array(
          'name'       => __( 'URL', 'cmb2' ),
          'id'         => 'url',
          'type'       => 'text_url',
        )
      )
    )    
  )
);

// Get it started
IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
