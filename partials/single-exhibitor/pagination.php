<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
?>
<section class="section section-yellow">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-6">
        <h2 class="font-sans">Exhibitors <?php echo $current_year ? $current_year : ''; ?></h2>
      </div>
      <div class="col col-l col-l-6 flex-row justify-end">
<?php
$args = array(
  'post_type'       =>  'exhibitor',
  'orderby'         =>  'title',
  'order'           =>  'DESC',
  'p'               =>  $post->ID,
);

$my_custom_query = new WP_Query ( $args );

if ( $my_custom_query->have_posts() ) {
  while ( $my_custom_query->have_posts() ) {
    $my_custom_query->the_post();

    $previous_post = get_previous_post();

    if (!empty( $previous_post ) && $previous_post->ID != $post->ID) { 
?>
        <a class="button pagination-button" href="<?php echo get_permalink( $previous_post->ID ); ?>">
          ◀ <?php _e($previous_post->post_title); ?>
        </a>
<?php 
    }
  }
}

wp_reset_postdata();


$args['order'] = 'DESC'; 

$next_post_query = new WP_Query ( $args );

if ( $next_post_query->have_posts() ) {
  while ( $next_post_query->have_posts() ) {
    $next_post_query->the_post();
    $next_post = get_next_post();

    if (!empty( $next_post )) { 
?>
        <a class="button pagination-button" href="<?php echo get_permalink( $next_post->ID ); ?>">
          <?php _e($next_post->post_title); ?> ▶
        </a>
<?php 
    }
  }
} 

wp_reset_postdata();
?>
    </div>
  </div>
</section>