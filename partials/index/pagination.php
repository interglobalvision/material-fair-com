<div class="row"> 
  <div class="col col-s col-s-12 col-m col-m-4 col-l">
    <h2>Reading Material</h2>
  </div>

  <div class="col col-s col-s-12 col-m col-m-4 col-l">
    CATEGORIES
  </div>

  <div class="col col-s col-s-12 col-m col-m-4 col-l">
<?php
if( get_next_posts_link() || get_previous_posts_link() ) {
?>
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
<?php
}
?>
  </div>
</div>