<?php
if ( get_post_gallery($post->ID) ) {
  $gallery = get_post_gallery( $post->ID, false );
  $gids = explode( ",", $gallery['ids'] );

  foreach ($gids as $gid) {
    $attachment = get_post( $gid );
    $caption = $attachment->post_excerpt;
    $description = $attachment->post_content;

?>
  <div class="swiper-slide flex-col justify-center align-center">
    <img src="<?php echo wp_get_attachment_image_src($gid, 'col-8')[0]; ?>">
    <div class="margin-top-tiny text-align-center">
      <div class="font-size-h4"><?php _e($description); ?></div>
      <?php _e($caption); ?>
    </div>
  </div>
<?
    }
  }
?>