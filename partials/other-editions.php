<?php
$current_year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
$fair_year_id = get_fair_year_id();
$post_type = get_post_type();

$other_years = get_terms(array(
  'taxonomy' => 'fair_year',
  'exclude' => $fair_year_id,
  'hide_empty' => true,
  'orderby' => 'name',
  'order' => 'desc',
  'post_type' => array($post_type,),
));

if (!empty($other_years) && !empty($current_year_id)) {
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col-s col-s-12">
        <h2><?php _e('[:en]Other Editions[:es]Otras ediciones'); ?></h2>
      </div>
    </div>
    <div class="row"> 
      <div class="col col-s col-s-12 flex-row">
<?php
  foreach ($other_years as $year) {
    $current_year_slug = get_term($current_year_id)->slug; 
    $this_slug = $year->slug;
?>
        <a class="button font-size-h2 font-sans button-margin-right margin-bottom-tiny" href="<?php
          if ($this_slug == $current_year_slug) { // go to main archive page
            echo get_post_type_archive_link($post_type);
          } else { // go to past year archive page
            echo get_post_type_archive_link($post_type) . '?fair_year=' . $year->slug;
          }
        ?>"><?php echo $year->slug; ?></a>

<?php
  }
?>
      </div>
    </div>
  </div>
</section>
<?php 
} 
?>