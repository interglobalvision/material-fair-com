<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 

$current_post_id = $post->ID;
?>
<section class="section section-yellow">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-6">
        <h2 class="font-sans"><?php 
          _e('[:en]Exhibitors[:es]Expositores'); 
          echo $current_year ? ' ' . $current_year : ''; 
        ?></h2>
      </div>
      <div class="col col-l col-l-6 flex-row justify-end">
<?php

if ($current_year) {

$args = array(
  'post_type'       =>  'exhibitor',
  'orderby'         =>  'title',
  'order'           =>  'ASC',
  'posts_per_page'  =>  -1,
  'tax_query'       =>  array(
    array(
      'taxonomy' => 'fair_year',
      'field' => 'term_id',
      'terms' => $current_year_id, // get posts with current year
    )
  ),
);

$query = new WP_Query ( $args );

if ( $query->have_posts() ) {

  $query_posts = $query->posts; // get array of posts returned;
  $id_array = array();

  foreach ($query_posts as $query_post) { // pust post IDs into new array
    array_push($id_array, $query_post->ID);
  }

  $current_post_key = array_search($current_post_id, $id_array); // find key of current post in array

  if (array_key_exists( $current_post_key - 1, $id_array )) { // if current key - 1 exists in array
    $previous_post = get_post($id_array[($current_post_key - 1)]); //thats the previous post
  } else {
    $previous_post = get_post($id_array[count($id_array) - 1]); // otherwise we get the last post
  }

  if (!empty( $previous_post )) { 
?>
        <a class="button pagination-button" href="<?php echo get_permalink( $previous_post->ID ); ?>">
          ◀ <?php _e($previous_post->post_title); ?>
        </a>
<?php 
  }

  if (array_key_exists( $current_post_key + 1, $id_array )) { // if current key + 1 exists in array
    $next_post = get_post($id_array[($current_post_key + 1)]); //thats the next post
  } else {
    $next_post = get_post($id_array[0]); // otherwise we get the first post
  }

  if (!empty( $next_post )) { 
?>
        <a class="button pagination-button" href="<?php echo get_permalink( $next_post->ID ); ?>">
          <?php _e($next_post->post_title); ?> ▶
        </a>
<?php 
  }
} 

wp_reset_postdata();

}
?>
    </div>
  </div>
</section>