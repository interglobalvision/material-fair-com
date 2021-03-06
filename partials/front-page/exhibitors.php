<?php 
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$publish_exhibitors = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');

if ($publish_exhibitors == 'on' && !empty($current_year_id)) {

  $args = array (
    'post_type'       => 'exhibitor',
    'posts_per_page'  => '8',
    'tax_query'       => array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $current_year_id,
      )
    ),
    'orderby'         => 'rand',
    'meta_query'      => array( 
      array(
        'key' => '_thumbnail_id',
      ),
    ),
  );
  $exhibitors = new WP_Query($args);

  if ( $exhibitors->have_posts() ) {
?>
  <section id="front-exhibitors" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12 text-align-center">
          <h2><?php _e('[:en]Exhibitors[:es]Expositores'); ?></h2>
        </div>
      </div>
      <div class="row">
<?php
    while ($exhibitors->have_posts()) {
      $exhibitors->the_post();

      $city = get_post_meta($post->ID, '_igv_exhibitor_city', true);
?>
        <a class="col col-s col-s-12 col-m col-m-6 col-l col-l-3" href="<?php the_permalink(); ?>">
          <?php the_post_thumbnail('col-6-crop'); ?>
          <h3><?php the_title(); ?></h3>
          <?php echo !empty($city) ? '<span class="font-size-h4">' . $city . '</span>' : ''; ?>
        </a>
<?php
    }
?>
      </div>
      <div class="row justify-center">
        <a href="<?php echo get_post_type_archive_link( 'exhibitor' ); ?>" class="col col-m col-m-8 col-m col-m-4 col-l col-l-2 flex-row align-center justify-center button button-yellow">
          <?php _e( '[:en]See More[:es]Ver más' ); ?>
        </a>
      </div>
    </div>
  </section>
<?php
  }
} else {

  get_template_part('partials/archive-exhibitor/apply');
 
} 
?>