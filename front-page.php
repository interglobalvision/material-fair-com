<?php
get_header();

$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');
?>

<!-- main content -->

<main id="main-content">

<?php 

get_template_part('partials/front-page/splash'); 

get_template_part('partials/front-page/introduction'); 
 
// FEATURED CONTENT SECTION

get_template_part('partials/front-page/visitor-info'); 

get_template_part('partials/front-page/exhibitors'); 

if ( $publish_program == 'on' ) {

  get_template_part('partials/archive-event/highlights');

}

get_template_part('partials/front-page/press'); 

get_template_part('partials/partners'); 

?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>