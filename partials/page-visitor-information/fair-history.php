<?php 
$fair_history = IGV_get_option('_igv_page_options', '_igv_fair_history');
$fair_history_headline = IGV_get_option('_igv_page_options', '_igv_fair_history_headline');
$fair_history_image_id = IGV_get_option('_igv_page_options', '_igv_fair_history_image_id');

$organizers = IGV_get_option('_igv_page_options', '_igv_organizers_group');

  if ( !empty($fair_history) ||  !empty($organizers) ) {
?>
  <section id="visitor-info-history" class="section">
    <div class="container">
      <div class="row">
<?php 
    if ( !empty($fair_history) ) {
?>
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-6">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Fair History[:es]Historia de la feria'); ?></h2>
<?php 
      if ( !empty($fair_history_headline) ) { 
?>
          <p class="font-size-h3 margin-bottom-tiny"> 
            <?php echo $fair_history_headline; ?>
          </p>
<?php
      } if ( !empty($fair_history_image_id) ) { 
?>
          <?php echo wp_get_attachment_image($fair_history_image_id, 'col-6-crop', null, array('class' => 'margin-bottom-small')); ?>
<?php
      } 
?>
          <div class="font-size-h4">
            <?php echo apply_filters( 'the_content', $fair_history ); ?>
          </div>
        </div>
<?php 
    } if ( !empty($organizers) ) {
?>
        <div class="col col-s-12 col-m-6 col-l-6">
          <div class="flex-row margin-bottom-tiny">
            <div class="col-s col-s-12 col-m col-m-12 col-l col-l-12">
              <h2 class="margin-bottom-tiny"><?php _e('[:en]Organizers[:es]Organizadores'); ?></h2>
            </div>
<?php
      foreach ( $organizers as $organizer ) {
        if ( !empty($organizer['name']) && !empty($organizer['bio']) && !empty($organizer['photo_id']) ) {
?>
          
            <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6">
              <h3 class="margin-bottom-micro"><?php echo $organizer['name']; ?></h3>
              <div class="font-size-h4">
                <?php echo $organizer['bio']; ?>
              </div>
            </div>
            <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6">
              <div class="mobile-only">
                <?php echo wp_get_attachment_image($organizer['photo_id'], 'col-6-crop'); ?>
              </div>
              <div class="desktop-only">
                <?php echo wp_get_attachment_image($organizer['photo_id'], 'col-3-square'); ?>
              </div>
            </div>
          
<?php
        }
      }
?>
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