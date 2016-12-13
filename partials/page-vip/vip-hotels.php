<?php 
$hotels = get_post_meta($post->ID, '_igv_vip_hotels', true);

if (!empty($hotels)) {
?>
<section id="vip-hotels" class="section">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12 text-align-center">
        <h2><?php _e('[:en]VIP Accommodations[:es]Alojamiento VIP'); ?></h2>
      </div>
    </div>
    <div class="row">
    </div>
  </div>
</section>
<?php 
}
?>