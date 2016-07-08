<?php
$partners = IGV_get_option('_igv_sponsors_options', '_igv_partners_group');

if (!empty($partners)) {
?>
  <section id="front-partners" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
          <h2 class="text-align-center"><?php _e('[:en]Partners[:es]Asociados'); ?></h2>
        </div>
      </div>
      <div class="row justify-center align-center">
        <?php
          foreach ($partners as $partner) {  
            $partner_img = wp_get_attachment_image($partner['logo_id'], 'sponsor');
            echo '<div class="col col-l col-l-2 text-align-center">';
            echo !empty($partner['url']) ? '<a href="' . esc_url($partner['url']) . '">' . $partner_img . '</a>' : $partner_img;
            echo '</div>';
          } 
        ?>
      </div>
    </div>
  </section>
<?php 
}
?>