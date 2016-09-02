<?php
  $authors = get_the_terms($post->ID, 'post_author');
  $cats = get_the_terms($post->ID, 'category');
?>

<div class="margin-bottom-micro">
  <?php get_template_part('partials/index/post-details'); ?>
</div>

<a href="<?php the_permalink() ?>">
  <h3 class="margin-bottom-micro"><?php the_title(); ?></h3>
  <?php the_post_thumbnail('col-6-crop'); ?>
</a>