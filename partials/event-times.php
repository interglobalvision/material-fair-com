<?php
$start = get_post_meta($post->ID, '_igv_event_start', true);
$end = get_post_meta($post->ID, '_igv_event_end', true);

  if (!empty($start)) {
?>
  <time datetime="<?php echo date('Y-m-d\TH:i:s', $start) . '-06:00'; ?>">
    <?php echo date('g:i A', $start); ?>
  </time>
<?php
  }
  if (!empty($start) && !empty($end)) {
?>
  <br>|<br>
<?php
  }
  if (!empty($end)) {
?>
  <time datetime="<?php echo date('Y-m-d\TH:i:s.uP', $end); ?>">
    <?php echo date('g:i A', $end); ?>
  </time>
<?php
  }
?>
