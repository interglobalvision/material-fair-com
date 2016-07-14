<?php
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

if (!empty($other_years)) {
?>
<section class="section">
  <div class="container">
    <div class="row">
      <div class="col col-l col-l-12">
        <h2><?php _e('[:en]Other Editions[:es]Otras ediciónes'); ?></h2>
      </div>
    </div>
    <div class="row"> 
<?php
  foreach ($other_years as $year) {
?>
      <a href="<?php echo get_post_type_archive_link($post_type) . '?fair_year=' . $year->slug; ?>" class="col col-l col-l-2 flex-row justify-center align-center">
        <div class="button font-size-h2 font-sans"><?php echo $year->slug; ?></div>
      </a>
<?php
  }
?>
    </div>
  </div>
</section>
<?php 
} 
?>