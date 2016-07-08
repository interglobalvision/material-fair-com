<?php
get_header();

$publish_exhibitors = IGV_get_option('_igv_page_options', '_igv_publish_exhibitors');
$exhibitors_apply_text = IGV_get_option('_igv_page_options', '_igv_exhibitors_apply_text');
$apply_url = IGV_get_option('_igv_site_options', '_igv_apply_url');
$apply_end = IGV_get_option('_igv_site_options', '_igv_apply_end');
?>

<!-- main content -->

<main id="main-content">

<?php get_template_part('partials/archive-press/introduction'); ?>

<?php get_template_part('partials/archive-press/committee'); ?>

<?php
// if the application hasn't ended and 
// exhibitors are not published, 
// show the Apply Now section
if ( !empty($apply_end) && time() <= $apply_end && !$publish_exhibitors && !empty($exhibitors_apply_text) && !empty($apply_url) ) { 

  get_template_part('partials/archive-press/apply'); 

// Otherwise if the exhibitors are published, 
// show exhibitor list section
} elseif ( $publish_exhibitors ) { 

  get_template_part('partials/archive-press/exhibitors');

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