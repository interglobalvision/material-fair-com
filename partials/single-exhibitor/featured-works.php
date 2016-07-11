<?php
$works = get_post_meta($post->ID, '_igv_exhibitor_featured', true);
if (!empty($works)) {
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-12">
        <h2><?php _e('[:en]Featured Artworks[:es]Obras destacadas'); ?></h2>
      </div>
    </div>
    
    <?php 
      foreach ($works as $work) { 
    ?>
      <div class="row">
        
        <div class="col col-l col-l-4">
          <p class="font-size-h3"><?php echo $work['name'] ?></p>
          <p class="font-size-h3"><?php echo $work['title'] ?></p>
          <div class="font-size-h4"><?php echo apply_filters( 'the_content', $work['description'] ); ?></div>
        </div>
        <div class="col col-l col-l-8">
          <?php echo wp_get_attachment_image($work['image_id'], 'col-8-col-6'); ?>
        </div>
      </div>
    <?php 
      } 
    ?>
    
  </div>
</section>
<?php 
}
?>