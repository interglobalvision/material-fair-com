<?php
  $authors = get_the_terms($post->ID, 'post_author');
  $cats = get_the_terms($post->ID, 'category');
?>

<div class="highlight-holder">

  <a href="<?php the_permalink() ?>">
    <?php the_post_thumbnail('col-12-crop', array('class'=>'highlight-image')); ?>
  </a>

  <div class="row highlight-details">
    <div class="col-s col-s-10 col-m col-m-8 col-l section-yellow padding-top-small padding-bottom-small">
      <div class="margin-bottom-micro">
        <?php get_template_part('partials/index/post-details'); ?>
      </div>

      <a href="<?php the_permalink() ?>">
        <h3 class="font-size-h1 margin-bottom-micro"><?php the_title(); ?></h3>
      </a>
    </div>
  </div>

</div>