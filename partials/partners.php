<?php
$partners = IGV_get_option('_igv_sponsors_options', '_igv_partners_group');

if (!empty($partners)) {
?>
  <section id="partners" class="section">
    <div class="container">
      <div class="row">
        <div class="col col-l col-l-12">
        <?php 
          echo is_front_page() ? '<h2 class="text-align-center">' : '<h1>';
          _e('[:en]Partners[:es]Asociados'); 
          echo is_front_page() ? '</h2>' : '</h1>';
        ?>
        </div>
      </div>
      <?php 
        if (!is_front_page()) {
      ?>
      <div class="row">
        <div class="col col-l col-l-8 font-size-h3">
      Material agradece el apoyo de los siguientes patrocinadores y colaboradores, sin los cuales esta feria no podría ser posible.
        </div>
      </div>
    </div>
  </section>
  <section id="partners" class="section">
    <div class="container">
      <?php
        }
      ?>
      <div class="row justify-center align-center">
        <?php
          foreach ($partners as $partner) {  
            $partner_img = wp_get_attachment_image($partner['logo_id'], 'sponsor');
            if (is_front_page()) {
              echo '<div class="col col-l col-l-2 text-align-center margin-bottom-tiny">';
            } else {
              echo '<div class="col col-l col-l-3 text-align-center margin-bottom-basic">';
            }
            echo !empty($partner['url']) ? '<a target="_blank" rel="noopener noreferrer" href="' . esc_url($partner['url']) . '">' . $partner_img . '</a>' : $partner_img;
            echo '</div>';
          } 
        ?>
      </div>
    </div>
  </section>
<?php 
}
?>