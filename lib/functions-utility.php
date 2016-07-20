<?php

// to replace file_get_contents
function url_get_contents($Url) {
  if (!function_exists('curl_init')){
      die('CURL is not installed!');
  }
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $Url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($ch);
  curl_close($ch);
  return $output;
}

// get ID of page by slug
function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if($page) {
		return $page->ID;
	} else {
		return null;
	}
}
// is_single for custom post type
function is_single_type($type, $post) {
  if (get_post_type($post->ID) === $type) {
    return true;
  } else {
    return false;
  }
}

// print var in <pre> tags
function pr($var) {
  echo '<pre>';
  print_r($var);
  echo '</pre>';
}

// Debug page and template request
function debug_page_request() {
  global $wp, $template;
  define("D4P_EOL", "\r\n");
  echo '<!-- Request: ';
  echo empty($wp->request) ? "None" : esc_html($wp->request);
  echo ' -->'.D4P_EOL;
  echo '<!-- Matched Rewrite Rule: ';
  echo empty($wp->matched_rule) ? None : esc_html($wp->matched_rule);
  echo ' -->'.D4P_EOL;
  echo '<!-- Matched Rewrite Query: ';
  echo empty($wp->matched_query) ? "None" : esc_html($wp->matched_query);
  echo ' -->'.D4P_EOL;
  echo '<!-- Loaded Template: ';
  echo basename($template);
  echo ' -->'.D4P_EOL;
}

// Gets the term ID for the fair year being viewed. 
// If no current fair year set, or no fair_year query var, returns false
// For use on Exhibitors, Program, and Press archive pages
function get_fair_year_id() {
  if (!empty(get_query_var('fair_year'))) {
    $year = get_query_var('fair_year');
    $year_term = get_term_by('slug', $year, 'fair_year');
    
    if ($year_term) {
      $year_id = $year_term->term_id;
    } else {
      $year_id = false;
    }
  } elseif (!empty(IGV_get_option('_igv_site_options', '_igv_current_fair_year'))) {
    $year_id = IGV_get_option('_igv_site_options', '_igv_current_fair_year');
  } else {
    $year_id = false;
  }
  return $year_id;
}

function press_highlight_ids($by_year) {
  
  $args = array(
    'post_type' => 'press',
    'numberposts' => 2,
    'meta_query' => array( 
      array(
        'key' => '_igv_press_highlight',
        'value' => 'on',
      ),
    ),
  );

  if ($by_year && get_fair_year_id()) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'fair_year',
        'field' => 'term_id',
        'terms' => get_fair_year_id(),
      ),
    );
  }

  //get highlight posts
  $highlight_posts = get_posts($args);

  //put hightlight post ids in array
  $highlight_ids = array();
  foreach ( $highlight_posts as $post ) {
     $highlight_ids[] += $post->ID;
  }

  return $highlight_ids;
}

function count_fair_year_press() {
  if (get_fair_year_id()) {

    //get non-highlight, current year posts
    $args = array(
      'post_type' => 'press',
      'tax_query' => array(
        array(
          'taxonomy' => 'fair_year',
          'field' => 'term_id',
          'terms' => get_fair_year_id(),
        ),
      ),
      'post__not_in' => press_highlight_ids(true),
    );

    $fair_year_press = get_posts($args);

    return count($fair_year_press);
  } else {
    return 0;
  }
}
