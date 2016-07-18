<?php 
// WP_Query arguments
if (get_fair_year_id()) {

$args = array (
  'post_type' => array( 'exhibitor' ),
  'order'     => 'ASC',
  'orderby'   => 'title',
  'tax_query' => array(
    array(
      'taxonomy' => 'fair_year',
      'field' => 'term_id',
      'terms' => get_fair_year_id(),
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
        <div class="col col-l col-l-12 text-align-center">
          <h2><?php _e('[:en]Exhibitors[:es]Expositores'); ?></h2>
        </div>
<?php 
    while( $query->have_posts() ) {
      $query->the_post();

      $the_title = get_the_title();
      $first_letter = $the_title[0];
      // the first letter of the title

      $first_letter = !ctype_alpha($first_letter) ? '#' : $first_letter;
      // if the first letter is not alphabetic, 
      // set it to '#' for numbers and symbols

      if ($first_letter !== $section_letter) {
        // if the first letter is not equal the current section letter
        //then we reset the section letter, and start a new section

        $section_letter = $first_letter;
?>
      </div>
      <div class="row">
        <div class="col col-l col-l-12">
          <h3><?php echo $section_letter; ?></h3>
        </div>
      </div>
      <div class="row">
<?php 
      }

      $city = get_post_meta($post->ID, '_igv_exhibitor_city', true);
?>

        <article <?php post_class('col col-l col-l-3'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('col-3-crop'); ?>
            <h4><?php the_title(); ?></h4>
            <?php echo !empty($city) ? '<span>' . $city . '</span>' : ''; ?> 
          </a>
        </article>

<?php
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