    <footer id="footer" class="section">
    <?php 
      $logo_id = IGV_get_option('_igv_social_options', '_igv_metadata_logo_id');
      $address = IGV_get_option('_igv_site_options', '_igv_office_address');
      $email = IGV_get_option('_igv_site_options', '_igv_contact_email');
      $phone = IGV_get_option('_igv_site_options', '_igv_contact_phone');
      $mailchimp_url = IGV_get_option('_igv_site_options', '_igv_mailchimp_url');
      $sponsors = IGV_get_option('_igv_sponsors_options', '_igv_sponsors_group');
    ?>
      <div class="container">
        <div class="row">

          <div class="col col-l col-l-1 align-center">
        <?php if ($logo_id) { ?>
            <a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image($logo_id); ?></a>
        <?php } else { ?>
            <h1 class="col"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } ?>
          </div>

        <?php if ($address) { ?>

          <div class="col col-l col-l-2">
            Address
          </div>

        <?php } ?>

        <?php if ($email || $phone) { ?>

          <div class="col col-l col-l-2">
          <?php
            _e('<p>[:en]Contact[:es]Contacto</p>');

            echo ($email ? '<p><a href="mailto:' . $email . '">' . $email . '</a></p>' : '');
            echo ($phone ? '<p><a href="tel:' . $phone . '">' . $phone . '</a></p>' : ''); 
          ?>
          </div>

        <?php } ?>

        <?php if ($mailchimp_url) { ?>

          <div class="col col-l col-l-4">
            <p>Mailing List</p>
            <form method="post" id="mailchimp-form" name="mailchimp-form">
              <input type="email" size="30" value="email" name="email">
              <input type="submit" value="Subscribe" name="subscribe" class="button">
            </form>
          </div>

        <?php } ?>

          <div class="col col-l col-l-3">
            Copy / Social
          </div>

        </div>

        <?php if ($sponsors) { ?>

        <div class="row">
          <div class="col col-l col-l-12">
            Sponsors
          </div>
        </div>

        <?php } ?>

      </div>
    </footer>

  </section>

  <?php
    get_template_part('partials/scripts');
    get_template_part('partials/schema-org');
  ?>

  </body>
</html>