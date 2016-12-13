<?php
get_header();
?>

<main id="main-content">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    if (has_post_thumbnail()) {
      $colClasses = 'col col-s col-s-12 col-m col-m-12 col-l col-l-6';
    } else {
      $colClasses = 'col col-s col-s-12 col-m col-m-12 col-l col-l-10';
    }
?>
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
          <h1><?php the_title(); ?></h1>
        </div>
      </div>
      <div class="row">
<?php 
    if (has_post_thumbnail() && !post_password_required()) {
?>
    <div class="<?php echo $colClasses; ?>">
      <?php the_post_thumbnail(); ?>
    </div>
<?php
    }
?>
    <div class="<?php echo $colClasses; ?>">
      <div class="font-size-h3">
        <?php the_content(); ?>
      </div>
    </div>

    </div>
  </section>

<?php 
    if (!post_password_required()) {
      get_template_part('partials/page-vip/vip-hotels');

      get_template_part('partials/archive-event/schedule');

      get_template_part('partials/partners'); 

      get_template_part('partials/page-vip/vip-contacts');
    }
  }
}
?>
</main>

<?php
get_footer();
?>
