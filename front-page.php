<?php
get_header();

$splash_id = IGV_get_option('_igv_site_options', '_igv_front_page_splash_id');
$splash_link = IGV_get_option('_igv_site_options', '_igv_front_page_splash_url');
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

      </div>
    </div>
  </section>

<!-- end main-content -->

</main>

<?php
get_footer();
?>