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
          <h1><?php _e('[:en]VIP Program[:es]Programa VIP'); ?></h1>
        </div>
      </div>
      <div class="row">
<?php
    if (has_post_thumbnail()) {
?>
        <div class="<?php echo $colClasses; ?>">
          <?php the_post_thumbnail('col-6'); ?>
        </div>
<?php
    }
?>
        <div class="<?php echo $colClasses; ?>">
          <div class="<?php echo has_post_thumbnail() ? 'font-size-h4' : 'font-size-h3'; ?>">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
<?php
    if (!post_password_required()) {
      $rsvp_text = get_post_meta($post->ID, '_igv_vip_rsvp_text', true);
?>
    </div>
  </section>
  <section id="vip-rsvp" class="section">
    <div class="container">
      <div class="row">
        <div id="vip-rsvp-text-container" class="col col-s col-s-12 col-m col-m-12 col-l col-l-6 font-size-h1 font-sans">
          <?php echo !empty($rsvp_text) ? apply_filters('the_content', $rsvp_text) : ''; ?>
          <button class="button font-size-h3 margin-top-small margin-bottom-small" id="show-vip-rsvp"><?php _e('[:en]I\'m Attending[:es]Asistiré'); ?></button>
        </div>
        <div id="vip-rsvp-form-container" class="col col-s col-s-12 col-m col-m-12 col-l col-l-6 offset-l-6">
          <h2 class="margin-bottom-small">RSVP</h2>
          <?php gravity_form('VIP RSVP', false, false, false, '', true); ?>
        </div>
      </div>
<?php
    }
?>
    </div>
  </section>

<?php
    if (!post_password_required()) {
      get_template_part('partials/archive-event/schedule');
      
      get_template_part('partials/page-vip/vip-hotels');

      get_template_part('partials/page-vip/vip-recommendations');

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
