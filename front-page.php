<?php
get_header();

$splash_id = IGV_get_option('_igv_site_options', '_igv_front_page_splash_id');
$splash_link = IGV_get_option('_igv_site_options', '_igv_front_page_splash_url');

$headline_en = IGV_get_option('_igv_site_options', '_igv_front_headline_en');
$headline_es = IGV_get_option('_igv_site_options', '_igv_front_headline_es');
$intro_en = IGV_get_option('_igv_site_options', '_igv_front_description_en');
$intro_es = IGV_get_option('_igv_site_options', '_igv_front_description_es');
?>

<!-- main content -->

<main id="main-content">

<?php if (!empty($splash_id)) { ?>
  <section id="front-splash" class="section">
    <?php 
      echo (!empty($splash_link) ? '<a href="' . esc_url( $splash_link ) . '">' : ''); 
      echo wp_get_attachment_image($splash_id, 'splash', null, array('class' => 'splash-image'));
      echo (!empty($splash_link) ? '</a>' : ''); 
    ?>
  </section>
<?php } ?>

<?php if (!empty($headline_en) || !empty($intro_en)) { ?>
  <section id="front-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-4">
          <h2><?php _e(!empty($headline_en) && !empty($headline_es) ? '[:en]' . $headline_en . '[:es]' . $headline_es : ''); ?></h2>
        </div>
        <div class="col col-l col-l-8">
          <div class="text-columns-2">
            <?php _e(!empty($intro_en) && !empty($intro_es) ? '[:en]' . $intro_en . '[:es]' . $intro_es : ''); ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>

<?php // Featured Content Goes Here ?>

  <section id="front-visitor-info" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Visitor Info[:es]Info para visitantes'); ?></h2>
        </div>
        <div class="col col-l col-l-2">
          <a class="button col flex-row align-center justify-center"><?php _e('[:en]See More[:es]Ver más'); ?></a>
        </div>
      </div>
      <div class="row">
        <div class="col col-l col-l-6">
          <h3><?php _e('[:en]Schedule[:es]Horario'); ?></h3>
          <div class="row">
            <div class="col col-l-6">
              <h4>Days</h4>
            </div>
            <div class="col col-l-6">
              <h4>Hours</h4>
            </div>
          </div>
        </div>
        <div class="col col-l col-l-3">
          <h3><?php _e('[:en]Venue[:es]Sede'); ?></h3>
          <div class="row">
            <div class="col">
              <h4>Address</h4>
            </div>
          </div>
        </div>
        <div class="col col-l col-l-3">
          <h3><?php _e('[:en]Tickets[:es]Boletos'); ?></h3>
          <div class="row">
            <div class="col">
              <h4>Prices</h4>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> <!-- end visitor info -->

  <section id="front-exhibitors" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2>Exhibitors</h2>
        </div>
      </div>
      <div class="row justify-center">
        <div class="col col-l col-l-8 text-align-center">
          <h3>Apply Text</h3>
        </div>
      </div>
      <div class="row justify-center">
        <a href="#" class="col col-l col-l-2 flex-row align-center justify-center button button-big">
          Apply
        </a>
      </div>
    </div>
  </section>

<?php
$args = array (
  'post_type'       => array( 'press' ),
  'posts_per_page'  => '3',
  'meta_key'        => '_igv_press_date',
  'orderby'         => 'meta_value_num',
);
$press = new WP_Query( $args );

if ( $press->have_posts() ) {
?>
  <section id="front-press" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Press[:es]Prensa'); ?></h2>
        </div>
        <div class="col col-l col-l-2">
          <a class="button col flex-row align-center justify-center"><?php _e('[:en]See More[:es]Ver más'); ?></a>
        </div>
      </div>
      <div class="row">
<?php
  while ( $press->have_posts() ) {
    $press->the_post();

    $press_meta = get_post_meta($post->ID);
    $press_author = $press_meta['_igv_press_author'][0];
    $press_pub = $press_meta['_igv_press_publication'][0];
    $press_url = $press_meta['_igv_press_url'][0];

    if (!empty($press_author) && !empty($press_url) && !empty($press_url)) {
?>
        <a class="col col-l col-l-4" href="<?php echo esc_url($press_url); ?>">
          <h4 class="margin-bottom-tiny">
            <?php echo $press_pub; ?>
          </h4>
          <h3 class="margin-bottom-tiny">
            <?php echo '"' . get_the_title() . '"'; ?>
          </h3>
          <?php
            _e('[:en]by[:es]por');
            echo ' ' . $press_author;
          ?>
        </a>
<?
    }
  }
?>
      </div>
    </div>
  </section>
<?php 
}

wp_reset_postdata();
?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>