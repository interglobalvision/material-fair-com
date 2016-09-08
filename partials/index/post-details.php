<?php
  $authors = get_the_terms($post->ID, 'post_author');
  $cats = get_the_terms($post->ID, 'category');
  
  $separator = '</br>';

  $details = '';

  if (is_single()) {
    $details .= get_the_date('j M Y') . $separator;
  }

  if ($authors) {
    $author_string = __('[:es]por[:en]by') . ' ';
    foreach ($authors as $author) {
      $author_string .= $author->name . ', ';
    }
    $details .= rtrim($author_string, ', ') . $separator;
  }

  if (is_single() && $cats && array_values($cats)[0]->slug !== 'uncategorized'){
    $cat_string = '';
    foreach ($cats as $cat) {
      $cat_string .= '<a href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a>, ';
    }
    $details .= rtrim($cat_string, ', ') . $separator;
  }

  echo $details;
?>