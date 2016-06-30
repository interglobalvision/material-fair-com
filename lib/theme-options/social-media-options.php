<?php

$prefix = '_igv_';
$suffix = '_options';

// SOCIAL MEDIA 

$page_key = $prefix . 'social' . $suffix;
$page_title = 'Social Media';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Facebook Page URL', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $prefix . 'socialmedia_facebook_url',
      'default' => 'https://www.facebook.com/materialfair',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Twitter Account Handle', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $prefix . 'socialmedia_twitter',
      'default' => 'MaterialFair',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Instagram Account Handle', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $prefix . 'socialmedia_instagram',
      'default' => 'materialfair',
      'type' => 'text',
    ),

    // METADATA OPTIONS

    array(
      'name' => __( 'Metadata options', 'cmb2' ),
      'desc' => __( 'Settings relating to open graph, facebook and twitter sharing, and other social media metadata', 'cmb2' ),
      'id'   => $prefix . 'og_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Open Graph image', 'IGV' ),
      'desc' => __( 'primarily displayed on Facebook, but other locations as well', 'IGV' ),
      'id'   => $prefix . 'og_image',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Logo', 'IGV' ),
      'desc' => __( '(options) ', 'IGV' ),
      'id'   => $prefix . 'metadata_logo',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Facebook App ID', 'IGV' ),
      'desc' => __( '(optional)', 'IGV' ),
      'id'   => $prefix . 'og_fb_app_id',
      'type' => 'text',
    )
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
