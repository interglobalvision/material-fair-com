<?php
$exhibitors_apply_heading = IGV_get_option('_igv_page_options', '_igv_exhibitors_apply_heading');
$exhibitors_apply_text = IGV_get_option('_igv_page_options', '_igv_exhibitors_apply_text');
$publish_exhibitors = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');
$apply_url = IGV_get_option('_igv_site_options', '_igv_apply_url');
$show_apply = IGV_get_option('_igv_site_options', '_igv_show_apply');

if (!empty($apply_url) && $show_apply == 'on' && $publish_exhibitors != 'on') {
?>
  <section id="exhibitors-apply" class="section">
    <div class="container">
    <?php
      if (!empty($exhibitors_apply_heading)) {
    ?>
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2><?php echo $exhibitors_apply_heading; ?></h2>
        </div>
      </div>
    <?php 
      }
      if (!empty($exhibitors_apply_text)) {
    ?>
      <div class="row justify-center">
        <div class="col col-l col-l-8 text-align-center font-size-h3">
          <?php echo apply_filters( 'the_content', $exhibitors_apply_text ); ?>
        </div>
      </div>
    <?php 
      }
    ?>
      <div class="row justify-center">
        <a class="col col-l col-l-2 flex-row align-center justify-center button button-big button-yellow" href="<?php echo esc_url($apply_url); ?>">
          <?php _e( '[:en]Apply![:es]¡Aplica!' ); ?>
        </a>
      </div>
    </div>
  </section>
<?php 
}
?>