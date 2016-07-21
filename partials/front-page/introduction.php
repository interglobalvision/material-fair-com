<?php 
$organizers = IGV_get_option('_igv_site_options', '_igv_front_organizers');
$headline = IGV_get_option('_igv_site_options', '_igv_front_headline');
$intro = IGV_get_option('_igv_site_options', '_igv_front_description');

if (!empty($headline) || !empty($intro)) { ?>
  <section id="front-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 col-l col-l-4">
          <h2 class="text-align-center"><?php echo !empty($headline) ? $headline : ''; ?></h2>
        </div>
        <div class="col col-s col-s-12 col-l col-l-8">
          <div class="text-columns-2">
            <div class="font-size-h4">
              <?php echo !empty($intro) ? apply_filters( 'the_content', $intro ) : ''; ?>
            </div>
            <?php echo !empty($organizers) ? apply_filters( 'the_content', $organizers ) : ''; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php 
} 
?>