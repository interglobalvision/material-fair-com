<?php 
$stand = get_post_meta($post->ID, '_igv_exhibitor_stand', true); 
$website = get_post_meta($post->ID, '_igv_exhibitor_url', true); 
$address = get_post_meta($post->ID, '_igv_exhibitor_address', true); 
$staff = get_post_meta($post->ID, '_igv_exhibitor_staff', true); 
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-12">
        <h1 class="u-inline-block"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<?php 
if (!empty($stand)) { 
?>
        <span class="font-size-h2 font-sans">&emsp;#<?php echo $stand; ?></span>
<?php 
}
?>
      </div>
    </div>

    <div class="row">
      <div class="col col-l col-l-6">
      <?php 
        if (has_post_thumbnail()) {
          $attachment = get_post( get_post_thumbnail_id() );
          $caption = $attachment->post_excerpt;
          $description = $attachment->post_content;

          the_post_thumbnail('col-6');

          if (!empty($caption) || !empty($description)) { 
      ?>
        <div class="margin-top-micro text-align-center">
          <div class="font-size-h4"><?php _e($description); ?></div>
          <?php _e($caption); ?>
        </div>
      <?php 
          } 
        }
      ?>
      </div>
      <div class="col col-l col-l-6">
        <div class="font-size-h4">
          <?php 
            the_content();

            if (!empty($website)) {
              echo '<p><a target="_blank" href="' . esc_url($website) . '">' . $website . '</a></p>';
            }

            if (!empty($address)) {
              echo '<p>' . apply_filters( 'the_content', $address ) . '</p>';
            }
          ?>
        </div>

        <?php
          if (!empty($staff)) {
        ?>
        <ul>
        <?php
          foreach ($staff as $member) {
        ?>
          <li class="margin-bottom-micro">
            <h4><?php echo $member['name']; ?></h4>
            <?php echo $member['role']; ?>
          </li>
        <?php
          }
        ?>
        </ul>
        <?php
          } 
        ?>
      </div>
    </div>
  </div>
</section>