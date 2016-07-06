<?php
/**
 * Template Name: Visitor Information
 *
 */

get_header();

$fair_description = IGV_get_option('_igv_visitor_options', '_igv_fair_description');
$fair_image_id = IGV_get_option('_igv_visitor_options', '_igv_fair_image_id');

$schedule = IGV_get_option('_igv_visitor_options', '_igv_schedule');

$tickets = IGV_get_option('_igv_visitor_options', '_igv_ticket_info');

$venue_name = IGV_get_option('_igv_site_options', '_igv_venue_name');
$venue_address = IGV_get_option('_igv_visitor_options', '_igv_venue_address');

$how_to_arrive = IGV_get_option('_igv_visitor_options', '_igv_how_to_arrive');
$venue_map = IGV_get_option('_igv_visitor_options', '_igv_venue_map');

$fair_history = IGV_get_option('_igv_page_options', '_igv_fair_history');
$fair_history_headline = IGV_get_option('_igv_page_options', '_igv_fair_history_headline');
$fair_history_image_id = IGV_get_option('_igv_page_options', '_igv_fair_history_image_id');

$organizers = IGV_get_option('_igv_page_options', '_igv_organizers_group');
?>

<!-- main content -->

<main id="main-content">

  <div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <!-- main posts loop -->
  <section id="visitor-info-intro" class="section">
    <div class="container">

      <div class="row">

        <div class="col col-l col-l-12">
          <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
        </div>

      </div>
<?php 
  if ( !empty($fair_image_id) || !empty($fair_description) ) {
?>
      <div class="row">
<?php 
    if ( !empty($fair_image_id) ) {
?>
        <div class="col col-l col-l-6">
          <?php echo wp_get_attachment_image($fair_image_id, 'col-6'); ?>
        </div>
<?php 
    } if ( !empty($fair_description) ) {
?>
        <div class="col col-l col-l-6 font-size-h3">
          <?php echo apply_filters( 'the_content', $fair_description ); ?>
        </div>
<?php 
    }
?>
      </div>
<?php 
  }
?>
    </div>
  </section>

<?php 
  if ( !empty($schedule) || ( !empty($venue_name) && !empty($venue_address) )  || !empty($tickets) || !empty($how_to_arrive) ) {
?>
  <section id="visitor-info-info" class="section">
    <div class="container">
<?php 
    if ( !empty($schedule) ) {
?>
      <div class="row">
        <div class="col col-l col-l-12">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Schedule[:es]Horario'); ?></h2>
        </div>
        <div class="col col-l-12 font-size-h3">
<?php 
      foreach ($schedule as $day) { 
        if (!empty($day['schedule']) && !empty($day['date'])) {
?>
          <div class="flex-row schedule-row">
            <div class="col col-l col-l-6">
              <?php _e( date('l, j F Y', $day['date']) ); ?>
            </div>
            <div class="col col-l col-l-6">
              <?php echo apply_filters( 'the_content', $day['schedule'] ); ?>
            </div>
          </div>
<?php
        }
      }
?>
        </div>
      </div>
<?php 
    } if ( ( !empty($venue_name) && !empty($venue_address) ) || !empty($tickets) ) {
?>
      <div class="row">
<?php 
      if ( !empty($venue_name) && !empty($venue_address) ) {
?> 
        <div class="col col-l col-l-6">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Venue[:es]Sede'); ?></h2>
          <div class="font-size-h3">
            <div class="margin-bottom-tiny"><?php echo $venue_name; ?></div>
            <?php echo $venue_address; ?>
          </div>
        </div>
<?php 
      } if ( !empty($tickets) ) {
?>
        <div class="col col-l col-l-6">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Tickets[:es]Boletos'); ?></h2>
          <ul class="font-size-h4">
          <?php foreach($tickets as $ticket) { ?>
            <li>
              <?php echo $ticket['class']; ?>:
              <p class="font-size-h3"><?php _e($ticket['price']); ?></p>
            </li>
          <?php } ?>
          </ul>
        </div>
<?php 
      }
?>
      </div>
<?php 
    } if  ( !empty($how_to_arrive) || !empty($venue_map_url) ) {
?>
      <div class="row">
<?php 
      if ( !empty($how_to_arrive) ) {
?> 
        <div class="col col-l col-l-6 font-size-h3">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]How to arrive[:es]Como llegar'); ?></h2>
          <?php echo apply_filters( 'the_content', $how_to_arrive ); ?>
        </div>
<?php 
      } if ( !empty($venue_map) ) {
?>
        <div class="col col-l col-l-6 venue-map flex-col">
          <?php echo $venue_map; ?>
        </div>
<?php 
      }
?>
      </div>
<?php 
    }
?>
    </div>
  </section>
<?php 
  }
?>

<?php 
  if ( !empty($fair_history) ||  !empty($organizers) ) {
?>
  <section id="visitor-info-history" class="section">
    <div class="container">
      <div class="row">
<?php 
    if ( !empty($fair_history) ) {
?>
        <div class="col col-l col-l-6">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Fair History[:es]Historia de la feria'); ?></h2>
<?php 
      if ( !empty($fair_history_headline) ) { 
?>
          <p class="font-size-h3 margin-bottom-tiny"> 
            <?php echo $fair_history_headline; ?>
          </p>
<?php
      } if ( !empty($fair_history_image_id) ) { 
?>
          <?php echo wp_get_attachment_image($fair_history_image_id, 'col-6', null, array('class' => 'margin-bottom-small')); ?>
<?php
      } 
?>
          <div class="font-size-h4">
            <?php echo apply_filters( 'the_content', $fair_history ); ?>
          </div>
        </div>
<?php 
    } if ( !empty($organizers) ) {
?>
        <div class="col col-l col-l-6">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Organizers[:es]Organizadores'); ?></h2>
<?php
      foreach ( $organizers as $organizer ) {
        if ( !empty($organizer['name']) && !empty($organizer['bio']) && !empty($organizer['photo_id']) ) {
?>
          <div class="flex-row margin-bottom-tiny">
            <div class="col col-6">
              <h3 class="margin-bottom-micro"><?php echo $organizer['name']; ?></h3>
              <div class="font-size-h4">
                <?php echo $organizer['bio']; ?>
              </div>
            </div>
            <div class="col col-6">
              <?php echo wp_get_attachment_image($organizer['photo_id'], 'col-3-square'); ?>
            </div>
          </div>
<?php
        }
      }
?>
        </div>
<?php 
    } 
?>
      </div>
    </div>
  </section>
<?php 
  }
?>

<!-- end main-content -->

  </div>

</main>

<?php
get_footer();
?>