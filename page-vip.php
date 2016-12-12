<?php
get_header();
?>

<main id="main-content">

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    if (has_post_thumbnail()) {
      $colClasses  = 'col col-s col-s-12 col-m col-m-12 col-l col-l-6';
    } else {
      $colClasses  = 'col col-s col-s-12 col-m col-m-12 col-l col-l-10';
    }
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
        <h1>VIP</h1>
      </div>
    </div>
    <div class="row">
<?php 
    if (has_post_thumbnail()) {
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
  }
}
?>
</main>

<?php
get_footer();
?>
