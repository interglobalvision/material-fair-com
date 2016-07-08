<?php
$exhibitors_apply_text = IGV_get_option('_igv_page_options', '_igv_exhibitors_apply_text');
$apply_url = IGV_get_option('_igv_site_options', '_igv_apply_url');
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