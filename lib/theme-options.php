<?php
$prefix = '_igv_';

// SITE OPTIONS

$page_key = $prefix . 'theme_options';
$page_id = $prefix . 'theme_options_page';
$page_title = 'Site Options';
$metabox = array(
  'id'         => $page_id, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_id ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Fair Venue Name', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'venue_name',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Fair Start Date', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'fair_start',
      'type' => 'text_date_timestamp',
    ),
    array(
      'name' => __( 'Fair End Date', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'fair_end',
      'type' => 'text_date_timestamp',
    ),
    array(
      'name' => __( 'Show VIP Login', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'show_vip_login',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'App Login Button Text', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'app_login_text',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Publish Exhibitors', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_exhibitors',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Publish Program', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_program',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Show Reading Material', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'show_reading_material',
      'type' => 'checkbox',
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

IGV_init_options_page($page_id, $page_id, $page_title, $metabox);


// SPONSORS

$page_key = $prefix. 'sponsors_options';
$page_id = $prefix . 'sponsors_options_page';
$page_title = 'Sponsors';
$metabox = array(
  'id'         => $page_id, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_id ), ), //value must be same as id
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
IGV_init_options_page($page_key, $page_id, $page_title, $metabox);


// SOCIAL MEDIA 

$page_key = $prefix . 'social_options';
$page_id = $prefix . 'social_options_page';
$page_title = 'Social Media';
$metabox = array(
  'id'         => $page_id, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_id ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Facebook Page URL', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $prefix . 'socialmedia_facebook_url',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Twitter Account Handle', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $prefix . 'socialmedia_twitter',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Instagram Account Handle', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $prefix . 'socialmedia_instagram',
      'type' => 'text',
    )
  )
);

IGV_init_options_page($page_id, $page_id, $page_title, $metabox);
