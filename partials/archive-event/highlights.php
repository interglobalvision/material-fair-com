<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
// if we have the term ID, get the slug, 
// otherwise set it false for later conditionals

$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');

if ($publish_program == 'on') {

  $args = array (
    'post_type'       => 'event',
    'posts_per_page'  => '2',
    'orderby'         => 'rand',
    'meta_query'      => array( 
      array(
        'key' => '_igv_event_highlight',
        'value' => 'on',
      ),
      array(
        'key' => '_igv_event_vip',
        'compare' => 'NOT EXISTS'
      ),
    ),
    'tax_query'       => array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $current_year_id, // get posts with current year
      )
    ),
  );
  $highlight_events = new WP_Query( $args );

  if( $highlight_events->have_posts() ) {
?>

<section id="program-highlights" class="section">
  <div class="container">
    <div class="row">
    <?php if (is_front_page()) { ?>
      <div class="col col-l col-l-10">
        <h2 class="text-align-left"><?php _e('[:en]Program Highlights[:es]Eventos destecados'); ?></h2>
      </div>
      <div class="col col-l col-l-2">
        <a class="button col flex-row align-center justify-center" href="<?php echo get_post_type_archive_link( 'event' ); ?>"><?php _e('[:en]See More[:es]Ver más'); ?></a>
      </div>
    <?php } else { ?>
      <div class="col col-l col-l-12">
        <h2 class="text-align-left"><?php _e('[:en]Program Highlights[:es]Eventos destecados'); ?></h2>
      </div>
    <?php } ?>
    </div>
    <div class="row">
<?php 
    while( $highlight_events->have_posts() ) {
      $highlight_events->the_post();
      
      get_template_part('partials/event-highlight');

    }
?>
  </div>
</section>

<?php 
  }
}
?>