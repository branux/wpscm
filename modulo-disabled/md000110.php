<?php 
function md000101_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}

    if(($wp->request == 'md000101') ) {
        if (!scmIsRole('subscriber,contributor,editor,author,editor')) { return ''; }
        // scmHeader(); 
        // smc_cab();
        get_header();
        ?>


        <?php 
        // smc_bot();
        // scmFooter();
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md000101_parse_request');

