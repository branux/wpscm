<?php 
function md000303_parse_request( &$wp ) {
  // if(!current_user_can('caixa')) { return '';}
  if($wp->request == 'md000303_create_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000303_create_module();
    echo "md000303_create_module OK"; 
    exit;
  }
  if($wp->request == 'md000303_delete_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000303_delete_module();
    echo "md000303_delete_module OK"; 
    exit;
  }
  if($wp->request == 'md000303'){
    get_header();
    ?>
    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="text-align: center;">
    <?php echo do_shortcode('[scm_botao class="btn btn-primary_" label="cadastro" style="border:1px solid;" target="../md000200/?op=view&cod=__pai__" ]') ?>
    <?php echo do_shortcode('[scm_botao class="btn btn-primary_" label="reload" style="border:1px solid;"  ]') ?>
    <?php echo do_shortcode('[scm_botao class="btn btn-primary_" label="listagem" style="border:1px solid;" target="../md000200/?" ]') ?>
    </div>
    </div>
    </div>
    </div>


    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="background-color: silver;padding: 20px;text-transform: uppercase;margin:10px; ">
    <?php echo do_shortcode('[scm_view md=000200 cod=__pai__ on_op="nnew" un_show="md000200_data md000200_hora md000200_fj md000200_cpf md000200_rg md000200_sexo md000200_logra_tp md000200_logradouro md000200_numero md000200_complemento md000200_ddd md000200_telefone md000200_e_mail md000200_website md000200_segmento md000200_cep md000200_tp_cad md000200_ref md000200_nascimento md000200_ponto_ref md000200_codigo md000200_endereco md000200_bairro md000200_cidade md000200_uf md000200_regiao"]') ?>
    </div>
    </div>
    </div>
    </div>

    <h2 class="text-center">BAIXA DE PARCELA</h2>
	<div class="container" style="text-transform: uppercase;max-width:1024px;border:0px solid gray;">
	<div class="row">
	<div class="col-md-8 col-md-offset-2" style="border:0px solid gray;">
	<?php echo do_shortcode('[scm_nnew md=000303 on_op="nnew"]') ?>
  <?php //echo do_shortcode('[scm_insert md=000303 target_pos_insert="../md000200/?op=view&cod=__pai__" on_op="insert"]') ?>
	<?php echo do_shortcode('[scm_insert md=000303 target_pos_insert="../md000305_update_pendencia_single/?cod=__pai__" on_op="insert"]') ?>
  <?php //echo do_shortcode('[msc000305_reset_pendencia_do_cod on_op="update-pendencia"]'); ?>
	
	</div>
	</div>
	</div>
    </main>
    <?php 
    get_footer();
    exit;
  }
}
add_action( 'parse_request', 'md000303_parse_request');

function md000303_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000303` (
    `md000303_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `md000303_data` date DEFAULT NULL,
    `md000303_hora` varchar(12) DEFAULT NULL,
    `md000303_cadastro` int(11) DEFAULT NULL,
    `md000303_doc` int(11) DEFAULT '0',
    `md000303_valor` float(7,2) DEFAULT '0.00',
    `md000303_pago_a` varchar(50) DEFAULT NULL,
    PRIMARY KEY (`md000303_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (`md000002_codigo`, `md000002_md000002`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (000303, 'md000303', 'md000303', 'md000303', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'md000303', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'md000303_codigo', 120, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $wpdb->query($sql);

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "

delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000303;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000303, 0, 'textfield', 'md000303_codigo', 'codigo', 's', 10, 1, 'md000303');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000303, 1, 'textfield', 'md000303_data', 'data', 's', 10, 1, 'md000303');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000303, 2, 'textfield', 'md000303_hora', 'hora', 's', 12, 1, 'md000303');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000303, 3, 'textfield', 'md000303_cadastro', 'matricula', 's', 10, 1, 'md000303');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000303, 4, 'textfield', 'md000303_doc', 'documento', 's', 10, 1, 'md000303');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_formato, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('float', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'moeda', 'label', 'label', 000303, 5, 'textfield', 'md000303_valor', 'valor', 's', 10, 1, 'md000303');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000303, 6, 'textfield', 'md000303_pago_a', 'pago a', 's', 50, 1, 'md000303');


  ";
  $mysqli->multi_query($sql);


  $sql = "
  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000303_bi`;
  CREATE TRIGGER `".$wpdb->prefix."md000303_bi` BEFORE INSERT ON `".$wpdb->prefix."md000303` FOR EACH ROW begin
      if new.md000303_data is null then set new.md000303_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000303_hora is null then set new.md000303_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end
  ";
  // $mysqli->multi_query($sql);

/*
  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000303_bi`;
  CREATE TRIGGER `".$wpdb->prefix."md000303_bi` BEFORE INSERT ON `".$wpdb->prefix."md000303`
    FOR EACH ROW begin
      if new.md000303_data is null then set new.md000303_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000303_hora is null then set new.md000303_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
    end
  ;

*/
  $sql = "
  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000303_bi`;
  CREATE TRIGGER `".$wpdb->prefix."md000303_bi` BEFORE INSERT ON `".$wpdb->prefix."md000303`
    FOR EACH ROW begin
      if new.md000303_data is null then set new.md000303_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000303_hora is null then set new.md000303_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
    end
  ;

  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000303_ai`;
  CREATE TRIGGER `".$wpdb->prefix."md000303_ai` AFTER INSERT ON `".$wpdb->prefix."md000303`
    FOR EACH ROW begin
      update ".$wpdb->prefix."md000301 set 
        md000301_q = 's', 
        md000301_sit = 4,
        md000301_pago_data = new.md000303_data 
      where 
        md000301_codigo = new.md000303_doc
      ;
    end
  ;
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);
}
function md000303_on_ative() {
  md000303_create_module();
}
function md000303_delete_module(){
    global $wpdb;
    $wpdb->query( "delete from ".scmPrefix(true)."md000002 where md000002_codigo = 000303;");
    $wpdb->query( "delete from ".scmPrefix(true)."md000001 where md000001_modulo = 000303;");
    $wpdb->query( "drop table if exists ".scmPrefix(false)."md000303");

}

function md000303_on_desative() {
  md000303_delete_module();
}

