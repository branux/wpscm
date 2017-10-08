<?php 
// if ( ! defined( 'ABSPATH' ) ) { exit; }
function msc000000_parse_request( &$wp ) {
	// echo '<pre>';
	// print_r($wp) ;
	// die();
	if(($wp->request == 'msc') ) {
		scmHeader(); 
		smc_cab();?>
		
		<?php smc_bot();
		scmFooter();
		exit;
	}
}
add_action( 'parse_request', 'msc000000_parse_request');