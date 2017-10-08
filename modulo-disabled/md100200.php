<?php 
function md000200_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    
    if(($wp->request == 'md000200_create_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md000200_create_module();
        echo "md000200_create_module OK";
        exit;
    }
    if(($wp->request == 'md000200_delete_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md000200_delete_module();
        echo "md000200_delete_module OK";
        exit;
    }
    if(($wp->request == 'md000200') ) {
        if (!scmIsRole('contributor,editor')) { return ''; }
        get_header();
        do_shortcode('[md000200]');
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md000200_parse_request');


function md000200($atts, $content = null){
    global $wpdb;
        ?>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="text-align: center;"><h4><strong>PESSOAS</strong></h4></div>
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
        <?php echo do_shortcode('[scm_list md=000200 on_op="empty" col_x0="" col_url="i000200_nome:<a href=\'?op=view&cod=__i000200_codigo__&pai=__i000200_codigo__\'>__this__</a>" un_show="i000200_data i000200_hora i000200_fj i000200_cpf i000200_rg i000200_sexo i000200_logra_tp i000200_logradouro i000200_numero i000200_complemento i000200_ddd i000200_telefone i000200_e_mail i000200_website i000200_segmento i000200_cep i000200_tp_cad i000200_ref i000200_nascimento i000200_ponto_ref i000200_regiao" style="text-transform: uppercase;"]'); ?> 

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=000200 on_op="nnew" un_show="i000200_data i000200_hora i000200_fj i000200_cpf i000200_rg i000200_sexo i000200_logra_tp i000200_logradouro i000200_numero i000200_complemento i000200_ddd i000200_telefone i000200_e_mail i000200_website i000200_segmento i000200_cep i000200_tp_cad i000200_ref i000200_nascimento i000200_ponto_ref i000200_codigo i000200_regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_insert md=000200 on_op="insert" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_view md=000200 cod=__cod__ on_op="view" un_show="i000200_data i000200_hora i000200_fj i000200_cpf i000200_rg i000200_sexo i000200_logra_tp i000200_logradouro i000200_numero i000200_complemento i000200_ddd i000200__telefone i000200_e_mail i000200_website i000200_segmento i000200_cep i000200_tp_cad i000200_ref i000200_nascimento i000200_ponto_ref i000200_codigo i000200_regiao" style="text-transform: uppercase;"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<div style="text-align:center;"><br>SITUAÇÃO CADASTRAL</div>[/scm_text]'); ?>
                <?php echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=000200 cod=__cod__ on_op="edit" un_show="i000200_data i000200_hora i000200_fj i000200_cpf i000200_rg i000200_sexo i000200_logra_tp i000200_logradouro i000200_numero i000200_complemento i000200_ddd i000200_telefone i000200_e_mail i000200_website i000200_segmento i000200_cep i000200_tp_cad i000200_ref i000200_nascimento i000200_ponto_ref i000200_codigo i000200__regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_update md=000200 cod=__cod__ on_op="update" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=000200 cod=__cod__ on_op="deletar" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_delete md=000200 cod=__cod__ on_op="delete" access="administrativo,super,master" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_list md=000301 on_op="view" criterio="i000301_cadastro=__cod__" un_show="i000301_data i000301_hora i000301_cadastro i000301_q i000301__pago_data" rol_e="contributor,editor"]') ?>

                <?php //echo do_shortcode('[scm_botao label="CRIAR CARNÊ" target="'.get_bloginfo('url').'/md000302/?op=nnew&pai=__cod__&i000302_cadastro=__cod__" on_op="view" role="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="EXCLUIR CARNÊ" target="'.get_bloginfo('url').'/md000304/?op=nnew&pai=__cod__&i000304_associado=__cod__" on_op="view" role="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARTÃO" target="'.get_bloginfo('url').'/md000201/?cod=__cod__" janela="_blank" on_op="view" role="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARNÊ" target="'.get_bloginfo('url').'/md000202/?cod=__cod__" janela="_blank" on_op="view" role="contributor,editor" class="btn"]') ?>
            </div>
            <div class="col-md-2"></div>
        </div>

        <?php 
}
add_shortcode("md000200", "md000200");










function md000200_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."i000200` (
    `i000200_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `i000200_data` date DEFAULT NULL,
    `i000200_hora` varchar(10) DEFAULT NULL,
    `i000200_nome` varchar(50) NOT NULL,
    `i000200_fj` varchar(1) DEFAULT NULL,
    `i000200_cpf` varchar(50) DEFAULT NULL,
    `i000200_sexo` varchar(20) DEFAULT NULL,
    `i000200_rg` varchar(100) DEFAULT NULL,
    `i000200_nascimento` date DEFAULT NULL,
    `i000200_endereco` varchar(50) DEFAULT NULL,
    `i000200_logra_tp` varchar(20) DEFAULT NULL,
    `i000200_logradouro` varchar(50) DEFAULT NULL,
    `i000200_numero` varchar(20) DEFAULT NULL,
    `i000200_complemento` varchar(20) DEFAULT NULL,
    `i000200_ponto_ref` varchar(50) DEFAULT NULL,
    `i000200_bairro` varchar(20) DEFAULT NULL,
    `i000200_cidade` varchar(20) DEFAULT NULL,
    `i000200_uf` varchar(2) DEFAULT NULL,
    `i000200_cep` varchar(20) DEFAULT NULL,
    `i000200_ddd` varchar(4) DEFAULT NULL,
    `i000200_telefone` varchar(50) DEFAULT NULL,
    `i000200_e_mail` varchar(50) DEFAULT NULL,
    `i000200_website` varchar(100) DEFAULT NULL,
    `i000200_segmento` varchar(200) DEFAULT NULL,
    `i000200_regiao` varchar(50) DEFAULT NULL,
    `i000200_tp_cad` int(11) DEFAULT '0',
    `i000200_ref` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`i000200_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."i0002` (`md000002_codigo`, `md000002_i0002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (000200, 'I000200', 'I000200', 'I000200', 'I000200', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'i000200', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'i000200_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $wpdb->query($sql);

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "


    delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000200;
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000200, 0, 'textfield', 'i000200_codigo', 'MATRICULA', 's', 10, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000200, 1, 'textfield', 'i000200_data', 'data', 's', 10, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000200, 2, 'textfield', 'i000200_hora', 'hora', 's', 10, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 3, 'textfield', 'i000200_nome', 'nome', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 4, 'textfield', 'i000200_fj', 'fj', 's', 1, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 5, 'textfield', 'i000200_cpf', 'cpf', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 6, 'textfield', 'i000200_sexo', 'sexo', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 7, 'textfield', 'i000200_rg', 'rg', 's', 100, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'datefield', 'datefield', 'datefield', 'datefield', 'label', 'label', 000200, 8, 'textfield', 'i000200_nascimento', 'nascimento', 's', 10, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 9, 'textfield', 'i000200_endereco', 'endereco', 's', 60, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 10, 'textfield', 'i000200_logra_tp', 'logra tp', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 11, 'textfield', 'i000200_logradouro', 'logradouro', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 12, 'textfield', 'i000200_numero', 'numero', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 13, 'textfield', 'i000200_complemento', 'complemento', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 14, 'textfield', 'i000200_ponto_ref', 'ponto ref', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 15, 'textfield', 'i000200_bairro', 'bairro', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 16, 'textfield', 'i000200_cidade', 'cidade', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 17, 'textfield', 'i000200_uf', 'uf', 's', 2, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 18, 'textfield', 'i000200_cep', 'cep', 's', 20, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 19, 'textfield', 'i000200_ddd', 'ddd', 's', 4, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 20, 'textfield', 'i000200_telefone', 'telefone', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 21, 'textfield', 'i000200_e_mail', 'e mail', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 22, 'textfield', 'i000200_website', 'website', 's', 100, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 23, 'textfield', 'i000200_segmento', 'segmento', 's', 200, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 24, 'textfield', 'i000200_regiao', 'tags', 's', 50, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000200, 25, 'textfield', 'i000200_tp_cad', 'tp cad', 's', 10, 1, 'i000200');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000200, 26, 'textfield', 'i000200_ref', 'ref', 's', 50, 1, 'i000200');


  ";
  $mysqli->multi_query($sql);

//DROP TRIGGER IF EXISTS `".$wpdb->prefix."i000200_bi`;
  $sql = "
  CREATE TRIGGER `".$wpdb->prefix."i000200_bi` BEFORE INSERT ON `".$wpdb->prefix."i000200` FOR EACH ROW begin
      if new.i000200_data is null then set new.i000200_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.i000200_hora is null then set new.i000200_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end
  ";
  $mysqli->query($sql);

}
function msc000200_on_ative() {
    md000200_create_module();
}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc000200_on_ative' );

function msc000200_on_desative() {
    md000200_delete_module();
}
register_deactivation_hook( SCM_PATH.'/wpmsc.php', "msc000200_on_desative" );
function md000200_delete_module() {
    global $wpdb;
    $wpdb->query( "delete from ".$wpdb->prefix."i0002 where md000002_codigo = 000200;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000200;");
    // $wpdb->query( "drop table if exists ".$wpdb->prefix."i000200");
}

