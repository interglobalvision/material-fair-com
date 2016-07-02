<?php
get_header();

// Splash
$splash_id = IGV_get_option('_igv_site_options', '_igv_front_page_splash_id');
$splash_link = IGV_get_option('_igv_site_options', '_igv_front_page_splash_url');

// Intro
$headline_en = IGV_get_option('_igv_site_options', '_igv_front_headline_en');
$headline_es = IGV_get_option('_igv_site_options', '_igv_front_headline_es');
$intro_en = IGV_get_option('_igv_site_options', '_igv_front_description_en');
$intro_es = IGV_get_option('_igv_site_options', '_igv_front_description_es');

// Visitor Info
$schedule = IGV_get_option('_igv_visitor_info_options', '_igv_schedule');
$tickets = IGV_get_option('_igv_visitor_info_options', '_igv_ticket_info');
$venue_name = IGV_get_option('_igv_site_options', '_igv_venue_name');
$venue_address = IGV_get_option('_igv_visitor_info_options', '_igv_venue_address');

// Exhibitors
$publish_exhibitors = IGV_get_option('_igv_exhibitors_options', '_igv_publish_exhibitors');

$exhibitors_text_en = IGV_get_option('_igv_exhibitors_options', '_igv_exhibitors_temp_text_en');
$exhibitors_text_es = IGV_get_option('_igv_exhibitors_options', '_igv_exhibitors_temp_text_es');

$apply_url = IGV_get_option('_igv_site_options', '_igv_apply_url');
$apply_end = IGV_get_option('_igv_site_options', '_igv_apply_end');

// Program
$publish_program = IGV_get_option('_igv_program_options', '_igv_publish_program');

$program_image = IGV_get_option('_igv_program_options', '_igv_program_image');

$program_text_en = IGV_get_option('_igv_program_options', '_igv_program_temp_text_en');
$program_text_es = IGV_get_option('_igv_program_options', '_igv_program_temp_text_es');

$start_date = IGV_get_option('_igv_site_options', '_igv_fair_start');
$end_date = IGV_get_option('_igv_site_options', '_igv_fair_end');

?>

<!-- main content -->

<main id="main-content">

<?php
//
// SPLASH
//
//

if (!empty($splash_id)) { ?>
  <section id="front-splash" class="section">
    <?php 
      echo (!empty($splash_link) ? '<a href="' . esc_url( $splash_link ) . '">' : ''); 
      echo wp_get_attachment_image($splash_id, 'splash', null, array('class' => 'splash-image'));
      echo (!empty($splash_link) ? '</a>' : ''); 
    ?>
  </section>
<?php } ?>

<?php 
//
// INTRO
//
//

if (!empty($headline_en) || !empty($intro_en)) { ?>
  <section id="front-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-4">
          <h2 class="text-align-center"><?php _e(!empty($headline_en) && !empty($headline_es) ? '[:en]' . $headline_en . '[:es]' . $headline_es : ''); ?></h2>
        </div>
        <div class="col col-l col-l-8">
          <div class="text-columns-2 font-size-h4">
            <?php _e(!empty($intro_en) && !empty($intro_es) ? '[:en]' . wpautop($intro_en) . '[:es]' . wpautop($intro_es) : ''); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
} 
?>

<?php 
//
// FEATURED CONTENT
//
//
?>

<?php 
//
// VISITOR INFO
//
//

if (!empty($schedule) || ( !empty($venue_name) && !empty($venue_address) )  || !empty($tickets)) { ?>
  <section id="front-visitor-info" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Visitor Info[:es]Info para visitantes'); ?></h2>
        </div>
        <div class="col col-l col-l-2">
          <a class="button col flex-row align-center justify-center"><?php _e('[:en]See More[:es]Ver más'); ?></a>
        </div>
      </div>
      <div class="row">
      <?php if (!empty($schedule)) { ?>
        <div class="col col-l col-l-6">
          <h3 class="margin-bottom-tiny"><?php _e('[:en]Schedule[:es]Horario'); ?></h3>
          <?php foreach ($schedule as $day) { ?>
          <div class="flex-row margin-bottom-tiny">
            <div class="col col-l-6 font-size-h4">
              <?php _e( date('d, D M', $day['date']) ); ?>
            </div>
            <div class="col col-l-6">
              <span class="u-break-lines font-size-h4"><?php _e( '[:en]' . $day['schedule_en'] . '[:es]' . $day['schedule_es']); ?></span>
            </div>
          </div>
          <?php } ?>
        </div>
      <?php } if (!empty($venue_name) && !empty($venue_address)) { ?>
        <div class="col col-l col-l-3">
          <h3><?php _e('[:en]Venue[:es]Sede'); ?></h3>
          <div class="row">
            <div class="col">
              <h4 class="padding-bottom-tiny"><?php echo $venue_name; ?></h4>
              <span class="font-size-h4 u-break-lines"><?php echo $venue_address; ?></span>
            </div>
          </div>
        </div>
      <?php } if (!empty($tickets)) { ?>
        <div class="col col-l col-l-3">
          <h3><?php _e('[:en]Tickets[:es]Boletos'); ?></h3>
          <div class="row">
            <div class="col">
              <ul>
                <?php foreach ($tickets as $price) { ?>
                <li class="padding-bottom-micro">
                  <?php _e( '[:en]' . $price['group_en'] . '[:es]' . $price['group_es']); ?>:&nbsp;
                  <div class="font-size-h4"><?php _e( '[:en]' . $price['price_en'] . '[:es]' . $price['price_es']); ?></div>
                </li>
                <?php } ?>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
<?php 
} 
?>

<?php 
//
// EXHIBITORS
//
//

if ( !empty($apply_end) && ( time() <= $apply_end ) && !$publish_exhibitors ) { 
  if (!empty($exhibitors_text_en) && !empty($exhibitors_text_es)) {
?>
  <section id="front-exhibitors" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2>Exhibitors</h2>
        </div>
      </div>
      <div class="row justify-center">
        <div class="col col-l col-l-8 text-align-center font-size-h3">
          <?php _e( '[:en]' . wpautop($exhibitors_text_en) . '[:es]' . wpautop($exhibitors_text_es) ); ?>
        </div>
      </div>
<?php 
  }

  if (!empty($apply_url)) {  
?>
      <div class="row justify-center">
        <a class="col col-l col-l-2 flex-row align-center justify-center button button-big" href="<?php echo esc_url($apply_url); ?>">
          <?php _e( '[:en]Apply[:es]Applicar' ); ?>
        </a>
      </div>
<?php
  } 
?>
    </div>
  </section>
<?php 
} elseif ( $publish_exhibitors ) {
  $args = array (
    'post_type'       => array( 'exhibitor' ),
    'posts_per_page'  => '8',
    'meta_key'        => '_igv_exhibitor_year',
    'orderby'         => 'rand',
  );
  $exhibitors = new WP_Query( $args );

  if ( $exhibitors->have_posts() ) {
?>
  <section id="front-exhibitors" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2>Exhibitors</h2>
        </div>
      </div>
      <div class="row">
<?php
    while ( $exhibitors->have_posts() ) {
      $exhibitors->the_post();
?>
        <a class="col col-l col-l-3">
          <?php the_post_thumbnail(); ?>
          <?php the_title(); ?>
        </a>
<?php
    }
?>
      </div>
      <div class="row justify-center">
        <a href="<?php echo get_post_type_archive_link( 'event' ); ?>" class="col col-l col-l-2 flex-row align-center justify-center button">
          <?php _e( '[:en]Apply[:es]Applicar' ); ?>
        </a>
      </div>
    </div>
  </section>
<?php
  }
} 
?>

<?php
//
// PROGRAM
//
//

if ( !$publish_program ) { 
  if (!empty($program_text_en) && !empty($program_text_es) && !empty($program_image)) {
?>
  <section id="front-program" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h2 class="text-align-left"><?php _e('[:en]Program[:es]Programa'); ?></h2>
        </div>
      </div>
      <div class="row">
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($program_image, 'col-6'); ?>
        </div>
        <div class="col col-l col-l-6">
          <?php _e( '[:en]' . wpautop($program_text_en) . '[:es]' . wpautop($program_text_es) ); ?>
        </div>
      </div>
    </div>
  </section>
<?php 
  }
} else if ( $publish_program ) {
  $now = time();

  $args = array (
    'post_type'       => array( 'event' ),
    'posts_per_page'  => '2',
    'order'           => 'rand',
    'meta_query' => array(
      array(
        'key'     => '_igv_event_start',
        'compare' => 'EXISTS',
      ),
      array(
        'key'     => '_igv_event_end',
        'compare' => 'EXISTS',
      ),
    ),
  );

  if ( !empty($start_date) && !empty($end_date) ) {

    $opening = strtotime('-1 day', $start_date); // 
    $closing = strtotime('+1 day', $end_date);

    if ( $now >= $opening && $now <= $closing ) {

      $args = array (
        'post_type'       => array( 'event' ),
        'posts_per_page'  => '2',
        'meta_key'        => '_igv_event_start',
        'orderby'    => 'meta_value_num',
        'order'      => 'ASC',
        'meta_query' => array(
          array(
            'key'     => '_igv_event_start',
            'compare' => 'EXISTS',
          ),
          array(
            'key'     => '_igv_event_start',
            'value'   => $now,
            'compare' => '>=',
          ),
          array(
            'key'     => '_igv_event_end',
            'compare' => 'EXISTS',
          ),
          array(
            'key'     => '_igv_event_location',
            'compare' => 'EXISTS',
          ),
        ),
      );
    }
  }

  $events = new WP_Query( $args );

  if ( $events->have_posts() ) {
?>
  <section id="front-program" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Upcoming Events[:es]Próximos eventos'); ?></h2>
        </div>
        <div class="col col-l col-l-2">
          <a class="button col flex-row align-center justify-center" href="<?php echo get_post_type_archive_link( 'event' ); ?>"><?php _e('[:en]See More[:es]Ver más'); ?></a>
        </div>
      </div>
      <div class="row">
<?php 
    while ( $events->have_posts() ) {
      $events->the_post();

      $event_start = get_post_meta($post->ID, '_igv_event_start', false);
      $event_end = get_post_meta($post->ID, '_igv_event_end', false);

      $event_artist = get_post_meta($post->ID, '_igv_event_artist', false);
      $event_url = get_post_meta($post->ID, '_igv_event_url', false);
      $event_location = get_post_meta($post->ID, '_igv_event_location', false);

      $event_rsvp_en = get_post_meta($post->ID, '_igv_event_rsvp', false);
      $event_rsvp_es = get_post_meta($post->ID, '_igv_event_rsvp', false);

      if (has_post_thumbnail()) {
?>  
        <div class="col col-l col-l-6">
          <?php echo (!empty($event_url) ? '<a href="' . esc_url($event_url[0]) . '">' . get_the_post_thumbnail() . '</a>' : get_the_post_thumbnail()); ?>
          <div class="row">
            <div class="col col-l-4 flex-col justify-start align-center">
              <div class="font-size-h4"><?php _e(date('l', $event_start[0])); ?></div>
              <div class="font-size-h3"><?php echo date('G', $event_start[0]) . ':' . date('i', $event_start[0]); ?></div>
              <div class="font-size-h3">|</div>
              <div class="font-size-h4"><?php _e(date('l', $event_end[0])); ?></div>
              <div class="font-size-h3"><?php echo date('G', $event_end[0]) . ':' . date('i', $event_end[0]); ?></div>
            </div>
            <div class="col col-l-8">
              <?php echo $event_location[0]; ?>
              <?php if (!empty($event_artist)) { ?>
              <div class="font-size-h4"><?php echo $event_artist[0]; ?></div>
              <?php } ?>
              <div class="font-size-h3 margin-bottom-tiny"><?php echo (!empty($event_url) ? '<a href="' . esc_url($event_url[0]) . '">' . get_the_title() . '</a>' : get_the_title()); ?></div>
              <?php the_content(); ?>
              <?php 
                if (!empty($event_rsvp_en) && !empty($event_rsvp_es)) {
                  _e( '[:en]' . $event_rsvp_en[0] . '[:es]' . $event_rsvp_es[0] ); 
                } 
              ?>
            </div>
          </div>
        </div>  
<?php 
      }
    }
?>
      </div>
    </div>
  </section>
<?php 
  }

  wp_reset_postdata();
}
?>

<?php
//
// PRESS
//
//

$args = array (
  'post_type'       => array( 'press' ),
  'posts_per_page'  => '3',
  'meta_key'        => '_igv_press_date',
  'orderby'         => 'meta_value_num',
);
$press = new WP_Query( $args );

if ( $press->have_posts() ) {
?>
  <section id="front-press" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Press[:es]Prensa'); ?></h2>
        </div>
        <div class="col col-l col-l-2">
          <a class="button col flex-row align-center justify-center" href="<?php echo get_post_type_archive_link( 'press' ); ?>"><?php _e('[:en]See More[:es]Ver más'); ?></a>
        </div>
      </div>
      <div class="row">
<?php
  while ( $press->have_posts() ) {
    $press->the_post();

    $press_meta = get_post_meta($post->ID);
    $press_author = $press_meta['_igv_press_author'][0];
    $press_pub = $press_meta['_igv_press_publication'][0];
    $press_url = $press_meta['_igv_press_url'][0];

    if (!empty($press_author) && !empty($press_url) && !empty($press_url)) {
?>
        <a class="col col-l col-l-4" href="<?php echo esc_url($press_url); ?>">
          <h4 class="margin-bottom-tiny">
            <?php echo $press_pub; ?>
          </h4>
          <h3 class="margin-bottom-tiny">
            <?php echo '"' . get_the_title() . '"'; ?>
          </h3>
          <?php
            _e('[:en]by[:es]por');
            echo ' ' . $press_author;
          ?>
        </a>
<?
    }
  }
?>
      </div>
    </div>
  </section>
<?php 
}

wp_reset_postdata();
?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>