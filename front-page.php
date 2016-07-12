<?php
get_header();
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

<?php get_template_part('partials/archive-event/highlights'); ?>

<?php get_template_part('partials/front-page/partners'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>