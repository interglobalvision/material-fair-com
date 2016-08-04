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
    //set section letter (#,A,B,C...) to null to start
    $section_letter = null;
?>
  <section id="exhibitors-list" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 text-align-center">
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

      $the_title = get_the_title();
      $first_letter = $the_title[0];
      // the first letter of the title

      
      if (!ctype_alpha($first_letter)) {
        // if the first letter is not alphabetic, 
        // set it to '#' for numbers and symbols
        $first_letter = '#';
      } else {
        // otherwise make it uppercase
        $first_letter = strtoupper($first_letter);
      }
      

      if ($first_letter !== $section_letter) {
        // if the first letter is not equal the current section letter
        //then we reset the section letter, and start a new section

        $section_letter = $first_letter;
?>
      </div>
      <div class="row">
        <div class="col col-s col-s-12">
          <h3><?php echo $section_letter; ?></h3>
        </div>
      </div>
      <div class="row">
<?php 
      }

      $city = get_post_meta($post->ID, '_igv_exhibitor_city', true);
      $link = get_post_meta($post->ID, '_igv_exhibitor_url', true);

      if ($fair_year_id != $current_year_id) {
?>

        <article <?php post_class('col col-s col-s-12 col-l col-l-6 margin-bottom-micro'); ?> id="post-<?php the_ID(); ?>">
        <?php if (!empty($link)) { ?>
          <a href="<?php echo esc_url($link); ?>" target="_blank" rel="noopener noreferrer">
            <h4 class="font-sans u-inline-block font-size-h3 border-underline"><?php the_title(); ?></h4>
          </a>
        <?php } else { ?>
          <h4 class="font-sans u-inline-block font-size-h3"><?php the_title(); ?></h4>
        <?php } ?>
          <?php echo !empty($city) ? '<span class="font-size-h4">, ' . $city . '</span>': ''; ?> 
        </article>

<?php
    } else {
?>

        <article <?php post_class('col col-s col-s-6 col-m col-m-4 col-l col-l-3'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('col-3-crop'); ?>
            <h4><?php the_title(); ?></h4>
            <?php echo !empty($city) ? '<span>' . $city . '</span>' : ''; ?> 
          </a>
        </article>

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
