<?php
$start = get_post_meta($post->ID, '_igv_event_start', true);
$end = get_post_meta($post->ID, '_igv_event_end', true);
$artist = get_post_meta($post->ID, '_igv_event_artist', true);
$location = get_post_meta($post->ID, '_igv_event_location', true);
$url = get_post_meta($post->ID, '_igv_event_url', true); 
?>
<div class="col col-s col-s-12 col-l col-l-6 flex-row">
  <?php echo !empty($url) ? '<a href="' . $url . '" target="_blank" rel="noopener noreferrer" class="col col-s col-s-12">' : ''; ?>
  <?php the_post_thumbnail('col-6-crop', array('class' => 'margin-bottom-micro')); ?>
  <?php echo !empty($url) ? '</a>' : ''; ?>
  <div class="col col-s-12 col-m-4 font-size-h4">
    <?php 
      if (!empty($start) || !empty($end)) { 
        get_template_part('partials/event-highlight-times'); 
      } 
    ?>
  </div>
  <div class="col col-s-12 col-m-8">
    <span class="font-size-h4">
      <?php 
        echo !empty($url) ? '<a href="' . $url . '" target="_blank" rel="noopener noreferrer">' : ''; 
        echo !empty($artist) ? $artist : ''; 
        echo !empty($artist) && !empty($location) ? ' @ ' : ''; 
        echo !empty($location) ? $location : ''; 
        echo !empty($url) ? '</a>' : ''; 
      ?>
    </span>
    <h3 class="margin-bottom-micro">
      <?php 
        echo !empty($url) ? '<a href="' . $url . '" target="_blank" rel="noopener noreferrer">' : '';
        the_title();
        echo !empty($url) ? '</a>' : ''; 
      ?>
    </h3>
    <?php the_content() ?>
  </div>
</div>