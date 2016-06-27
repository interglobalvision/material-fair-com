<?php
// SITE OPTIONS
$prefix = '_igv_';
$suffix = '_options';

$page_key = $prefix . 'site' . $suffix;
$page_title = 'Site Options';
$metabox = array(
  'id'         => $page_key, //id used as tab page slug, must be unique
  'title'      => $page_title,
  'show_on'    => array( 'key' => 'options-page', 'value' => array( $page_key ), ), //value must be same as id
  'show_names' => true,
  'fields'     => array(
    array(
      'name' => __( 'Header', 'cmb2' ),
      'id'   => $prefix . 'header_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Fair Venue Name', 'cmb2' ),
      'desc' => __( 'Used sitewide', 'cmb2' ),
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
      'name' => __( 'App Login Button Text (English)', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'app_login_text_en',
      'type' => 'text',
    ),
    array(
      'name' => __( 'App Login Button Text (Español)', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'app_login_text_es',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Front Page', 'cmb2' ),
      'id'   => $prefix . 'front_page_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Splash image', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'front_page_splash',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Splash link', 'cmb2' ),
      'desc' => __( 'optional', 'cmb2' ),
      'id'   => $prefix . 'front_page_splash_url',
      'type' => 'text_url',
    ),
    array(
      'name' => __( 'Show Reading Material', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'show_reading_material',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Front Page Headline (English)', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'front_headline_en',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Front Page Headline (Español)', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'front_headline_es',
      'type' => 'text',
    ),
    array(
      'name' => __( 'Front Page Description (English)', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'front_description_en',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Front Page Description (Español)', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'front_description_es',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Footer', 'cmb2' ),
      'id'   => $prefix . 'footer_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Office Address', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'office_address',
      'type' => 'textarea',
    ),
    array(
      'name' => __( 'Contact Email', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'contact_email',
      'type' => 'text_email',
    ),
    array(
      'name' => __( 'Contact Phone', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'contact_phone',
      'type' => 'text_medium',
    ),
    array(
      'name' => __( 'Mailchimp Embed URL', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'mailchimp_url',
      'type' => 'text_url',
    ),
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);