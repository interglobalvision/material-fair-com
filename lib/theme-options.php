<?php
$prefix = '_igv_';
$suffix = '_options';

// SITE OPTIONS

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
      'desc' => __( 'used sitewide', 'cmb2' ),
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
      'id'   => $prefix . 'exhibitors_temp_text_es',
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
          'id'         => 'day_en',
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


// VISITOR INFO

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
