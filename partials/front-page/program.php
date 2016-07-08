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

      $event_start = get_post_meta($post->ID, '_igv_event_start', false);
      $event_end = get_post_meta($post->ID, '_igv_event_end', false);

      $event_artist = get_post_meta($post->ID, '_igv_event_artist', false);
      $event_url = get_post_meta($post->ID, '_igv_event_url', false);
      $event_location = get_post_meta($post->ID, '_igv_event_location', false);

      $event_rsvp = get_post_meta($post->ID, '_igv_event_rsvp', false);

      if (has_post_thumbnail()) {
?>  
        <div class="col col-l col-l-6">
          <?php echo !empty($event_url) ? '<a href="' . esc_url($event_url[0]) . '">' . get_the_post_thumbnail() . '</a>' : get_the_post_thumbnail(); ?>
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
              <div class="font-size-h3 margin-bottom-tiny">
                <?php echo !empty($event_url) ? '<a href="' . esc_url($event_url[0]) . '">' . get_the_title() . '</a>' : get_the_title(); ?>
              </div>
              <?php the_content(); ?>
              <?php echo !empty($event_rsvp) ? $event_rsvp : ''; ?>
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