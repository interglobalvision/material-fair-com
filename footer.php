    <footer id="footer" class="section">
    <?php 
      $logo_id = IGV_get_option('_igv_social_options', '_igv_metadata_logo_id');

      $address = IGV_get_option('_igv_site_options', '_igv_office_address');

      $email = IGV_get_option('_igv_site_options', '_igv_contact_email');
      $phone = IGV_get_option('_igv_site_options', '_igv_contact_phone');

      $mailchimp_url = IGV_get_option('_igv_site_options', '_igv_mailchimp_url');

      $sponsors = IGV_get_option('_igv_sponsors_options', '_igv_sponsors_group');

      $facebook = IGV_get_option('_igv_social_options', '_igv_socialmedia_facebook_url');
      $twitter = IGV_get_option('_igv_social_options', '_igv_socialmedia_twitter');
      $instagram = IGV_get_option('_igv_social_options', '_igv_socialmedia_instagram');
    ?>
      <div class="container">

        <div class="row">

          <div class="col col-l col-l-1 align-center">
        <?php if (!empty($logo_id)) { ?>
            <a href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image($logo_id, 'thumbnail'); ?></a>
        <?php } else { ?>
            <h1 class="col"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } ?>
          </div>

        <?php if (!empty($address)) { ?>

          <div class="col col-l col-l-2">
          <?php
            _e('<p>Material Art Fair [:en](Office)[:es](Oficina)</p>');

            echo wpautop($address);
          ?>
          </div>

        <?php } ?>

        <?php if (!empty($email) || !empty($phone)) { ?>

          <div class="col col-l col-l-2">
          <?php
            _e('<p>[:en]Contact[:es]Contacto</p>');

            echo ($email ? '<p><a href="mailto:' . $email . '">' . $email . '</a></p>' : '');
            echo ($phone ? '<p><a href="tel:' . $phone . '">' . $phone . '</a></p>' : ''); 
          ?>
          </div>

        <?php } ?>

        <?php if (!empty($mailchimp_url)) { ?>

          <div class="col col-l col-l-4">
            <p>Mailing List</p>
            <form method="post" id="mailchimp-form" name="mailchimp-form">
              <input type="email" size="30" value="email" name="email">
              <input type="submit" value="Subscribe" name="subscribe" class="button">
            </form>
          </div>

        <?php } ?>

          <div class="col col-l col-l-3 text-align-right">

            <?php 
            if (!empty($facebook) || !empty($twitter) || !empty($instagram)) { 
              if (!empty($facebook)) { 
                echo '<a href="' . $facebook . '" class="social-icon"><img src="' . get_stylesheet_directory_uri() . '/img/dist/facebook.svg"></a>'; 
              } if (!empty($twitter)) {
                echo '<a href="https://twitter.com/' . $twitter . '" class="social-icon"><img src="' . get_stylesheet_directory_uri() . '/img/dist/twitter.svg"></a>'; 
              } if (!empty($instagram)) { 
                echo '<a href="https://www.instagram.com/' . $instagram . '" class="social-icon"><img src="' . get_stylesheet_directory_uri() . '/img/dist/instagram.svg"></a>'; 
              }
            } ?>

          </div>

        </div> <!-- END ROW -->

        <?php if ($sponsors) { ?>

        <div class="row">
          <div class="col col-l col-l-12 flex-row align-center">
          <?php foreach ($sponsors as $sponsor) { ?>
          
            <?php 
              $sponsor_img = wp_get_attachment_image($sponsor['logo_id'], 'sponsor', null, array( 'class' => 'lead-sponsor-logo' ));
              echo (!empty($sponsor['url']) ? '<a href="' . $sponsor['url'] . '">' . $sponsor_img . '</a>' : $sponsor_img); 
            ?>
          
          <?php } ?>
          </div>
        </div>

        <?php } ?>

        <div class="row">
          <div class="col col-s">
            <span class="font-small-caps">&copy; <?php echo get_the_date('Y'); ?> Feria de Arte Material México SA de CV</span>
          </div>
        </div>

      </div> <!-- END CONTAINER -->
    </footer>

  </section>

  <?php
    get_template_part('partials/scripts');
    get_template_part('partials/schema-org');
  ?>

  </body>
</html>