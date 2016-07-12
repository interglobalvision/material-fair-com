<?php
get_header();

$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');
$publish_exhibitors = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');
?>

<!-- main content -->

<main id="main-content">

<?php get_template_part('partials/front-page/splash'); ?>

<?php get_template_part('partials/front-page/introduction'); ?>

<?php 
// FEATURED CONTENT SECTION
?>

<?php get_template_part('partials/front-page/visitor-info'); ?>

<?php get_template_part('partials/front-page/exhibitors'); ?>

<?php get_template_part('partials/front-page/program'); ?>

<?php get_template_part('partials/front-page/partners'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>