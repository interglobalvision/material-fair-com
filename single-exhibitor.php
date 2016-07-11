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

    $stand = get_post_meta($post->ID, '_igv_exhibitor_stand', true); 
    $staff = get_post_meta($post->ID, '_igv_exhibitor_staff', true); 
?>

    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

      <section class="section">
        <div class="container">

          <div class="row">
            <div class="col col-l col-l-12">
              <h1 class="u-inline-block"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<?php 
    if (!empty($stand)) { 
?>
              <span class="font-size-h2 font-sans">&emsp;#<?php echo $stand; ?></span>
<?php 
    }
?>
            </div>
          </div>

          <div class="row">
            <div class="col col-l col-l-6">
              <?php the_post_thumbnail('col-6'); ?>
            </div>
            <div class="col col-l col-l-6">
              <?php the_content(); ?>

              <?php if (!empty($staff)) {
                foreach ($staff as $member) {
                  echo $member['name'];
                  echo $member['role'];
                }
              } ?>
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

  <!-- end posts -->
  </section>

  <?php get_template_part('partials/single-exhibitor/pagination'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>