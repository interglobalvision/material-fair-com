<?php
$start = get_post_meta($post->ID, '_igv_event_start', true);
$end = get_post_meta($post->ID, '_igv_event_end', true);
$artist = get_post_meta($post->ID, '_igv_event_artist', true);
$location = get_post_meta($post->ID, '_igv_event_location', true);
$url = get_post_meta($post->ID, '_igv_event_url', true); 
?>
<div class="col col-l col-l-6">
  <?php echo !empty($url) ? '<a href="' . $url . '" target="_blank" rel="noopener noreferrer">' : ''; ?>
  <?php the_post_thumbnail('col-6', array('class' => 'margin-bottom-micro')); ?>
  <?php echo !empty($url) ? '</a>' : ''; ?>
  <div class="flex-row">
    <?php if (!empty($start) || !empty($end)) { ?>
    <div class="col col-l-4 font-size-h4 text-align-center">
      <?php get_template_part('partials/event-times'); ?> 
    </div>
    <?php } ?>
    <div class="col col-l-8">
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
</div>