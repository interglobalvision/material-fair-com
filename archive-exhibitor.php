<?php
get_header();

$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
// if we have the term ID, get the slug, 
// otherwise set it false for later conditionals

$publish_exhibitors = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');
$publish_committee = IGV_get_option('_igv_page_options', '_igv_publish_committee');

$exhibitors_apply_text = IGV_get_option('_igv_page_options', '_igv_exhibitors_apply_text');
$exhibitors_page_text = IGV_get_option('_igv_page_options', '_igv_exhibitors_page_text');
$exhibitors_page_image_id = IGV_get_option('_igv_page_options', '_igv_exhibitors_page_image_id');

$apply_url = IGV_get_option('_igv_site_options', '_igv_apply_url');
$apply_end = IGV_get_option('_igv_site_options', '_igv_apply_end');
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="exhibitors-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h1>
          <?php 
            _e('[:en]Exhibitors&nbsp;[:es]Expositores&nbsp;'); 
            echo ($current_year && $publish_exhibitors ? $current_year : ''); 
            // add the current year to the heading if we have it, 
            // and the exhibitors are published.
          ?>
          </h1>
        </div>
      </div>
<?php 
if (!empty($exhibitors_page_text) || !empty($exhibitors_page_image_id)) { 
?>
      <div class="row">
<?php 
  if (!empty($exhibitors_page_image_id)) {
?>
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($exhibitors_page_image_id, 'col-6'); ?>
        </div>
<?php 
  } if (!empty($exhibitors_page_text)) { 
?>
        <div class="col col-l col-l-6 font-size-h3">
          <?php echo apply_filters( 'the_content', $exhibitors_page_text ); ?>
        </div>
<?php 
  }
?>
      </div>
<?php 
}
?>
    </div>
  </section>

<?php 
if ( $publish_committee && !empty($current_year_id)) {

  $args = array (
    'post_type'       => 'committee',
    'posts_per_page'  => -1,
    'tax_query'       => array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $current_year_id, // get posts with current year
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
          <h2><?php _e('[:en]Selection Committee[:es]Comité de Selección'); ?></h2>
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
?>

<?php
// if the application hasn't ended and 
// exhibitors are not published, 
// show the Apply Now section
if ( !empty($apply_end) && time() <= $apply_end && !$publish_exhibitors && !empty($exhibitors_apply_text) && !empty($apply_url) ) { 
?>
  <section id="exhibitors-apply" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2><?php _e('[:en]Exhibitor application now open![:es]Solicitud de participación ya está abierta!'); ?></h2>
        </div>
      </div>
      <div class="row justify-center">
        <div class="col col-l col-l-8 text-align-center font-size-h3">
          <?php echo apply_filters( 'the_content', $exhibitors_apply_text ); ?>
        </div>
      </div>

      <div class="row justify-center">
        <a class="col col-l col-l-2 flex-row align-center justify-center button button-big" href="<?php echo esc_url($apply_url); ?>">
          <?php _e( '[:en]Apply[:es]Applicar' ); ?>
        </a>
      </div>
    </div>
  </section>
<?php 
// Otherwise if the exhibitors are published, 
// show exhibitor list section
} elseif ( $publish_exhibitors ) { 

  if( have_posts() ) {
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
    while( have_posts() ) {
      the_post();

      $the_title = get_the_title();
      $first_letter = $the_title[0];
      // the first letter of the title

      $first_letter = (!ctype_alpha($first_letter)) ? '#' : $first_letter;
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

      $city = get_post_meta($post->ID, '_igv_exhibitor_city');
?>

        <article <?php post_class('col col-l col-l-3'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('col-3-crop'); ?>
            <h4><?php the_title(); ?></h4>
            <?php echo (!empty($city) ? '<span>' . $city[0] . '</span>' : ''); ?> 
          </a>
        </article>

<?php
    }
?>
      </div>
    </div>
  </section>
<?php 
  } else {
?>
  <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
  }
} 
?>

<?php
// LINKS TO PAST EDITIONS WILL GO HERE
?>

<?php // get_template_part('partials/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>