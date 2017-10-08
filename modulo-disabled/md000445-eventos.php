<?php 
//participantes de eventos
function md000445_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    if(($wp->request == 'md000445') ) {
      get_header();
        ?>


        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="text-align: center;"><h4><strong>EVENTOS</strong></h4></div>
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
        <?php echo do_shortcode('[scm_list md=000445 on_op="empty" col_x0="" col_url="i000445_evento:<a href=\'?op=view&cod=__i000445_codigo__&pai=__i000445_codigo__\'>__this__</a>" un_show="i000445_data i000445_hora i000445_fj i000445_cpf i000445_rg i000445_sexo i000445_logra_tp i000445_logradouro i000445_numero i000445_complemento i000445_ddd i000445_telefone i000445_e_mail i000445_website i000445_segmento i000445_cep i000445_tp_cad i000445_ref i000445_nascimento i000445_ponto_ref i000445_regiao" style="text-transform: uppercase;"]'); ?> 

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=000445 on_op="nnew" un_show="i000445_data i000445_hora i000445_fj i000445_cpf i000445_rg i000445_sexo i000445_logra_tp i000445_logradouro i000445_numero i000445_complemento i000445_ddd i000445_telefone i000445_e_mail i000445_website i000445_segmento i000445_cep i000445_tp_cad i000445_ref i000445_nascimento i000445_ponto_ref i000445_codigo i000445_regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_insert md=000445 on_op="insert" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_view md=000445 cod=__cod__ on_op="view" un_show="i000445_data i000445_hora i000445_fj i000445_cpf i000445_rg i000445_sexo i000445_logra_tp i000445_logradouro i000445_numero i000445_complemento i000445_ddd i000445__telefone i000445_e_mail i000445_website i000445_segmento i000445_cep i000445_tp_cad i000445_ref i000445_nascimento i000445_ponto_ref i000445_codigo i000445_regiao" style="text-transform: uppercase;"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<br>SITUAÇÃO CADASTRAL[/scm_text]'); ?>
                <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=000445 cod=__cod__ on_op="edit" un_show="i000445_data i000445_hora i000445_fj i000445_cpf i000445_rg i000445_sexo i000445_logra_tp i000445_logradouro i000445_numero i000445_complemento i000445_ddd i000445_telefone i000445_e_mail i000445_website i000445_segmento i000445_cep i000445_tp_cad i000445_ref i000445_nascimento i000445_ponto_ref i000445_codigo i000445__regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_update md=000445 cod=__cod__ on_op="update" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=000445 cod=__cod__ on_op="deletar" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_delete md=000445 cod=__cod__ on_op="delete" access="administrativo,super,master" role_="master"]'); ?>
            </div>
            <div class="col-md-2"></div>
        </div>



        <?php 
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md000445_parse_request');


function msc000445_on_ative() {
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	global $wpdb;
	global $charset_collate;

	$sql = "
  	CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."i000445` (
    `i000445_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `i000445_data` date DEFAULT NULL,
    `i000445_hora` date DEFAULT NULL,
    `i000445_evento` int NOT NULL,
    `i000445_pessoa` int NOT NULL,
    `i000445_organizacao` int(11) DEFAULT '0',
    PRIMARY KEY (`i000445_codigo`)
  	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  	";
  	$wpdb->query($sql);


  	$sql = "
  	INSERT INTO `".$wpdb->prefix."i0002` (`md000002_codigo`, `md000002_i0002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  	(000445, 'I000445', 'I000445', 'I000445', 'I000445', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'i000445', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'i000445_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  	";
  	$wpdb->query($sql);
  	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


  	$sql = "

delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000445;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000445, 0, 'textfield', 'i000445_codigo', 'codigo', 's', 10, 1, 'i000445');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000445, 1, 'textfield', 'i000445_data', 'data', 's', 10, 1, 'i000445');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000445, 2, 'textfield', 'i000445_hora', 'hora', 's', 10, 1, 'i000445');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000445, 3, 'textfield', 'i000445_evento', 'evento', 's', 10, 1, 'i000445');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000445, 4, 'textfield', 'i000445_pessoa', 'pessoa', 's', 10, 1, 'i000445');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000445, 5, 'textfield', 'i000445_igreja', 'igreja', 's', 10, 1, 'i000445');


  	";
  	$mysqli->multi_query($sql);

}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc000445_on_ative' );

