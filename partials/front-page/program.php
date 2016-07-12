<?php
$publish_program = IGV_get_option('_igv_page_options', '_igv_publish_program');

$program_image_id = IGV_get_option('_igv_page_options', '_igv_program_page_image_id');
$program_text = IGV_get_option('_igv_page_options', '_igv_program_page_text');

if ( $publish_program == 'on' ) {

  get_template_part('partials/archive-event/highlights');

} elseif (!empty($program_image_id) || !empty($program_text)) {

  get_template_part('partials/archive-event/introduction');

}
?>