<?php
get_header();
?>

<main id="main-content">

  <section class="section section-pink">
    <div class="container">
      <?php get_template_part('partials/index/pagination'); ?>
    </div>
  </section>

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    $authors = get_the_terms($post->ID, 'post_author');
    $cats = get_the_terms($post->ID, 'category');
?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <section id="posts" class="section">
    <div class="container">
      <div class="row margin-bottom-small">
        <div class="col col-s col-s-12 col-m col-m-4 col-l col-l-4 font-size-h4">
          <?php get_template_part('partials/index/post-details'); ?>
        </div>

        <div class="col col-s col-s-12 col-m col-m-8 col-l col-l-6">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
    </div>
  </section>

  <section id="posts" class="section section-black-trans font-size-h4">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-8 offset-m-4 col-l col-l-6 offset-l-4">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
  </section>

</article>
<?php
  }
} else {
?>
        <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

      </div>
  </section>

  <section class="section section-pink">
    <div class="container">
      <?php get_template_part('partials/index/pagination'); ?>
    </div>
  </section>

</main>

<?php
get_footer();
?>