<?php
$museums = get_post_meta($post->ID, '_igv_vip_museums', true);
$galleries = get_post_meta($post->ID, '_igv_vip_galleries', true);
$restaurants = get_post_meta($post->ID, '_igv_vip_restaurants', true);
$other = get_post_meta($post->ID, '_igv_vip_other', true);

if (!empty($museums) || !empty($galleries) || !empty($restaurants) || !empty($other)) {
?>
<section id="vip-recommendations" class="section section-black">
  <div class="container">

<?php
  if (!empty($museums)) {
?>
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <h2 class="margin-bottom-tiny"><?php _e('[:en]Museums[:es]Museos[:]'); ?></h2>
        <?php echo apply_filters('the_content', $museums); ?>
      </div>
    </div>
<?php
  }
  if (!empty($galleries)) {
?>
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <h2 class="margin-bottom-tiny"><?php _e('[:en]Galleries & Project Spaces[:es]Galerías y Espacios de Proyectos[:]'); ?></h2>
        <?php echo apply_filters('the_content', $galleries); ?>
      </div>
    </div>
<?php
  }
  if (!empty($restaurants)) {
?>
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <h2 class="margin-bottom-tiny"><?php _e('[:en]Restaurants & Bars[:es]Restaurantes y Bares[:]'); ?></h2>
        <?php echo apply_filters('the_content', $restaurants); ?>
      </div>
    </div>
<?php
  }
  if (!empty($other)) {
?>
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <h2 class="margin-bottom-tiny"><?php _e('[:en]Other[:es]Otros[:]'); ?></h2>
        <?php echo apply_filters('the_content', $other); ?>
      </div>
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
