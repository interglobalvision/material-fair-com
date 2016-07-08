<?php
$splash_id = IGV_get_option('_igv_site_options', '_igv_front_page_splash_id');
$splash_link = IGV_get_option('_igv_site_options', '_igv_front_page_splash_url');

if (!empty($splash_id)) { ?>
  <section id="front-splash" class="section">
    <?php 
      echo !empty($splash_link) ? '<a href="' . esc_url( $splash_link ) . '">' : ''; 
      echo wp_get_attachment_image($splash_id, 'splash', null, array('id' => 'splash-image'));
      echo !empty($splash_link) ? '</a>' : ''; 
    ?>
  </section>
<?php } ?>