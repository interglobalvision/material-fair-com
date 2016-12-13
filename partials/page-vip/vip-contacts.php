<?php 
$contacts = get_post_meta($post->ID, '_igv_vip_contacts', true);

if (!empty($contacts)) {
?>
<section id="vip-hotels" class="section">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <h2><?php _e('[:en]Contacts[:es]Contactos'); ?></h2>
      </div>
    </div>
    <div class="row margin-bottom-small">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6 font-size-h3"> 
        <?php echo apply_filters('the_content', $contacts); ?>
      </div>
    </div>
  </div>
</section>
<?php 
}
?>