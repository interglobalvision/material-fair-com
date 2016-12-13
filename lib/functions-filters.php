<?php

// Custom filters (like pre_get_posts etc)

// Page Slug Body Class
function add_slug_body_class( $classes ) {
  global $post;
  if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
  }
  return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

// Replace 'Enter title here' text on 
// Committee post type edit screen
function committee_title_text( $title ){
  $screen = get_current_screen();

  if ( $screen->post_type == 'committee' ) {
    $title = 'Enter member name here';
  }

  return $title;
}
add_filter( 'enter_title_here', 'committee_title_text' );

// Extend get terms with post type parameter.
function post_type_terms_clauses( $clauses, $taxonomy, $args ) {
  if ( isset( $args['post_type'] ) && ! empty( $args['post_type'] ) && $args['fields'] !== 'count' ) {
    global $wpdb;

    $post_types = array();

    if ( is_array( $args['post_type'] ) ) {
      foreach ( $args['post_type'] as $cpt ) {
        $post_types[] = "'" . $cpt . "'";
      }
    } else {
      $post_types[] = "'" . $args['post_type'] . "'";
    }

    if ( ! empty( $post_types ) ) {
      $clauses['fields'] = 'DISTINCT ' . str_replace( 'tt.*', 'tt.term_taxonomy_id, tt.taxonomy, tt.description, tt.parent', $clauses['fields'] ) . ', COUNT(p.post_type) AS count';
      $clauses['join'] .= ' LEFT JOIN ' . $wpdb->term_relationships . ' AS r ON r.term_taxonomy_id = tt.term_taxonomy_id LEFT JOIN ' . $wpdb->posts . ' AS p ON p.ID = r.object_id';
      $clauses['where'] .= ' AND (p.post_type IN (' . implode( ',', $post_types ) . ') OR p.post_type IS NULL)';
      $clauses['orderby'] = 'GROUP BY t.term_id ' . $clauses['orderby'];
    }
  }
  return $clauses;
}

add_filter( 'terms_clauses', 'post_type_terms_clauses', 10, 3 );

// Filter Post (Reading Material) First Highlight
function filter_post_highlight($query) {
  if (!is_admin() && is_home() && $query->is_main_query() && !is_category()) {
    //die;
    $args = array(
      'posts_per_page'   => 1,
      'meta_key'         => '_igv_post_highlight',
      'meta_value'       => 'on',
    );
    $highlight_array = get_posts($args);
    
    $query->set( 'post__not_in', array_merge($query->query_vars['post__not_in'], array($highlight_array[0]->ID)));
  }
}

add_action('pre_get_posts','filter_post_highlight');

// VIP password protected form
function vip_password_form($form) {
  global $post;

  if (is_page('vip')) {
    $label = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
    $intro = get_post_meta($post->ID, '_igv_vip_login_intro', true);
    $form = '';

    if (!empty($intro)) {
      $intro = apply_filters('the_content', $intro);
      $form .= $intro;
    }

    $form .= '<form class="post-password-form margin-top-basic" action="' . esc_url( site_url( 'wp-login.php?action=postpass', 'login_post' ) ) . '" method="post"><input name="post_password" id="' . $label . '" type="password" size="20" maxlength="20" placeholder="' . esc_attr__( "[:en]Password[:es]Contraseña[:]" ) . '" /><input type="submit" name="Submit" value="' . esc_attr__( "[:en]Submit[:es]Enviar[:]" ) . '" />
    </form>
    ';

    if (wp_get_referer() == get_permalink() || isset ( $_COOKIE[ 'wp-postpass_' . COOKIEHASH ] ) ) {
      // Translate and escape.
      $msg = __( '[:en]Incorrect Password[:es]Contraseña Incorrecta[:]');

      // We have a cookie, but it doesn’t match the password.
      $msg = "<p class='wrong-password margin-bottom-small'>$msg</p>";

      return $msg . $form;
    }
  }

  return $form;
}

add_filter( 'the_password_form', 'vip_password_form' );

// Gravity Forms
// disable scrollto on confirmation
add_filter( 'gform_confirmation_anchor', '__return_false' );
