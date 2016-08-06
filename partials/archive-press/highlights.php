<?php 
if (get_fair_year_id()) {

  $current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
  $fair_year_id = get_fair_year_id();
  $fair_year = get_term($fair_year_id)->slug; 
  $current_lang = qtranxf_getLanguage();
  $other_lang = $current_lang == 'en' ? 'es' : 'en';

  $args = array (
    'post_type'       => 'press',
    'posts_per_page'  => '2',
    'meta_key'        => '_igv_press_date',
    'orderby'         => 'meta_value_num',
    'meta_query'      => array( 
      'relation' => 'AND',
      array(
        'key' => '_igv_press_highlight',
        'value' => 'on',
      ),
      array(
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
    ),
  );

  if (count(press_highlight_ids(true)) >= 2 || $current_year_id != $fair_year_id) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => $fair_year_id,
      ),
    );
  }

  $highlight_press = new WP_Query( $args );

  if ( $highlight_press->have_posts() ) { 
?>
  <section id="press-highlights" class="section section-yellow">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-12 col-m col-l text-align-center">
          <h2>
            <?php 
              _e('[:en]Highlights[:es]Destacados');
              if ($fair_year_id != $current_year_id) {
                echo ' ' . $fair_year; 
              }
            ?>
          </h2>
        </div>
      </div>
      <div class="row">
<?php 
    while( $highlight_press->have_posts() ) {
      $highlight_press->the_post();

      $publication = get_post_meta($post->ID, '_igv_press_publication', true);
      $date = get_post_meta($post->ID, '_igv_press_date', true);
      $author = get_post_meta($post->ID, '_igv_press_author', true);
      $link = get_post_meta($post->ID, '_igv_press_url', true);
?>
        <div class="col col-s-12 flex-row align-center press-highlight">
          <div <?php post_class('col col-s col-s-12 col-m col-m-6 col-l'); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php echo esc_url($link); ?>" target="_blank">
              <?php the_post_thumbnail('col-6-crop'); ?>
            </a>
          </div>
          <div <?php post_class('col col-s col-s-12 col-m col-m-6 col-l press-highlight'); ?> id="post-<?php the_ID(); ?>">
<?php 
        if (!empty($link)) {
?>
            <a<?php echo !empty($link) ? ' href="' . esc_url($link) . '" target="_blank">' : '>'; ?>
<?php 
        }

        if (!empty($publication)) {
?>
              <div class="font-size-h3 margin-bottom-micro"><?php echo $publication; ?></div>
<?php 
        }
?>
              <h3 class="font-size-h2 margin-bottom-micro">"<?php the_title(); ?>"</h3>
<?php 
        if (!empty($author) || !empty($date)) {
?>
              <div class="font-size-h4">
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
              </div>
<?php 
        }
?>
            </a>
          </div>
        </div>
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