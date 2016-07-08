<?php
get_header();

$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$current_year = (!empty($current_year_id)) ? get_term($current_year_id)->slug : false; 
// if we have the term ID, get the slug, 
// otherwise set it false for later conditionals

$press_page_text = IGV_get_option('_igv_page_options', '_igv_press_page_text');
$press_page_image_id = IGV_get_option('_igv_page_options', '_igv_press_page_image_id');
$press_accreditation = IGV_get_option('_igv_page_options', '_igv_press_accreditation_text');

?>

<!-- main content -->

<main id="main-content">

  <!-- main posts loop -->
  <section id="press-intro" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h1>
          <?php 
            _e('[:en]Press[:es]Prensa;'); 
          ?>
          </h1>
        </div>
      </div>
<?php 
if (!empty($press_page_text) || !empty($press_page_image_id)) { 
?>
      <div class="row">
<?php 
  if (!empty($press_page_image_id)) {
?>
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($press_page_image_id, 'col-6'); ?>
        </div>
<?php 
  } if (!empty($press_page_text)) { 
?>
        <div class="col col-l col-l-6">
          <div class="font-size-h3">
            <?php echo apply_filters( 'the_content', $press_page_text ); ?>
          </div>
          <div class="font-size-h4">
            <?php echo (!empty($press_accreditation) ? apply_filters( 'the_content', $press_accreditation ) : ''); ?>
          </div>
        </div>
<?php 
  }
?>
      </div>
<?php 
}
?>
    </div>
  </section>

<?php 
$args = array (
  'post_type'       => 'press',
  'posts_per_page'  => '2',
  'meta_key'        => '_igv_press_date',
  'orderby'         => 'meta_value_num',
  'meta_query'      => array( 
    array(
      'key' => '_igv_press_highlight',
      'value' => 'on',
    ),
    array(
      'key' => '_igv_press_url',
    ),
  ),
);
$highlight_press = new WP_Query( $args );

if ( $highlight_press->have_posts() ) { 
  $highlight_post = 0;
?>
  <section id="press-highlights" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2><?php _e('[:en]Highlights[:es]Destacados'); ?></h2>
        </div>
      </div>
      <div class="row">
<?php 
    while( $highlight_press->have_posts() ) {
      $highlight_press->the_post();

      $highlight_meta = get_post_meta($post->ID);

      $publication = $highlight_meta['_igv_press_publication'][0];
      $date = $highlight_meta['_igv_press_date'][0];
      $author = $highlight_meta['_igv_press_author'][0];
      $link = $highlight_meta['_igv_press_url'][0];

      if ($highlight_post == 0) { // Image first
?>
        <div class="col col-l-12 flex-row align-center">
          <div <?php post_class('col col-l col-l-6'); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php echo esc_url($link); ?>" target="_blank">
              <?php the_post_thumbnail('col-6'); ?>
            </a>
          </div>
          <div <?php post_class('col col-l col-l-6'); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php echo esc_url($link); ?>" target="_blank">
<?php 
        if (!empty($publication)) {
?>
              <div class="font-size-h3 margin-bottom-micro"><?php echo $publication; ?></div>
<?php 
        }
?>
              <h3 class="font-size-h2 margin-bottom-micro">"<?php the_title(); ?>"</h3>
<?php 
        if (!empty($author)) {
?>
              <div class="font-size-h4"><?php _e('[:en]by[:es]por'); echo ' ' . $author; ?></div>
<?php 
        }
?>
            </a>
          </div>
        </div>
<?php
      } else { // Text first
?>
        <div class="col col-l-12 flex-row align-center">
          <div <?php post_class('col col-l col-l-6'); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php echo esc_url($link); ?>" target="_blank">
<?php 
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
                <?php _e(!empty($date) ? date('j F Y', $date) : '' ); ?>
              </div>
<?php 
        }
?>
            </a>
          </div>
          <div <?php post_class('col col-l col-l-6'); ?> id="post-<?php the_ID(); ?>">
            <a href="<?php echo esc_url($link); ?>" target="_blank">
              <?php the_post_thumbnail('col-6'); ?>
            </a>
          </div>
        </div>
<?php 
      }
      $highlight_post++;
    }
?>
      </div>
    </div>
  </section>
<?php 
  }

  wp_reset_postdata();
?>

<?php
if( have_posts() ) {
?>
  <section id="press-posts" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h2><?php _e('[:en]Selected Coverage[:es]Prensa seleccionada'); ?></h2>
        </div>
      </div>
      <div class="row">
<?php 
  while( have_posts() ) {
    the_post();

    $press_meta = get_post_meta($post->ID);

    $publication = $press_meta['_igv_press_publication'][0];
    $date = $press_meta['_igv_press_date'][0];
    $author = $press_meta['_igv_press_author'][0];
    $link = $press_meta['_igv_press_url'][0];
?>

        <article <?php post_class('col col-l col-l-4 margin-bottom-small'); ?> id="post-<?php the_ID(); ?>">
          <a href="<?php echo $link; ?>" target="_blank">
            <?php the_post_thumbnail('col-4-crop'); ?>
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
            <?php _e(!empty($date) ? date('j F Y', $date) : '' ); ?>
          </a>
        </article>

<?php
    }
?>
      </div>
    </div>
  </section>
<?php 
} else {
?>
  <article class="u-alert"><?php _e('Sorry, no posts matched your criteria :{'); ?></article>
<?php
}
?>

<?php 

$tax_query = array();
if (!empty($current_year_id)) {
  $tax_query = array(
    array(
      'taxonomy' => 'fair_year',
      'field' => 'term_id',
      'terms' => $current_year_id,
    ),
  );
}

$args = array (
  'post_type' => 'photo_gallery',
  'numberposts' => '-1',
  'tax_query' => $tax_query,
);
$photo_galleries = new WP_Query( $args );

if ( $photo_galleries->have_posts() ) { 
?>
  <section id="press-photo-gallery" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h2><?php _e('[:en]Photos[:es]Fotos'); ?></h2>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row justify-center align-center">
        <div class="col col-l col-l-10">
          <div class="swiper-container">
            <div class="swiper-button-prev"></div>
            <div class="swiper-wrapper">
<?php 
    while( $photo_galleries->have_posts() ) {
      $photo_galleries->the_post();

      if ( get_post_gallery() ) {
        $gallery = get_post_gallery( $post->ID, false );
        $gids = explode( ",", $gallery['ids'] );
      
        foreach ($gids as $gid) {
          $attachment = get_post( $gid );
          $caption = $attachment->post_excerpt;
          $description = $attachment->post_content;

?>
              <div class="swiper-slide flex-col justify-center align-center">
                <img src="<?php echo wp_get_attachment_image_src($gid, 'col-8')[0]; ?>">
                <div class="margin-top-tiny text-align-center">
                  <div class="font-size-h4"><?php _e($description); ?></div>
                  <?php _e($caption); ?>
                </div>
              </div>
<?
        }
      }
    }
?>
            </div>
            <div class="swiper-button-next"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  }
?>

<?php
// LINKS TO PAST EDITIONS WILL GO HERE
?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>