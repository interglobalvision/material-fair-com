<?php 
$schedule = IGV_get_option('_igv_visitor_options', '_igv_schedule');

$tickets = IGV_get_option('_igv_visitor_options', '_igv_ticket_info');

$venue_name = IGV_get_option('_igv_visitor_options', '_igv_venue_name');
$venue_address = IGV_get_option('_igv_visitor_options', '_igv_venue_address');

$how_to_arrive = IGV_get_option('_igv_visitor_options', '_igv_how_to_arrive');
$venue_map = IGV_get_option('_igv_visitor_options', '_igv_venue_map');

  if ( !empty($schedule) || ( !empty($venue_name) && !empty($venue_address) )  || !empty($tickets) || !empty($how_to_arrive) ) {
?>
  <section id="visitor-info-info" class="section">
    <div class="container">
<?php 
    if ( !empty($schedule) ) {
?>
      <div class="row">
        <div class="col col-s col-s-12 col-m col-m-12 col-l col-l-12">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Schedule[:es]Horarios'); ?></h2>
        </div>
        <div class="col col-s-12 col-m col-m-12 col-l col-l-12 font-size-h3">
<?php 
      foreach ($schedule as $day) { 
        if (!empty($day['schedule']) && !empty($day['date'])) {
?>
          <div class="flex-row border-row padding-top-tiny u-no-p-breaks">
            <div class="col col-s col-s-6 col-m col-m-6 col-l col-l-6">
              <?php 
                _e(date('l', $day['date']));
                echo ', ' . date('j ', $day['date']);
                _e(date('F', $day['date']));
                echo date(' Y', $day['date']);
              ?>
            </div>
            <div class="col col-s col-s-6 col-m col-m-6 col-l col-l-6">
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
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-6">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]Venue[:es]Sede'); ?></h2>
          <div class="font-size-h3">
            <div class="margin-bottom-tiny"><?php echo $venue_name; ?></div>
            <?php echo apply_filters( 'the_content', $venue_address ); ?>
          </div>
        </div>
<?php 
      } if ( !empty($tickets) ) {
?>
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-6">
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
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-6 font-size-h3">
          <h2 class="margin-bottom-tiny"><?php _e('[:en]How to arrive[:es]Cómo llegar'); ?></h2>
          <?php echo apply_filters( 'the_content', $how_to_arrive ); ?>
        </div>
<?php 
      } if ( !empty($venue_map) ) {
?>
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-6 venue-map flex-col">
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