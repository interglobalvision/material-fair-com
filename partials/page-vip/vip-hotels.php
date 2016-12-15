<?php 
$hotels = get_post_meta($post->ID, '_igv_vip_hotels', true);

if (!empty($hotels)) {
?>
<section id="vip-hotels" class="section section-pink">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12 text-align-center">
        <h2><?php _e('[:en]VIP Accommodations[:es]Alojamiento VIP'); ?></h2>
      </div>
    </div>
<?php
  foreach ($hotels as $hotel) {
    if (!empty($hotel['text_en']) && !empty($hotel['text_es'])) {
      if (!empty($hotel['image'])) {
        $colClasses = 'col col-s col-s-12 col-m col-m-12 col-l col-l-6';
      } else {
        $colClasses = 'col col-s col-s-12 col-m col-m-12 col-l col-l-10';
      }
?>
    <div class="row margin-bottom-small">
<?php 
      if (!empty($hotel['image'])) {
?>
      <div class="<?php echo $colClasses; ?>"> 
        <?php echo wp_get_attachment_image($hotel['image_id'], 'col-6'); ?>
      </div>
<?php 
      } 
?>
      <div class="<?php echo $colClasses; ?>"> 
        <?php echo !empty($hotel['name']) ? '<h3 class="margin-bottom-tiny">' . $hotel['name'] . '</h3>' : ''; ?>
        <div class="font-size-h4">
          <?php echo __('[:en]' . apply_filters('the_content', $hotel['text_en']) . '[:es]' . apply_filters('the_content', $hotel['text_es']) . '[:]'); ?>
        </div>
      </div>
    </div>
<?php 
    }
  }
?>
  </div>
</section>
<?php 
}
?>