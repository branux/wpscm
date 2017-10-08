<?php 
//grupos
function md000443_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    if(($wp->request == 'md000443') ) {
        get_header();
        ?>


        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="text-align: center;"><h4><strong>GRUPOS</strong></h4></div>
            </div>
            <div class="col-md-2">
                <div style="text-align: right;">
                    <?php echo do_shortcode('[scm_botao label="L" target="?" class="btn btn-default"]') ?>
                    <?php echo do_shortcode('[scm_botao label="N" target="?op=nnew" class="btn btn-default"]') ?>
                    <?php echo do_shortcode('[scm_botao label="E" target="?op=edit&cod=__cod__" class="btn btn-default" on_op="view"]') ?>
                    <?php echo do_shortcode('[scm_botao label="D" target="?op=deletar&cod=__cod__" class="btn btn-default" on_op="view"]') ?>
                </div>
            </div>
            <div class="col-md-2">
                <?php echo do_shortcode('[scm_busca target="/pacientes/msc/paciente/"]') ?>
            </div>

        </div>

        <div style="height: 20px;"></div>
        <?php echo do_shortcode('[scm_list md=000443 on_op="empty" col_x0="" col_url="i000443_grupo:<a href=\'?op=view&cod=__i000443_codigo__&pai=__i000443_codigo__\'>__this__</a>" un_show="i000443_data i000443_hora i000443_fj i000443_cpf i000443_rg i000443_sexo i000443_logra_tp i000443_logradouro i000443_numero i000443_complemento i000443_ddd i000443_telefone i000443_e_mail i000443_website i000443_segmento i000443_cep i000443_tp_cad i000443_ref i000443_nascimento i000443_ponto_ref i000443_regiao" style="text-transform: uppercase;"]'); ?> 

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=000443 on_op="nnew" un_show="i000443_data i000443_hora i000443_fj i000443_cpf i000443_rg i000443_sexo i000443_logra_tp i000443_logradouro i000443_numero i000443_complemento i000443_ddd i000443_telefone i000443_e_mail i000443_website i000443_segmento i000443_cep i000443_tp_cad i000443_ref i000443_nascimento i000443_ponto_ref i000443_codigo i000443_regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_insert md=000443 on_op="insert" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_view md=000443 cod=__cod__ on_op="view" un_show="i000443_data i000443_hora i000443_fj i000443_cpf i000443_rg i000443_sexo i000443_logra_tp i000443_logradouro i000443_numero i000443_complemento i000443_ddd i000443__telefone i000443_e_mail i000443_website i000443_segmento i000443_cep i000443_tp_cad i000443_ref i000443_nascimento i000443_ponto_ref i000443_codigo i000443_regiao" style="text-transform: uppercase;"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<br>SITUAÇÃO CADASTRAL[/scm_text]'); ?>
                <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=000443 cod=__cod__ on_op="edit" un_show="i000443_data i000443_hora i000443_fj i000443_cpf i000443_rg i000443_sexo i000443_logra_tp i000443_logradouro i000443_numero i000443_complemento i000443_ddd i000443_telefone i000443_e_mail i000443_website i000443_segmento i000443_cep i000443_tp_cad i000443_ref i000443_nascimento i000443_ponto_ref i000443_codigo i000443__regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_update md=000443 cod=__cod__ on_op="update" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=000443 cod=__cod__ on_op="deletar" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_delete md=000443 cod=__cod__ on_op="delete" access="administrativo,super,master" role_="master"]'); ?>
            </div>
            <div class="col-md-2"></div>
        </div>



        <?php 
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md000443_parse_request');


function msc000443_create_table() {
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;
	global $charset_collate;
	$sql = "
  	CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."i000443` (
    `i000443_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `i000443_data` date DEFAULT NULL,
    `i000443_hora` date DEFAULT NULL,
    `i000443_grupo` varchar(100),
    PRIMARY KEY (`i000443_codigo`)
  	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  	";
  	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  	$mysqli->query($sql);
}
function msc000443_create_md(){
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;
	global $charset_collate;
  	$sql = "
  	INSERT INTO `".$wpdb->prefix."i0002` (`md000002_codigo`, `md000002_i0002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  	(000443, 'I000443', 'I000443', 'I000443', 'I000443', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'i000443', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'i000443_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  	";
  	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  	$mysqli->query($sql);
  	$mysqli->close();
}
function msc000443_create_md_itens(){
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;
	global $charset_collate;
  	$sql = "

delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000443;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000443, 0, 'textfield', 'i000443_codigo', 'codigo', 's', 10, 1, 'i000443');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000443, 1, 'textfield', 'i000443_data', 'data', 's', 10, 1, 'i000443');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000443, 2, 'textfield', 'i000443_hora', 'hora', 's', 10, 1, 'i000443');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000443, 3, 'textfield', 'i000443_grupo', 'grupo', 's', 100, 1, 'i000443');

  	";
  	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  	$mysqli->multi_query($sql);
  	$mysqli->close();
}
function msc000443_on_ative() {
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;
	global $charset_collate;

	msc000443_create_table();
	msc000443_create_md();
	msc000443_create_md_itens();
}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc000443_on_ative' );

