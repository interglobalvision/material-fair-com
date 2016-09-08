<?php
  $authors = get_the_terms($post->ID, 'post_author');
  $cats = get_the_terms($post->ID, 'category');
?>

<a href="<?php the_permalink() ?>">
  <?php the_post_thumbnail('col-6-crop'); ?>
  <h3 class="margin-bottom-micro"><?php the_title(); ?></h3>
</a>

<?php get_template_part('partials/index/post-details'); ?>
