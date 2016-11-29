<?php 
// WP_Query arguments
if (get_fair_year_id()) {

  $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
  $fair_year_id = get_fair_year_id();
  $fair_year = get_term($fair_year_id)->slug; 

  $args = array (
    'post_type' => array( 'exhibitor' ),
    'posts_per_page' => -1,
    'order'     => 'ASC',
    'orderby'   => 'title',
    'tax_query' => array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $fair_year_id,
      )
    )
  );

  // The Query
  $query = new WP_Query( $args );

  if( $query->have_posts() ) {
?>
  <section id="exhibitors-list" class="section">
    <div class="container">
<?php 
    $section_letter = null;

    $exhibitor_slug = $fair_year . '-exhibitor';
    $exhibitor_term =  get_term_by('slug', $exhibitor_slug, 'booth_level');

    if ($exhibitor_term) {
      if ($exhibitor_term->count > 0) {
?>
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12 text-align-center">
          <h2>
            <?php 
              _e('[:en]Exhibitors[:es]Expositores');
              echo ' ' . $fair_year; 
            ?>
           </h2>
        </div>
<?php 
        while( $query->have_posts() ) {
          $query->the_post();

          if( has_term($exhibitor_slug, 'booth_level') ) {
            include(locate_template('partials/archive-exhibitor/exhibitor.php'));
          }
        }
?>
      </div>
<?php 
      }
    }

    $section_letter = null;

    $project_slug = $fair_year . '-project';
    $project_term =  get_term_by('slug', $project_slug, 'booth_level');

    if ($project_term) {
      if ($project_term->count > 0) {
?>
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12 text-align-center">
          <h2>
            <?php 
              _e('[:en]Projects[:es]Proyectos');
              echo ' ' . $fair_year; 
            ?>
           </h2>
        </div>
<?php 
        while( $query->have_posts() ) {
          $query->the_post();

          if( has_term($project_slug, 'booth_level') ) {
            include(locate_template('partials/archive-exhibitor/exhibitor.php'));
          }
        }
?>
      </div>
<?php 
      }
    }
?>
    </div>
  </section>
<?php 
  }

wp_reset_postdata(); 

}
?>
