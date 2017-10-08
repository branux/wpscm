<?php 
function msc000190_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    if(($wp->request == 'login_') ) {
        get_header();
        ?>
            <h1 style="text-align: center;">LOGIN</h1>
            <div style="height: 30px;"></div>
        	<div class="row">
    			<div class="col-md-4 col-md-offset-4" style="text-align: center;">
    				<?php echo do_shortcode('[clean-login]')  ?>
    			</div>
    		</div>

        <?php 
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'msc000190_parse_request');
