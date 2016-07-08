<?php 
$visitor_info_text = IGV_get_option('_igv_visitor_options', '_igv_visitor_info_page_text');
$visitor_info_image_id = IGV_get_option('_igv_visitor_options', '_igv_visitor_info_page_image_id'); 
?>
  <section id="visitor-info-intro" class="section">
    <div class="container">

      <div class="row">

        <div class="col col-l col-l-12">
          <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        </div>

      </div>
<?php 
  if ( !empty($visitor_info_image_id) || !empty($visitor_info_text) ) {
?>
      <div class="row">
<?php 
    if ( !empty($visitor_info_image_id) ) {
?>
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($visitor_info_image_id, 'col-6'); ?>
        </div>
<?php 
    } if ( !empty($visitor_info_text) ) {
?>
        <div class="col col-l col-l-6 font-size-h3">
          <?php echo apply_filters( 'the_content', $visitor_info_text ); ?>
        </div>
<?php 
    }
?>
      </div>
<?php 
  }
?>
    </div>
  </section>