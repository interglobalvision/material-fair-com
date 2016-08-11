<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
// if we have the term ID, get the slug, 
// otherwise set it false for later conditionals

$publish = false;

if (is_post_type_archive('event') || is_front_page()) {
  $title = '[:en]Program[:es]Programa';
  $publish = IGV_get_option('_igv_page_options', '_igv_publish_program');
  $intro_text = IGV_get_option('_igv_page_options', '_igv_program_page_text');
  $intro_image_id = IGV_get_option('_igv_page_options', '_igv_program_page_image_id');

} elseif (is_post_type_archive('exhibitor')) {
  $title = '[:en]Exhibitors[:es]Expositores';
  $publish = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');
  $intro_text = IGV_get_option('_igv_page_options', '_igv_exhibitors_page_text');
  $intro_image_id = IGV_get_option('_igv_page_options', '_igv_exhibitors_page_image_id');

} elseif (is_post_type_archive('press')) {
  $title = '[:en]Press[:es]Prensa';
  $intro_text = IGV_get_option('_igv_page_options', '_igv_press_page_text');
  $intro_image_id = IGV_get_option('_igv_page_options', '_igv_press_page_image_id');
  $press_accreditation = IGV_get_option('_igv_page_options', '_igv_press_accreditation_text');

} else {
  $title = get_the_title();
  $intro_text = IGV_get_option('_igv_visitor_options', '_igv_visitor_info_page_text');
  $intro_image_id = IGV_get_option('_igv_visitor_options', '_igv_visitor_info_page_image_id'); 

}
?>

<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <?php 
          echo is_front_page() ? '<h2>' : '<h1>';
          _e($title);
          // add the current year to the heading if we have it, 
          // and the exhibitors are published.
          echo is_front_page() ? '</h2>' : '</h1>';
        ?>
      </div>
    </div>
<?php 
if (!empty($intro_text) || !empty($intro_image_id)) { 
?>
    <div class="row">
<?php 
  if (!empty($intro_image_id)) {
    $attachment = get_post( $intro_image_id );
    $caption = $attachment->post_excerpt;
    $description = $attachment->post_content;
?>
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6">
        <?php echo wp_get_attachment_image($intro_image_id, 'col-6'); ?>
        <?php if (!empty($caption) || !empty($description)) { ?>
        <div class="margin-top-micro text-align-center">
          <div class="font-size-h4"><?php _e($description); ?></div>
          <?php _e($caption); ?>
        </div>
        <?php } ?>
      </div>
<?php 
  } 
  if (!empty($intro_text)) { 
?>
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6">
        <div class="font-size-h3">
          <?php echo apply_filters( 'the_content', $intro_text ); ?>
        </div>
<?php 
    if (!empty($press_accreditation)) {
?>
        <div class="font-size-h4">
          <?php echo apply_filters( 'the_content', $press_accreditation ); ?>
        </div>
<?php 
    }
?>
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