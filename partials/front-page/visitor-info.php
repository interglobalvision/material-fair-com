<?php 
$schedule = IGV_get_option('_igv_visitor_options', '_igv_schedule');
$tickets = IGV_get_option('_igv_visitor_options', '_igv_ticket_info');
$venue_name = IGV_get_option('_igv_visitor_options', '_igv_venue_name');
$venue_address = IGV_get_option('_igv_visitor_options', '_igv_venue_address');

if (!empty($schedule) || ( !empty($venue_name) && !empty($venue_address) )  || !empty($tickets)) { ?>
  <section id="front-visitor-info" class="section section-yellow">
    <div class="container">
      <div class="row">
        <div class="col col-s col-s-6 col-m col-m-9 col-l col-l-10">
          <h2 class="text-align-left"><?php _e('[:en]Visitor Info[:es]Info para visitantes'); ?></h2>
        </div>
        <?php 
          $page_id = get_id_by_slug('visitor-information');
          if ($page_id) {
        ?>
          <div class="col col-s col-s-6 col-m col-m-3 col-l col-l-2">
            <a class="button col flex-row align-center justify-center" href="<?php echo get_permalink($page_id); ?>">
              <?php _e('[:en]See More[:es]Ver más'); ?>
            </a>
          </div>
        <?php } ?>
        
      </div>
      <div class="row">
      <?php if (!empty($schedule)) { ?>
        <div class="col col-s-12 col-l-6">
          <h3 class="col-s margin-bottom-tiny"><?php _e('[:en]Schedule[:es]Horario'); ?></h3>
          <?php 
            foreach ($schedule as $day) { 
              if (!empty($day['schedule']) && !empty($day['date'])) {
          ?>
          <div class="flex-row border-row padding-top-micro">
            <div class="col col-s col-s-6 font-size-h4">
              <?php _e( date('l, j F Y', $day['date']) ); ?>
            </div>
            <div class="col col-s col-s-6">
              <span class="font-size-h4"><?php echo apply_filters( 'the_content', $day['schedule'] ); ?></span>
            </div>
          </div>
          <?php 
              }
            } 
          ?>
        </div>
      <?php } if (!empty($venue_name) && !empty($venue_address)) { ?>
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-3">
          <h3 class="padding-bottom-tiny"><?php _e('[:en]Venue[:es]Sede'); ?></h3>
          <div class="font-size-h4 padding-bottom-tiny"><?php echo $venue_name; ?></div>
          <span class="font-size-h4"><?php echo apply_filters( 'the_content', $venue_address ); ?></span>
        </div>
      <?php } if (!empty($tickets)) { ?>
        <div class="col col-s col-s-12 col-m col-m-6 col-l col-l-3">
          <h3 class="padding-bottom-tiny"><?php _e('[:en]Tickets[:es]Boletos'); ?></h3>
          <ul>
            <?php foreach ($tickets as $ticket) { 
              if (!empty($ticket['class']) && !empty($ticket['price'])) {
            ?>
            <li class="padding-bottom-micro">
              <?php echo $ticket['class']; ?>:
              <div class="font-size-h4"><?php _e($ticket['price']); ?></div>
            </li>
            <?php 
              }
            } 
            ?>
          </ul>
        </div>
      <?php } ?>
      </div>
    </div>
  </section>
<?php 
} 
?>