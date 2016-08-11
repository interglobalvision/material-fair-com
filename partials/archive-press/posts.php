<?php
if (get_fair_year_id()) {

  $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
  $fair_year_id = get_fair_year_id();
  $fair_year = get_term($fair_year_id)->slug;
  $current_lang = qtranxf_getLanguage();
  $other_lang = $current_lang == 'en' ? 'es' : 'en';

  $args = array (
    'post_type' => array('press'),
    'post__not_in' => press_highlight_ids(false),
    'posts_per_page' => -1,
    'meta_query' => array(
      'relation' => 'OR',
      array(
        'key'     => '_igv_press_lang_' . $current_lang,
        'value'   => 'on',
        'compare' => '=',
      ),
      array(
        'relation' => 'AND',
        array(
          'key' => '_igv_press_lang_' . $current_lang,
          'compare' => 'NOT EXISTS',
        ),
        array(
          'key' => '_igv_press_lang_' . $other_lang,
          'compare' => 'NOT EXISTS',
        ),
      ),
    ),
  );

  if ($current_year_id == $fair_year_id && count_fair_year_press() < 3) {
    $args['posts_per_page'] = 12;
  } else {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $fair_year_id,
      ),
    );
  }

  $query = new WP_Query( $args );

  if( $query->have_posts() ) {
?>
  <section id="press-posts" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
          <h2><?php
            _e('[:en]Selected Coverage[:es]Prensa seleccionada');
            if ($fair_year_id != $current_year_id) {
              echo ' ' . $fair_year;
            }
          ?></h2>
        </div>
      </div>
      <div class="row">
<?php
    while( $query->have_posts() ) {
      $query->the_post();

      $publication = get_post_meta($post->ID, '_igv_press_publication', true);
      $date = get_post_meta($post->ID, '_igv_press_date', true);
      $author = get_post_meta($post->ID, '_igv_press_author', true);
      $link = get_post_meta($post->ID, '_igv_press_url', true);
?>

        <article <?php post_class('col col-s col-s-12 col-m col-m-6 col-l col-l-4 margin-bottom-small'); ?> id="post-<?php the_ID(); ?>">
          <a<?php echo !empty($link) ? ' href="' . esc_url($link) . '" target="_blank">' : '>'; ?>
            <?php the_post_thumbnail('col-6-crop'); ?>
<?php
      if (!empty($publication)) {
?>
            <div class="font-size-h4"><?php echo $publication; ?></div>
<?php
    }
?>
            <h3><?php the_title(); ?></h3>
            <?php
              if (!empty($author)) {
                _e('[:en]by[:es]por');
                echo ' ' . $author;
              }
            ?>
            <?php echo (!empty($date) && !empty($author) ? ' | ' : '' ); ?>
            <?php
              if(!empty($date)) {
                echo date('j ', $date);
                _e(date('F', $date));
                echo date(' Y', $date);
              }
            ?>
          </a>
        </article>

<?php
    }
?>
      </div>
    </div>
  </section>
<?php
  }
wp_reset_postdata();
}
?>