<?php
get_header();
?>

<main id="main-content">

<?php 
$args = array(
  'posts_per_page' => 1,
);

$highlight = new WP_Query($args);
if ($highlight->have_posts()) {
  while ($highlight->have_posts()) {
    the_post();
?>
  <section class="section">
    <div class="container">
      <div class="row">
        <article <?php post_class('col col-s col-s-12 col-m col-l'); ?> id="post-<?php the_ID(); ?>">

          <?php get_template_part('index/highlight'); ?>

        </article>
      </div>
    </div>
  </section>
<?php 
  }
  wp_reset_postdata();
}
?>

  <section id="posts" class="section">
    <div class="container">
      <div class="row">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
?>
      <article <?php post_class('col col-s col-s-12 col-m col-m-6 col-l margin-bottom-small'); ?> id="post-<?php the_ID(); ?>">

        <?php get_template_part('index/post'); ?>

      </article>
<?php
  }
} else {
?>
        <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

      </div>
    </div>
  </section>

    <?php get_template_part('partials/pagination'); ?>

</main>

<?php
get_footer();
?>