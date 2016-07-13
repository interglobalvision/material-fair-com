<?php
get_header();
?>

<!-- main content -->

<main id="main-content">
  <section id="404">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12 text-align-center">
          <h1>404</h1>
          <div class="font-size-h2 font-sans"><?php _e('[:en]Are you lost?[:es]¿Estás perdido?'); ?></div>
        </div>
      </div>
      <div class="row">
        <div  class="col col-l col-l-4 text-align-center">
          <img class="dude" src="<?php bloginfo('stylesheet_directory'); ?>/img/src/dude_1.svg">
        </div>
        <div  class="col col-l col-l-4 text-align-center">
          <img class="dude" src="<?php bloginfo('stylesheet_directory'); ?>/img/src/dude_2.svg">
        </div>
        <div  class="col col-l col-l-4 text-align-center">
          <img class="dude" src="<?php bloginfo('stylesheet_directory'); ?>/img/src/dude_3.svg">
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
?>