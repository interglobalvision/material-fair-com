<?php 

$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = !empty($current_year_id) ? get_term($current_year_id)->slug : false; 

$args = array (
  'post_type' => 'photo_gallery',
  'numberposts' => '-1',
);

if (!empty($current_year_id)) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'fair_year',
      'field' => 'term_id',
      'terms' => $current_year_id,
    ),
  );
}

$photo_galleries = new WP_Query( $args );

if ( $photo_galleries->have_posts() ) { 
?>
  <section id="press-photo-gallery" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2><?php _e('[:en]Photos[:es]Fotos'); ?></h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-center align-center">
        <div class="col col-l col-l-10">
          <div class="swiper-container">
            <div class="swiper-button-prev"></div>
            <div class="swiper-wrapper">
<?php 
  while ($photo_galleries->have_posts()) {
    $photo_galleries->the_post();
?>
              <?php get_template_part('partials/archive-press/photo-gallery-slide'); ?>
<?php
  }
?>
            </div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>