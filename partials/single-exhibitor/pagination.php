<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');

if ($current_year_id == get_fair_year_id()) { 

$current_year = get_term($current_year_id)->slug;
$current_post_id = $post->ID;
?>
<section class="section section-yellow pagination-section">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6">
        <h2 class="font-sans"><?php 
          _e('[:en]Exhibitors[:es]Expositores'); 
          echo ' ' . $current_year; 
        ?></h2>
      </div>
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-6 flex-row pagination-container">
<?php
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

  } elseif ($query->found_posts > 2) { // if more than 2 posts, we loop the pagination

    $previous_post = get_post($id_array[count($id_array) - 1]); // otherwise we get the last post

  }

  if (array_key_exists( $current_post_key + 1, $id_array )) { // if current key + 1 exists in array

    $next_post = get_post($id_array[($current_post_key + 1)]); //thats the next post

  } elseif ($query->found_posts > 2) { // if more than 2 posts, we loop the pagination

    $next_post = get_post($id_array[0]); // otherwise we get the first post

  }

  if (!empty( $previous_post )) {
?>
        <a class="button pagination-button flex-row align-center" href="<?php echo get_permalink( $previous_post->ID ); ?>">
          <div>◀&nbsp;</div><div><?php _e($previous_post->post_title); ?></div>
        </a>
<?php 
  }

  

  if (!empty( $next_post )) { 
?>
        <a class="button pagination-button flex-row align-center" href="<?php echo get_permalink( $next_post->ID ); ?>">
          <div><?php _e($next_post->post_title); ?></div><div>&nbsp;▶</div>
        </a>
<?php 
  }
} 

wp_reset_postdata();

?>
    </div>
  </div>
</section>
<?php 
}
?>