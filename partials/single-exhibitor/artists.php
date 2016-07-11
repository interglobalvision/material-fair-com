<?php 
$artists = get_post_meta($post->ID, '_igv_exhibitor_artists_exhibiting', true);    

if (!empty($artists)) {
  sort($artists); // sort array alphabetically
?>
<section class="section section-yellow">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-12">
        <h2><?php _e('[:en]Exhibiting Artists[:es]Artistas presentando'); ?></h2>
      </div>
    </div>
    <div class="row">
      <?php 
        foreach ($artists as $artist) {
      ?>
      <div class="col col-l col-l-6 font-size-h3 margin-bottom-micro">
      <?php echo $artist; ?>
      </div>
      <?php 
        } 
      ?>
    </div>
  </div>
</section>
<?php 
  } 
?>