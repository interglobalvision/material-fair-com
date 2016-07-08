<?php
  $press_page_text = IGV_get_option('_igv_page_options', '_igv_press_page_text');
  $press_page_image_id = IGV_get_option('_igv_page_options', '_igv_press_page_image_id');
  $press_accreditation = IGV_get_option('_igv_page_options', '_igv_press_accreditation_text');
?>

  <section id="press-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h1>
          <?php 
            _e('[:en]Press[:es]Prensa;'); 
          ?>
          </h1>
        </div>
      </div>
<?php 
if (!empty($press_page_text) || !empty($press_page_image_id)) { 
?>
      <div class="row">
<?php 
  if (!empty($press_page_image_id)) {
?>
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($press_page_image_id, 'col-6'); ?>
        </div>
<?php 
  }

  if (!empty($press_page_text)) { 
?>
        <div class="col col-l col-l-6">
          <div class="font-size-h3">
            <?php echo apply_filters( 'the_content', $press_page_text ); ?>
          </div>
          <div class="font-size-h4">
            <?php echo (!empty($press_accreditation) ? apply_filters( 'the_content', $press_accreditation ) : ''); ?>
          </div>
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