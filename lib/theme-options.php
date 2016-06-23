<?php

/**
 * CMB2 Theme Options
 * @version 0.1.0
 */
class IGV_Admin {

  /**
    * Option key, and option page slug
    * @var string
    */
  private $key = 'IGV_options';

  /**
    * Option prefix
    * @var string
    */
  private $prefix = '_igv_';

  /**
    * Options page metabox id
    * @var string
    */
  private $metabox_id = 'IGV_option_metabox';

  /**
   * Options Page title
   * @var string
   */
  protected $title = 'Site Options';

  /**
   * Options Page hook
   * @var string
   */
  protected $options_page = '';

  /**
   * Constructor
   * @since 0.1.0
   */
  public function __construct() {
    // Set our title
    $this->title = __( 'Site Options', 'IGV' );
  }

  /**
   * Initiate our hooks
   * @since 0.1.0
   */
  public function hooks() {
    add_action( 'admin_init', array( $this, 'init' ) );
    add_action( 'admin_menu', array( $this, 'add_options_page' ) );
    add_action( 'cmb2_init', array( $this, 'add_options_page_metabox' ) );
  }


  /**
   * Register our setting to WP
   * @since  0.1.0
   */
  public function init() {
    register_setting( $this->key, $this->key );
  }

  /**
   * Add menu options page
   * @since 0.1.0
   */
  public function add_options_page() {
    $this->options_page = add_menu_page( $this->title, $this->title, 'manage_options', $this->key, array( $this, 'admin_page_display' ) );
  }

  /**
   * Admin page markup. Mostly handled by CMB2
   * @since  0.1.0
   */
  public function admin_page_display() {
    ?>
    <div class="wrap cmb2-options-page <?php echo $this->key; ?>">
      <h2><?php echo esc_html( get_admin_page_title() ); ?></h2>
      <?php cmb2_metabox_form( $this->metabox_id, $this->key ); ?>
    </div>
    <?php
  }

  /**
   * Add the options metabox to the array of metaboxes
   * @since  0.1.0
   */
  function add_options_page_metabox() {

    $options_metabox = new_cmb2_box( array(
      'id'      => $this->metabox_id,
      'hookup'  => false,
      'show_on' => array(
        // These are important, don't remove
        'key'   => 'options-page',
        'value' => array( $this->key, )
      ),
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Fair Venue Name', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'venue_name',
      'type' => 'text',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Fair Start Date', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'fair_start',
      'type' => 'text_date_timestamp',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Fair End Date', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'fair_end',
      'type' => 'text_date_timestamp',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Primary Sponsor Logo', 'IGV' ),
      'desc' => __( 'displayed in header', 'IGV' ),
      'id'   => $this->prefix . 'primary_sponsor_logo',
      'type' => 'file',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Primary Sponsor URL', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'primary_sponsor_url',
      'type' => 'text_url',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Show VIP Login', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'show_vip_login',
      'type' => 'checkbox',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'App Login Button Text', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'app_login_text',
      'type' => 'text',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Publish Exhibitors', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_exhibitors',
      'type' => 'checkbox',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Publish Program', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_program',
      'type' => 'checkbox',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Show Reading Material', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'show_reading_material',
      'type' => 'checkbox',
    ) );

    // SOCIAL MEDIA OPTIONS

    $options_metabox->add_field( array(
      'name' => __( 'Social Media', 'cmb2' ),
      'desc' => __( 'urls and accounts for different social media platforms. For use in menus and metadata', 'cmb2' ),
      'id'   => $this->prefix . 'socialmedia_title',
      'type' => 'title',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Facebook Page URL', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $this->prefix . 'socialmedia_facebook_url',
      'type' => 'text',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Twitter Account Handle', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $this->prefix . 'socialmedia_twitter',
      'type' => 'text',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Instagram Account Handle', 'IGV' ),
      'desc' => __( '', 'IGV' ),
      'id'   => $this->prefix . 'socialmedia_instagram',
      'type' => 'text',
    ) );

    // METADATA OPTIONS

    $options_metabox->add_field( array(
      'name' => __( 'Metadata options', 'cmb2' ),
      'desc' => __( 'Settings relating to open graph, facebook and twitter sharing, and other social media metadata', 'cmb2' ),
      'id'   => $this->prefix . 'og_title',
      'type' => 'title',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Open Graph image', 'IGV' ),
      'desc' => __( 'primarily displayed on Facebook, but other locations as well', 'IGV' ),
      'id'   => $this->prefix . 'og_image',
      'type' => 'file',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Logo', 'IGV' ),
      'desc' => __( '(options) ', 'IGV' ),
      'id'   => $this->prefix . 'metadata_logo',
      'type' => 'file',
    ) );

    $options_metabox->add_field( array(
      'name' => __( 'Facebook App ID', 'IGV' ),
      'desc' => __( '(optional)', 'IGV' ),
      'id'   => $this->prefix . 'og_fb_app_id',
      'type' => 'text',
    ) );


  // PARTNERS

    $options_metabox->add_field( array(
      'name' => __( 'Partners', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $this->prefix . 'partners_title',
      'type' => 'title',
    ) );

    $partners_group = $options_metabox->add_field( array(
      'id'          => $this->prefix . 'partners',
      'type'        => 'group',
      'description' => __( '', 'cmb2' ),
      'options'     => array(
        'group_title'   => __( 'Partner {#}', 'cmb2' ), // {#} gets replaced by row number
        'add_button'    => __( 'Add Another Partner', 'cmb2' ),
        'remove_button' => __( 'Remove Partner', 'cmb2' ),
        'sortable'      => true, // beta
        // 'closed'     => true, // true to have the groups closed by default
      ),
    ) );

    $options_metabox->add_group_field( $partners_group, array(
      'name'       => __( 'URL', 'cmb2' ),
      'id'         => 'url',
      'type'       => 'text_url',
    ) );

    $options_metabox->add_group_field( $partners_group, array(
      'name' => __( 'Logo', 'cmb2' ),
      'id'   => 'logo',
      'type' => 'file',
    ) );

  }

  /**
   * Public getter method for retrieving protected/private variables
   * @since  0.1.0
   * @param  string  $field Field to retrieve
   * @return mixed          Field value or exception is thrown
   */
  public function __get( $field ) {
    // Allowed fields to retrieve
    if ( in_array( $field, array( 'key', 'metabox_id', 'title', 'options_page' ), true ) ) {
      return $this->{$field};
    }

    throw new Exception( 'Invalid property: ' . $field );
  }

}

/**
 * Helper function to get/return the IGV_Admin object
 * @since  0.1.0
 * @return IGV_Admin object
 */
function IGV_admin() {
  static $object = null;
  if ( is_null( $object ) ) {
    $object = new IGV_Admin();
    $object->hooks();
  }

  return $object;
}

/**
 * Wrapper function around cmb2_get_option
 * @since  0.1.0
 * @param  string  $key Options array key
 * @return mixed        Option value
 */
function IGV_get_option( $key = '' ) {
  return cmb2_get_option( IGV_admin()->key, $key );
}

// Get it started
IGV_admin();
