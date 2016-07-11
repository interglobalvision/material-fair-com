<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
// if we have the term ID, get the slug, 
// otherwise set it false for later conditionals

$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');
?>

<section id="program-intro" class="section">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-12">
        <h2>
        <?php 
          _e('[:en]Program Highlights[:es]Eventos destecados'); 
        ?>
        </h2>
      </div>
    </div>
  </div>
</section>