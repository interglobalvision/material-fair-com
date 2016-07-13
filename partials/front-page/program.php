<?php
$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');

if ( $publish_program == 'on' ) {

  get_template_part('partials/archive-event/highlights');

} else {

  get_template_part('partials/intro-section');

}
?>