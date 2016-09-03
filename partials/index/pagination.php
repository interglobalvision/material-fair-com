<div class="row"> 
  <div class="col col-s col-s-12 col-m col-m-4 col-l col-l-4 margin-bottom-tiny">
    <h2>Reading Material</h2>
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
    $cat_string .= '<a href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a>, ';
  }

  echo rtrim($cat_string, ', ');
}
?>
  </div>

<?php
if( get_next_posts_link() || get_previous_posts_link() ) {
?>
  <div class="col col-s col-s-12 col-m col-m-4 col-l col-l-4 margin-bottom-tiny">
  <!-- post pagination -->
    <nav id="pagination">
<?php
$previous = get_previous_posts_link('Newer');
$next = get_next_posts_link('Older');
if ($previous) {
  echo $previous;
}
if ($previous && $next) {
  echo ' &mdash; ';
}
if ($next) {
  echo $next;
}
?>
    </nav>
  </div>
<?php
}
?>
</div>