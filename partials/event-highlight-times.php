<div class="event-times">
<?php 
$start = get_post_meta($post->ID, '_igv_event_start', true);
$end = get_post_meta($post->ID, '_igv_event_end', true);

  if (!empty($start)) {
?>
  <time datetime="<?php echo date('Y-m-d\TH:i:s', $start) . '-06:00'; ?>" class="event-time">
    <span class="event-times-day">
      <?php _e(date('D', $start)); ?>, <?php _e(date('j', $start)); ?> <?php _e(date('M', $start)); ?>
    </span>
    <?php echo date('g:i A', $start); ?>
  </time>
<?php 
  }
  if (!empty($start) && !empty($end)) {
?>
  <div class="event-times-divider">|</div>
<?php
  }
  if (!empty($end)) {
?>
  <time datetime="<?php echo date('Y-m-d\TH:i:s.uP', $end); ?>" class="event-time">
    <span class="event-times-day">
      <?php _e(date('D', $end)); ?>, <?php _e(date('j', $end)); ?> <?php _e(date('M', $end)); ?>
    </span>
    <?php echo date('g:i A', $end); ?>
  </time>
<?php 
  }
?>
</div>