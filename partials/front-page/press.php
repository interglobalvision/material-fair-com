<?php
$args = array (
  'post_type'       => 'press',
  'posts_per_page'  => '3',
  'meta_key'        => '_igv_press_date',
  'orderby'         => 'meta_value_num',
  'meta_query'      => array( 
    array(
      'key' => '_igv_press_highlight',
      'value' => 'on',
    ),
  ),
);
$press = new WP_Query( $args );

if ( $press->have_posts() ) { 
?>
  <section id="front-press" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Press[:es]Prensa'); ?></h2>
        </div>
        <div class="col col-l col-l-2">
          <a class="button col flex-row align-center justify-center" href="<?php echo get_post_type_archive_link( 'press' ); ?>"><?php _e('[:en]See More[:es]Ver más'); ?></a>
        </div>
      </div>
      <div class="row">
<?php
  while ( $press->have_posts() ) {
    $press->the_post();

    $press_author = get_post_meta($post->ID, '_igv_press_author', false)[0];
    $press_pub = get_post_meta($post->ID, '_igv_press_publication', false)[0];
    $press_url = get_post_meta($post->ID, '_igv_press_url', false)[0];

    if (!empty($press_url)) {
?>
        <div class="col col-l col-l-4">
<?php 
      if (!empty($press_pub)) {
?>
          <h4 class="margin-bottom-tiny">
            <a target="_blank" href="<?php echo esc_url($press_url); ?>">
              <?php echo $press_pub; ?>
            </a>
          </h4>
<?php 
      }
?>
          <h3 class="margin-bottom-tiny">
            <a target="_blank" href="<?php echo esc_url($press_url); ?>">
              <?php echo '"' . get_the_title() . '"'; ?>
            </a>
          </h3>
<?php 
      if (!empty($press_author)) {
?>
          <a target="_blank" href="<?php echo esc_url($press_url); ?>">
            <?php
              _e('[:en]by[:es]por');
              echo ' ' . $press_author;
            ?>
          </a>
<?php 
      }
?>
        </div>
<?php
    }
  }
?>
      </div>
    </div>
  </section>
<?php 
}

wp_reset_postdata();
?>