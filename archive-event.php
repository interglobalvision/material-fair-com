<?php
get_header();

$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$fair_year_id = get_fair_year_id();
?>

<!-- main content -->

<main id="main-content">

<?php 
if ($current_year_id == $fair_year_id) {

  get_template_part('partials/intro-section'); 

}
?>

<?php get_template_part('partials/archive-event/highlights'); ?>

<?php get_template_part('partials/archive-event/schedule'); ?>

<?php get_template_part('partials/past-years'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>
