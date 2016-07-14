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