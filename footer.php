    <footer id="footer" class="section section-yellow">
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

          <div class="col col-l col-l-2">
            <nav>
              <ul>
              <?php 
                $page_id = get_id_by_slug('visitor-information');
                if ($page_id) {
              ?>
                <li>
                  <a class="border-underline" href="<?php echo get_permalink($page_id); ?>">
                    <?php echo get_the_title($page_id); ?>
                  </a>
                </li>
              <?php } ?>
                <li>
                  <a class="border-underline" href="<?php echo get_post_type_archive_link( 'exhibitor' ); ?>">
                    <?php _e('[:en]Exhibitors[:es]Expositores'); ?>
                  </a>
                </li>
                <li>
                  <a class="border-underline" href="<?php echo get_post_type_archive_link( 'event' ); ?>">
                    <?php _e('[:en]Program[:es]Programa'); ?>
                  </a>
                </li>
                <li>
                  <a class="border-underline" href="<?php echo get_post_type_archive_link( 'press' ); ?>">
                    <?php _e('[:en]Press[:es]Prensa'); ?>
                  </a>
                </li>
              <?php 
                $page_id = get_id_by_slug('reading-material');
                if ($page_id) {
              ?>
                <li>
                  <a class="border-underline" href="<?php echo get_permalink($page_id); ?>">
                    <?php echo get_the_title($page_id); ?>
                  </a>
                </li>
              <?php 
                }
                $page_id = get_id_by_slug('partners');
                if ($page_id) {
              ?>
                <li>
                  <a class="border-underline" href="<?php echo get_permalink($page_id); ?>">
                    <?php echo get_the_title($page_id); ?>
                  </a>
                </li>
              <?php } ?>
              </ul>
            </nav>
          </div>

        <?php if (!empty($address)) { ?>

          <div class="col col-l col-l-2">
          <?php
            echo '<h5 class="margin-bottom-micro">';
            _e('Material Art Fair [:en](Office)[:es](Oficina)');
            echo '</h5>';

            echo apply_filters( 'the_content', $address );
          ?>
          </div>

        <?php } ?>

        <?php if (!empty($email) || !empty($phone)) { ?>

          <div class="col col-l col-l-2">
          <?php
            echo '<h5 class="margin-bottom-micro">';
            _e('[:en]Contact[:es]Contacto');
            echo '</h5>';

            echo $email ? '<div class="margin-bottom-micro"><a href="mailto:' . $email . '">' . $email . '</a></div>' : '';
            echo $phone ? '<a href="tel:' . $phone . '">' . $phone . '</a>' : ''; 
          ?>
          </div>

        <?php } ?>

        <?php if (!empty($mailchimp_url)) { ?>

          <div class="col col-l col-l-4">
            <h5 class="margin-bottom-micro">Mailing List</h5>
            <form method="post" id="mailchimp-form" name="mailchimp-form">
              <input type="email" size="30" placeholder="email" value="" name="email">
              <input type="submit" value="Subscribe" name="subscribe">
            </form>
          </div>

        <?php } ?>

          <div class="col col-l col-l-1 flex-col align-end">

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

        <?php if (!empty($sponsors)) { ?>

        <div class="row">
          <div class="col col-l col-l-12 flex-row align-center">
          <?php foreach ($sponsors as $sponsor) { ?>
          
            <?php 
              $sponsor_img = wp_get_attachment_image($sponsor['logo_id'], 'sponsor', null, array( 'class' => 'lead-sponsor-logo' ));
              echo !empty($sponsor['url']) ? '<a href="' . $sponsor['url'] . '">' . $sponsor_img . '</a>' : $sponsor_img; 
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