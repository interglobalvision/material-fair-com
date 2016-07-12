<?php

$prefix = '_igv_';

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
      'name' => __( 'Program Introduction Image', 'IGV' ),
      'desc' => __( 'Appears next to introduction on main Exhibitors page.', 'cmb2' ),
      'id'   => $prefix . 'program_page_image',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Program Introduction Text', 'IGV' ),
      'id'   => $prefix . 'program_page_text',
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 6, 
        'editor_class' => 'cmb2-qtranslate'
      ),
    ),
    array(
      'name' => __( 'Exhibitors', 'cmb2' ),
      'id'   => $prefix . 'exhbitors_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Publish Committee', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_committee',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Publish Exhibitors', 'cmb2' ),
      'desc' => __( '', 'cmb2' ),
      'id'   => $prefix . 'publish_exhibitors',
      'type' => 'checkbox',
    ),
    array(
      'name' => __( 'Exhibitors Apply Text', 'IGV' ),
      'id'   => $prefix . 'exhibitors_apply_text',
      'desc' => __( 'To encourage exhibitors to apply.', 'cmb2' ),
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 6, 
        'editor_class' => 'cmb2-qtranslate'
      ),
    ),
    array(
      'name' => __( 'Exhibitors Introduction Image', 'IGV' ),
      'desc' => __( 'Appears next to introduction on main Exhibitors page.', 'cmb2' ),
      'id'   => $prefix . 'exhibitors_page_image',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Exhibitors Introduction Text', 'IGV' ),
      'desc' => __( 'Appears on main exhibitors page.', 'cmb2' ),
      'id'   => $prefix . 'exhibitors_page_text',
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 6, 
        'editor_class' => 'cmb2-qtranslate'
      ),
    ),
    array(
      'name' => __( 'Press', 'cmb2' ),
      'id'   => $prefix . 'press_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Press Introduction Image', 'IGV' ),
      'desc' => __( 'Appears next to introduction on Press page.', 'cmb2' ),
      'id'   => $prefix . 'press_page_image',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Press Introduction Text', 'IGV' ),
      'desc' => __( 'Appears on Press page.', 'cmb2' ),
      'id'   => $prefix . 'press_page_text',
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 6, 
        'editor_class' => 'cmb2-qtranslate'
      ),
    ),
    array(
      'name' => __( 'Press Accreditation Text', 'IGV' ),
      'desc' => __( 'Appears on Press page below introduction.', 'cmb2' ),
      'id'   => $prefix . 'press_accreditation_text',
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 4, 
        'editor_class' => 'cmb2-qtranslate'
      ),
    ),
    array(
      'name' => __( 'Fair History', 'cmb2' ),
      'id'   => $prefix . 'fair_history_title',
      'type' => 'title',
    ),
    array(
      'name' => __( 'Fair History Headline', 'cmb2' ),
      'id'   => $prefix . 'fair_history_headline',
      'type' => 'textarea_small',
      'attributes' => array(
        'class' => 'cmb2-qtranslate'
      )
    ),
    array(
      'name' => __( 'Fair History Image', 'cmb2' ),
      'id'   => $prefix . 'fair_history_image',
      'type' => 'file',
    ),
    array(
      'name' => __( 'Fair History', 'cmb2' ),
      'id'   => $prefix . 'fair_history',
      'type' => 'wysiwyg',
      'options' => array( 
        'textarea_rows' => 20, 
        'editor_class' => 'cmb2-qtranslate',
        'media_buttons' => false,
      ),
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
          'description' => 'Square crop',
          'id'         => 'photo',
          'type'       => 'file',
        ),
      )
    ),
  )
);

IGV_init_options_page($page_key, $page_key, $page_title, $metabox);
