<?php
  $authors = get_the_terms($post->ID, 'post_author');
  $cats = get_the_terms($post->ID, 'category');

  $post_details = get_the_date('j M Y') . ' | ';

  if (count($authors) > 1) {
    $author_string = '';
    foreach ($authors as $author) {
      $author_string .= $author->name . ', ';
    }
    $post_details .= rtrim($author_string, ', ') . ' | ';
  } else {
    $post_details .= $authors[0]->name . ' | ';
  }

  if (count($cats) > 1) {
    $cat_string = '';
    foreach ($cats as $cat) {
      $cat_string .= '<a href="' . get_term_link($cat->term_id) . '">' . $cat->name . '</a>, ';
    }
    $post_details .= rtrim($cat_string, ', ') . ' | ';
  } else {
    $post_details .= '<a href="' . get_term_link($cats[0]->term_id) . '">' . $cats[0]->name . '</a> | ';
  }

  echo rtrim($post_details, ' | ');
?>