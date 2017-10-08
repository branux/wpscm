<?php 
function md000035_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
	if($wp->request == 'md000035_create_module'){
		if (!scmIsRole('administrator')) { return ''; }
		md000035_create_module();
		echo "md000035_create_module OK"; 
		exit;
	}
	if($wp->request == 'md000035_delete_module'){
		if (!scmIsRole('administrator')) { return ''; }
		md000035_delete_module();
		echo "md000035_delete_module OK"; 
		exit;
	}

    if(($wp->request == 'md000035') ) {
    	get_header();
		?>
	<main id="content" class="<?php //echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
    
    <?php echo do_shortcode('[scm_botao class="btn " label="LISTAGEM" style="border:0px solid;" target="?" rol_e="master"]');?>
    <?php echo do_shortcode('[scm_botao class="btn " label="NOVO" style="border:0px solid;" target="?op=nnew" rol_e="master"]');?>

    <?php echo do_shortcode('[scm_list md=000035 on_op="empty" col_x0="<a href=\'?op=view&cod=__tcod__\'>...</a>" col__url="i000035_nome:<a href=\'?op=view&cod=__i000035_codigo__&pai=__i000035_codigo__\'>__this__</a>" un_show="" ]'); ?> 


	<?php echo do_shortcode('[scm_nnew md=000035 on_op="nnew" un_show="" role_="master"]'); ?>
	<?php echo do_shortcode('[scm_insert md=000035 on_op="insert" role_="master"]'); ?>
	<?php echo do_shortcode('[scm_view md=000035 cod=__cod__ on_op="view" un_show=""]'); ?>
	<?php echo do_shortcode('[scm_edit md=000035 cod=__cod__ on_op="edit" un_show="" role_="master"]'); ?>
	<?php echo do_shortcode('[scm_update md=000035 cod=__cod__ on_op="update" role_="master"]'); ?>
	<?php echo do_shortcode('[scm_deletar md=000035 cod=__cod__ on_op="deletar" role_="master"]'); ?>
	<?php echo do_shortcode('[scm_delete md=000035 cod=__cod__ on_op="delete" access_="administrativo,super,master" role_="master"]'); ?>

    <?php echo do_shortcode('[scm_botao class="btn " label="edit" style="border:1px solid;" target="?op=edit&cod=__cod__" on_op="view" role_="master"]'); ?>
    <?php echo do_shortcode('[scm_botao class="btn " label="deletar" style="border:1px solid;" target="?op=deletar&cod=__cod__" on_op="view" role_="master"]'); ?>

    </main>
    <?php 
    get_footer();
    exit;
  }
}
add_action( 'parse_request', 'md000035_parse_request');

function md000035_create_module() {
  // if ( !defined( 'IDADOS_ENGINE' ) ) exit;
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."i000035` (
    `i000035_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `i000035_string` varchar(50),
    `i000035_user_id` varchar(50),
    `i000035_login` varchar(50),
    `i000035_senha` varchar(50),

    PRIMARY KEY (`i000035_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."i0002` (`md000002_codigo`, `md000002_i0002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (000035, 'I000035', 'I000035', 'I000035', 'I000035', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'i000035', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'i000035_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $wpdb->query($sql);

  $sql = "

delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000035;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000035, 0, 'textfield', 'i000035_codigo', 'codigo', 's', 10, 1, 'i000035');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000035, 1, 'textfield', 'i000035_string', 'string', 's', 50, 1, 'i000035');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000035, 2, 'textfield', 'i000035_user_id', 'user id', 's', 50, 1, 'i000035');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000035, 3, 'textfield', 'i000035_login', 'login', 's', 50, 1, 'i000035');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000035, 4, 'textfield', 'i000035_senha', 'senha', 's', 50, 1, 'i000035');

  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);
}
function md000035_on_ative() {
	md000035_create_module();
}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'md000035_on_ative' );



function md000035_delete_module() {
    global $wpdb;
    $wpdb->query( "delete from ".$wpdb->prefix."i0002 where md000002_codigo = 000035;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000035;");
    // $wpdb->query( "drop table if exists ".$wpdb->prefix."i000035");

}
function md000035_on_desative(){
	md000035_delete_module();
}




function md000035_wp_loaded(){
	global $wpdb;
	$rq = $_REQUEST;
	$autologin = isset($_GET['autologin']) ? $_GET['autologin'] : '';
	// echo '<!--$autologin:'.$autologin.'-->';

	// echo '<!--;';
	// echo '<pre>';
	// unset($rq['quux']);
	// print_r($rq);
	// echo '</pre>';
	
	// echo '-->';
	// echo '<!--REQUEST_URI: '.$_SERVER['REQUEST_URI'].'-->';

	if($autologin){
		$creds = array();
		$sql = "select i000035_user_id, i000035_login, i000035_senha from ".$wpdb->prefix."i000035 where i000035_string = '".$autologin."' limit 0,1;";
		// $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  		// $mysqli->multi_query($sql);
	    $rr = $GLOBALS['wpdb']->get_results($sql, 'ARRAY_A');
    	$ret['rows'] = $GLOBALS['wpdb']->get_results($sql, 'ARRAY_A');
    	// $rows['total'] = count($rr);
    	// $ret['r'] = $rows['total'];
    	$ret['r'] = count($rr);
    	// $ret['sql'] = $sql;

		// echo '<!--;';
		// echo '<pre>';
		// // unset($rq['quux']);
		// print_r($ret);
		// echo '</pre>';
		
		// echo '-->';


		if($ret['r']){


			$creds['user_login'] = $ret['rows'][0]['i000035_login'];////'teste55';
			$creds['user_password'] = $ret['rows'][0]['i000035_senha'];//'teste123A';
			$creds['remember'] = false;
			$user = wp_signon( $creds, false );
			if ( is_wp_error($user) ){
				// echo $user->get_error_message();
				$rqt=$_SERVER['REQUEST_URI'];
				$rqt = preg_replace('/autologin/', 'autologado-fail', $rqt);
				// wp_redirect( home_url().$rqt ); exit;

				// echo '<!--;';
				// echo '<pre>';
				// // unset($rq['quux']);
				// echo 'erro'."\n";
				// print_r($user);
				// echo '</pre>';
				
				// echo '-->';


				return '';

			}
			// echo '<!--BINGO-->';
			// wp_redirect( home_url() ); exit;
			$rqt=$_SERVER['REQUEST_URI'];
			$rqt = preg_replace('/autologin/', 'autologado', $rqt);
			// wp_redirect( home_url() ); exit;
			// wp_redirect( home_url().$rqt ); exit;
			// echo bloginfo('url').'/'.$rqt; 
			// echo bloginfo('url');
			// echo '<br>';
			// echo $rqt;
			// phpinfo();
			// echo '<br>';
			// echo $_SERVER['HTTP_HOST'];
			// echo '<br>';
			// echo $_SERVER['HTTP_HOST'].$rqt;
			// wp_redirect( $_SERVER['HTTP_HOST'].$rqt ); exit;
			wp_redirect( $rqt ); exit;


			return '';
		}
	}
}
add_action('wp_loaded','md000035_wp_loaded');