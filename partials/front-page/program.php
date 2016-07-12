<?php
$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');

$program_image_id = IGV_get_option('_igv_page_options', '_igv_program_image_id');

$program_text = IGV_get_option('_igv_page_options', '_igv_program_temp_text');

$start_date = IGV_get_option('_igv_site_options', '_igv_fair_start');
$end_date = IGV_get_option('_igv_site_options', '_igv_fair_end');

if ( !$publish_program ) { 
  if (!empty($program_text) && !empty($program_image_id)) {
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
          <?php echo wp_get_attachment_image($program_image_id, 'col-6'); ?>
        </div>
        <div class="col col-l col-l-6">
          <?php echo apply_filters( 'the_content', $program_text ); ?>
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

      get_template_part('partials/event-highlight');

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