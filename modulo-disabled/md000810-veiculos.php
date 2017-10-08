<?php 
function md000810_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    
    if(($wp->request == 'md000810_create_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md000810_create_module();
        echo "md000810_create_module OK";
        exit;
    }
    if(($wp->request == 'md000810_delete_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md000810_delete_module();
        echo "md000810_delete_module OK";
        exit;
    }
    if(($wp->request == 'md000810') ) {
        if (!scmIsRole('administrator,editor,author,contributor,subscriber')) { return ''; }
        get_header();
        do_shortcode('[md000810]');
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md000810_parse_request');




function md000810($atts, $content = null) {
  extract(shortcode_atts(array(
    "md" => '0'
  ), $atts));


        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <div style="text-align: center;"><h4><strong>VEÍCULOS</strong></h4></div>
                </div>
                <div class="col-md-2">
                    <div style="text-align: right;">
                        <?php echo do_shortcode('[scm_botao label="L" target="?" class="btn btn-default"]') ?>
                        <?php echo do_shortcode('[scm_botao label="N" target="?op=nnew" class="btn btn-default" role="administrator,editor,author,contributor"]') ?>
                        <?php echo do_shortcode('[scm_botao label="E" target="?op=edit&cod=__cod__" class="btn btn-default" on_op="view" role="administrator,editor,author,contributor"]') ?>
                        <?php echo do_shortcode('[scm_botao label="D" target="?op=deletar&cod=__cod__" class="btn btn-default" on_op="view" role="administrator,editor,author,contributor"]') ?>
                    </div>
                </div>
                <div class="col-md-2">
                    <?php echo do_shortcode('[scm_busca target="/pacientes/msc/paciente/"]') ?>
                </div>
            </div>
        </div>

        <div style="height: 20px;clear: both;"></div>
        
        <div class="container">
            <?php echo do_shortcode('[scm_list md=000810 on_op="empty" col_x0="" col_url="md000810_marca:<a href=\'?op=view&cod=__md000810_codigo__&pai=__md000810_codigo__\'>__this__</a>" un_show="md000810_data md000810_hora md000810_fj md000810_cpf md000810_rg md000810_sexo md000810_logra_tp md000810_logradouro md000810_numero md000810_complemento md000810_ddd md000810_telefone md000810_e_mail md000810_website md000810_segmento md000810_cep md000810_tp_cad md000810_ref md000810_nascimento md000810_ponto_ref md000810_regiao" style="text-transform: uppercase;"]'); ?> 
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php echo do_shortcode('[scm_nnew md=000810 on_op="nnew" un_show="md000810_data md000810_hora md000810_fj md000810_cpf md000810_rg md000810_sexo md000810_logra_tp md000810_logradouro md000810_numero md000810_complemento md000810_ddd md000810_telefone md000810_e_mail md000810_website md000810_segmento md000810_cep md000810_tp_cad md000810_ref md000810_nascimento md000810_ponto_ref md000810_codigo md000810_regiao" role="administrator,editor,author,contributor"]'); ?>
                    <?php echo do_shortcode('[scm_insert md=000810 on_op="insert" role="administrator,editor,author,contributor"]'); ?>
                    <?php echo do_shortcode('[scm_view md=000810 cod=__cod__ on_op="view" un_show="md000810_data md000810_hora md000810_fj md000810_cpf md000810_rg md000810_sexo md000810_logra_tp md000810_logradouro md000810_numero md000810_complemento md000810_ddd md000810__telefone md000810_e_mail md000810_website md000810_segmento md000810_cep md000810_tp_cad md000810_ref md000810_nascimento md000810_ponto_ref md000810_codigo md000810_regiao" style="text-transform: uppercase;" role="administrator,editor,author,contributor,subscriber"]'); ?>
                    <?php //echo do_shortcode('[scm_text on_op="view"]<div style="text-align:center;"><br>SITUAÇÃO CADASTRAL</div>[/scm_text]'); ?>
                    <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                    <?php echo do_shortcode('[scm_edit md=000810 cod=__cod__ on_op="edit" un_show="md000810_data md000810_hora md000810_fj md000810_cpf md000810_rg md000810_sexo md000810_logra_tp md000810_logradouro md000810_numero md000810_complemento md000810_ddd md000810_telefone md000810_e_mail md000810_website md000810_segmento md000810_cep md000810_tp_cad md000810_ref md000810_nascimento md000810_ponto_ref md000810_codigo md000810__regiao" role="administrator,editor,author,contributor"]'); ?>
                    <?php echo do_shortcode('[scm_update md=000810 cod=__cod__ on_op="update" role="administrator,editor,author,contributor"]'); ?>
                    <?php echo do_shortcode('[scm_deletar md=000810 cod=__cod__ on_op="deletar" role="administrator,editor,author,contributor"]'); ?>
                    <?php echo do_shortcode('[scm_delete md=000810 cod=__cod__ on_op="delete" role="administrator,editor,author,contributor"]'); ?>
                    <?php //echo do_shortcode('[scm_list md=000301 on_op="view" criterio="i000301_cadastro=__cod__" un_show="i000301_data i000301_hora i000301_cadastro i000301_q i000301__pago_data" rol_e="contributor,editor"]') ?>

                    <?php //echo do_shortcode('[scm_botao label="CRIAR CARNÊ" target="'.get_bloginfo('url').'/md000302/?op=nnew&pai=__cod__&i000302_cadastro=__cod__" on_op="view" role="contributor,editor" class="btn"]') ?>
                    <?php //echo do_shortcode('[scm_botao label="EXCLUIR CARNÊ" target="'.get_bloginfo('url').'/md000304/?op=nnew&pai=__cod__&i000304_associado=__cod__" on_op="view" role="contributor,editor" class="btn"]') ?>
                    <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARTÃO" target="'.get_bloginfo('url').'/md000201/?cod=__cod__" janela="_blank" on_op="view" role="contributor,editor" class="btn"]') ?>
                    <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARNÊ" target="'.get_bloginfo('url').'/md000202/?cod=__cod__" janela="_blank" on_op="view" role="contributor,editor" class="btn"]') ?>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <?php 


        

}
add_shortcode("md000810", "md000810");





function md000810_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000810` (
    md000810_codigo bigint(20) NOT NULL AUTO_INCREMENT,
    md000810_marca varchar(50) NOT NULL,
    md000810_modelo varchar(50) NOT NULL,
    md000810_ano varchar(50) NOT NULL,
    md000810_renavam varchar(50) NOT NULL,
    md000810_placa varchar(50) NOT NULL,
    md000810_cor varchar(50) NOT NULL,

    PRIMARY KEY (`md000810_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (`md000002_codigo`, `md000002_md000002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (000810, 'md000002', 'md000002', 'md000002', 'md000002', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'md000810', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'md000810_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $wpdb->query($sql);

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "


    delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000810;
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000810, 0, 'textfield', 'md000810_codigo', 'MATRICULA', 's', 10, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000810, 1, 'textfield', 'md000810_data', 'data', 's', 10, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000810, 2, 'textfield', 'md000810_hora', 'hora', 's', 10, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 3, 'textfield', 'md000810_nome', 'nome', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 4, 'textfield', 'md000810_fj', 'fj', 's', 1, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 5, 'textfield', 'md000810_cpf', 'cpf', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 6, 'textfield', 'md000810_sexo', 'sexo', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 7, 'textfield', 'md000810_rg', 'rg', 's', 100, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'datefield', 'datefield', 'datefield', 'datefield', 'label', 'label', 000810, 8, 'textfield', 'md000810_nascimento', 'nascimento', 's', 10, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 9, 'textfield', 'md000810_endereco', 'endereco', 's', 60, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 10, 'textfield', 'md000810_logra_tp', 'logra tp', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 11, 'textfield', 'md000810_logradouro', 'logradouro', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 12, 'textfield', 'md000810_numero', 'numero', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 13, 'textfield', 'md000810_complemento', 'complemento', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 14, 'textfield', 'md000810_ponto_ref', 'ponto ref', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 15, 'textfield', 'md000810_bairro', 'bairro', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 16, 'textfield', 'md000810_cidade', 'cidade', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 17, 'textfield', 'md000810_uf', 'uf', 's', 2, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 18, 'textfield', 'md000810_cep', 'cep', 's', 20, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 19, 'textfield', 'md000810_ddd', 'ddd', 's', 4, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 20, 'textfield', 'md000810_telefone', 'telefone', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 21, 'textfield', 'md000810_e_mail', 'e mail', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 22, 'textfield', 'md000810_website', 'website', 's', 100, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 23, 'textfield', 'md000810_segmento', 'segmento', 's', 200, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 24, 'textfield', 'md000810_regiao', 'tags', 's', 50, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000810, 25, 'textfield', 'md000810_tp_cad', 'tp cad', 's', 10, 1, 'md000810');
    insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000810, 26, 'textfield', 'md000810_ref', 'ref', 's', 50, 1, 'md000810');


  ";
  $mysqli->multi_query($sql);

//DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000810_bi`;
  $sql = "
  CREATE TRIGGER `".$wpdb->prefix."md000810_bi` BEFORE INSERT ON `".$wpdb->prefix."md000810` FOR EACH ROW begin
      if new.md000810_data is null then set new.md000810_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000810_hora is null then set new.md000810_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end
  ";
  $mysqli->query($sql);

}
// function msc000810_on_ative() {
//     md000810_create_module();
// }
// register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc000810_on_ative' );

// function msc000810_on_desative() {
//     md000810_delete_module();
// }
// register_deactivation_hook( SCM_PATH.'/wpmsc.php', "msc000810_on_desative" );
function md000810_delete_module() {
    global $wpdb;
    $wpdb->query( "delete from ".$wpdb->prefix."md000002 where md000002_codigo = 000810;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000810;");
    $wpdb->query( "drop table if exists ".$wpdb->prefix."md000810");
}

