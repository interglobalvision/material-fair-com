<?php
get_header();

$publish_exhibitors = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');
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

<?php get_template_part('partials/archive-exhibitor/committee'); ?>

<?php
// if the application hasn't ended and 
// exhibitors are not published, 
// show the Apply Now section
if (($current_year_id == $fair_year_id && $publish_exhibitors == 'on') || $current_year_id != $fair_year_id) {

  get_template_part('partials/archive-exhibitor/exhibitors');

} else {

  get_template_part('partials/archive-exhibitor/apply'); 

}
?>

<?php get_template_part('partials/other-editions'); ?>

<!-- end main-content -->

</main>

<?php
get_footer();
?>