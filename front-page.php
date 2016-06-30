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

  <section id="front-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-4">
          <?php _e(!empty($headline_en) && !empty($headline_es) ? '[:en]' . $headline_en . '[:es]' . $headline_es : ''); ?>
        </div>
        <div class="col col-l col-l-8">
          <div class="text-columns-2">
            <?php _e(!empty($intro_en) && !empty($intro_es) ? '[:en]' . $intro_en . '[:es]' . $intro_es : ''); ?>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>