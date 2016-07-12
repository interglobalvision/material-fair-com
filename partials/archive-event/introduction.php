<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
// if we have the term ID, get the slug, 
// otherwise set it false for later conditionals

$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');

$program_page_text = IGV_get_option('_igv_page_options', '_igv_program_page_text');
$program_page_image_id = IGV_get_option('_igv_page_options', '_igv_program_page_image_id');
?>

<section id="program-intro" class="section">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-12">
        <?php 
          echo is_front_page() ? '<h2>' : '<h1>';
          _e('[:en]Program&nbsp;[:es]Programa&nbsp;'); 
          echo $current_year && $publish_program && !is_front_page() ? $current_year : ''; 
          // add the current year to the heading if we have it, 
          // and the exhibitors are published.
          echo is_front_page() ? '</h2>' : '</h1>';
        ?>
      </div>
    </div>
<?php 
if (!empty($program_temp_text) || !empty($program_page_text) || !empty($program_page_image_id)) { 
?>
    <div class="row">
<?php 
  if (!empty($program_page_image_id)) {
?>
      <div class="col col-l col-l-6">
        <?php echo wp_get_attachment_image($program_page_image_id, 'col-6'); ?>
      </div>
<?php 
  } if (!empty($program_page_text)) { 
?>
      <div class="col col-l col-l-6 font-size-h3">
        <?php echo apply_filters( 'the_content', $program_page_text ); ?>
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