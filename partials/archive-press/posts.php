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

    $publication = get_post_meta($post->ID, '_igv_press_publication', true);
    $date = get_post_meta($post->ID, '_igv_press_date', true);
    $author = get_post_meta($post->ID, '_igv_press_author', true);
    $link = get_post_meta($post->ID, '_igv_press_url', true);
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
} 
?>