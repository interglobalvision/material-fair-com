<?php
if (get_fair_year_id()) {

  $fair_year_id = get_fair_year_id();
  $fair_year = get_term($fair_year_id)->slug; 
  $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
  $publish_committee = IGV_get_option('_igv_page_options', '_igv_publish_committee');

  if (($current_year_id == get_fair_year_id() && $publish_committee == 'on') || $current_year_id != get_fair_year_id()) {

    $args = array (
      'post_type'       => 'committee',
      'posts_per_page'  => -1,
      'tax_query'       => array(
        array(
          'taxonomy' => 'fair_year',
          'field' => 'term_id',
          'terms' => $fair_year_id, // get posts with current year
        )
      ),
      'orderby'         => 'title',
    );
    $committee = new WP_Query( $args );

    if ( $committee->have_posts() ) {

?>
  <section id="exhibitors-committee" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h2><?php _e('[:en]Selection Committee[:es]Comité de Selección'); echo ' ' . $fair_year; ?></h2>
        </div>
      </div>
      <div class="row">
<?php 
      while( $committee->have_posts() ) {
        $committee->the_post();
?>
        <div <?php post_class('col col-l col-l-6 margin-bottom-tiny'); ?> id="post-<?php the_ID(); ?>">
          <h3><?php the_title(); ?></h3>
          <div class="font-size-h4"><?php the_content(); ?></div>
        </div>
<?php
      }
?>
    </div>
  </section>
<?php 
    }

    wp_reset_postdata();
  }
}
?>