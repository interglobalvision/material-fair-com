<div class="row"> 
  <div class="col col-s col-s-12 col-m col-m-4 col-l col-l-4 margin-bottom-tiny font-size-h3">
<?php
$page_id = get_id_by_slug('reading-material');
?>
    <h2>
      <a<?php echo $page_id ? ' href="' . get_permalink($page_id) . '"' : ''; ?>>Reading Material</a>
    </h2>
<?php
if (is_category()) {
?>
    <?php single_cat_title(); ?>
<?php
}
?>
  </div>

  <div class="col col-s col-s-12 col-m col-m-4 col-l col-l-4 margin-bottom-tiny font-size-h3">
<?php 
$cats = get_terms( array(
  'taxonomy' => 'category',
  'hide_empty' => true,
));

if ($cats && array_values($cats)[0]->slug !== 'uncategorized'){
  $cat_string = '';

  foreach ($cats as $cat) {
    $cat_string .= '<a class="border-underline" href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a>, ';
  }

  echo rtrim($cat_string, ', ');
}
?>
  </div>

<?php
if (is_single()) {
  $show_previous = get_previous_post_link();
  $show_next = get_next_post_link();
} else {
  $show_previous = get_previous_posts_link();
  $show_next = get_next_posts_link();
}

if ($show_previous || $show_next) {
?>
  <div class="col col-s col-s-12 col-m col-m-4 col-l col-l-4 margin-bottom-tiny flex-row pagination-container align-start">
  <!-- post pagination -->
<?php
  if ($show_previous) {
    if (is_single()) {
      $adjacent_post = get_adjacent_post(false, '', true);
      $post_link = get_permalink($adjacent_post);
    } else {
      $post_link = previous_posts(0, false);
    }
?>
    <a class="button pagination-button flex-row align-center" href="<?php echo $post_link; ?>">
      <div>◀&nbsp;</div><div><?php _e('[:es]Anterior[:en]Previous'); ?></div>
    </a>
<?php
  }

  if ($show_next) {
    if (is_single()) {
      $adjacent_post = get_adjacent_post(false, '', false);
      $post_link = get_permalink($adjacent_post);
    } else {
      $post_link = next_posts(0, false);
    }
?>
    <a class="button pagination-button flex-row align-center" href="<?php echo $post_link; ?>">
      <div><?php _e('[:es]Siguiente[:en]Next'); ?></div><div>&nbsp;▶</div>
    </a>
<?php
  }
?>
  </div>
<?php
}
?>
</div>
