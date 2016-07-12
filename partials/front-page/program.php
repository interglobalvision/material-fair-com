<?php
$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');

$program_image_id = IGV_get_option('_igv_page_options', '_igv_program_image_id');
$program_text = IGV_get_option('_igv_page_options', '_igv_program_temp_text');

if ( $publish_program == 'on' ) {

  get_template_part('partials/archive-event/highlights');

} else {
?>
  <section id="front-program" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h2 class="text-align-left"><?php _e('[:en]Program[:es]Programa'); ?></h2>
        </div>
      </div>
<?php 
        if (!empty($program_image_id) || !empty($program_text)) { 
?>
      <div class="row">
<?php 
          if (!empty($program_image_id)) { 
?>
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($program_image_id, 'col-6'); ?>
        </div>
<?php 
          }
          if (!empty($program_text)) {
?>
        <div class="col col-l col-l-6">
          <?php echo apply_filters( 'the_content', $program_text ); ?>
        </div>
<?php 
          }
        }
?>
      </div>
    </div>
  </section>
<?php 
}
?>