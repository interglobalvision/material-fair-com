<?php
if (get_fair_year_id()) {

  $fair_year_id = get_fair_year_id();
  $fair_year = get_term($fair_year_id)->slug; 
  $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');

  $args = array (
    'post_type' => array( 'event' ),
    'posts_per_page' => -1,
    'order'     => 'ASC',
    'orderby'   => 'meta_value_num',
    'meta_key'  => '_igv_event_start',
    'tax_query' => array(
    array(
      'taxonomy' => 'fair_year',
      'field' => 'term_id',
      'terms' => $fair_year_id,
    ),
  ),
  );

  $query = new WP_Query( $args );

  if( $query->have_posts() ) {
?>
<section class="section section-yellow padding-bottom-basic">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12">
        <h2>
          <?php 
            _e('[:en]Schedule[:es]Calendario');
            if ($fair_year_id != $current_year_id) {
              echo ' ' . $fair_year; 
            }
          ?>
        </h2>
<?php
    $current_day = null;

    while( $query->have_posts() ) {
      $query->the_post();

      $start = get_post_meta($post->ID, '_igv_event_start', true);
      $end = get_post_meta($post->ID, '_igv_event_end', true);

      $this_day = date('Ymd', $start);

      $artist = get_post_meta($post->ID, '_igv_event_artist', true);
      $location = get_post_meta($post->ID, '_igv_event_location', true);
      $url = get_post_meta($post->ID, '_igv_event_url', true); 

      if ($this_day != $current_day) {
?>
      </div>
    </div>
    <div class="calendar-day border-row">
      <div class="row calendar-heading">
        <div class="col col-s col-s-5">
          <h3 class="u-inline-block"><?php _e(date('l', $start)); ?></h3>
        </div>
        <div class="col col-s col-s-7 text-align-right">
          <span class="font-size-h3 calendar-date"><?php 
            _e(date('j', $start)); 
            echo '&nbsp;';
            _e(date('F', $start)); 
            echo '&nbsp;' . date('Y', $start);
          ?>
        </div>
      </div>
      <div class="calendar-events">
<?php 
        $current_day = $this_day;
      }
?>  
      <div class="row">
        <div class="col col-s col-s-6 col-l col-l-2 font-size-h4 text-align-center">
          <?php get_template_part('partials/event-times'); ?>
        </div>
        <div class="col col-s col-s-6 col-l col-l-4">
          <?php the_post_thumbnail('col-6-crop'); ?>
        </div>
        <div class="col col-s col-s-12 col-l col-l-6">
          <span class="font-size-h4">
          <?php 
            echo !empty($url) ? '<a href="' . $url . '" target="_blank" rel="noopener noreferrer">' : ''; 
            echo !empty($artist) ? $artist : ''; 
            echo !empty($artist) && !empty($location) ? ' @ ' : ''; 
            echo !empty($location) ? $location : ''; 
            echo !empty($url) ? '</a>' : ''; 
          ?>
          </span>
          <h3 class="margin-bottom-micro"><?php the_title(); ?></h3>
          <?php the_content(); ?>
        </div>
      </div>
<?php 
    } 
?>
      </div>
    </div>
  </div>
</section>
<?php 
  }
  wp_reset_postdata(); 
}
?>