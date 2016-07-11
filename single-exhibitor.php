<?php
get_header();
?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  
  <?php get_template_part('partials/single-exhibitor/pagination'); ?>

  

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <?php get_template_part('partials/single-exhibitor/basic-info'); ?>

      <?php get_template_part('partials/single-exhibitor/artists'); ?>

      <?php get_template_part('partials/single-exhibitor/featured-works'); ?>

    </article>

<?php
  }
} else {
?>
    <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
} ?>

  <!-- end posts -->
  </section>

  <?php get_template_part('partials/single-exhibitor/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>