<?php 
function md000301_parse_request( &$wp ) {
  // if(!current_user_can('administrativo')) { return '';}
  
  if($wp->request == 'md000301_create_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000301_create_module();
    echo "md000301_create_module OK"; 
    exit;
  }
  if($wp->request == 'md000301_delete_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000301_delete_module();
    echo "md000301_delete_module OK"; 
    exit;
  }
  

  if($wp->request == 'md000301'){
    get_header();
    ?>


    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="text-align: center;">
    <?php //echo do_shortcode('[scm_botao class="btn btn-primary_" label="cadastro" style="border:1px solid;" target="../associado/?op=view&cod=__cod__" access=""]') ?>
    <?php //echo do_shortcode('[scm_botao class="btn btn-primary_" label="reload" style="border:1px solid;" target="" access=""]') ?>
    <?php //echo do_shortcode('[scm_botao class="btn btn-primary_" label="listagem" style="border:1px solid;" target="../associado/?" ]') ?>
    </div>
    </div>
    </div>
    </div>
    <?php $op=isset($_GET['op']) ? $_GET['op'] : ''; ?>
    <?php if($op=='view') : ?>
    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="background-color: silver;padding: 20px;text-transform: uppercase;margin:10px; ">
    <?php echo do_shortcode('[scm_view md=000200 cod=__cod__ on_op="view" un_show="md00000200_data md00000200_hora md00000200_fj md00000200_cpf md00000200_rg md00000200_sexo md00000200_logra_tp md00000200_logradouro md00000200_numero md00000200_complemento md00000200_ddd md00000200_telefone md00000200_e_mail md00000200_website md00000200_segmento md00000200_cep md00000200_tp_cad md00000200_ref md00000200_nascimento md00000200_ponto_ref md00000200_codigo md00000200_endereco md00000200_bairro md00000200_cidade md00000200_uf md00000200_regiao"]') ?>
    </div>
    </div>
    </div>
    </div>
    <?php endif; ?>

    <h2 class="text-center">PARCELAS</h2>
    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="text-align: center;">
    <div style="height:20px;"></div>
    <?php echo do_shortcode('[scm_list md="000301" on_op="ilist" criteri_o="md000301_cadastro=__cod__&md000301_q = \'n\'" un__show="md000301_codigo md000301_data md000301_hora md000301_cadastro md000301_q" col__url="md000301_pago_a:__md000301_q__"]'); ?>
    <?php echo do_shortcode('[scm_list md="000301" on_op="view" criterio="md000301_cadastro=__cod__&md000301_q = \'n\'" un__show="md000301_codigo md000301_data md000301_hora md000301_cadastro md000301_q" col__url="md000301_pago_a:__md000301_q__"][scm_botao style="border:0px solid;" class="btn" label="VER PARCELAS QUITADAS" target="../parcelas-quitadas/?op=view&pai=__pai__&cod=__cod__" on_op="view"]'); ?>
    <?php echo do_shortcode('[scm_botao style="border:0px solid;" class="btn" label="IMPRIMIR CARNÊ" target="/modulo/imprimir-carneh/?cod=__pai__" janela="_BLACK" on_op="view"]'); ?>
    <div style="height:20px;"></div>
    <?php echo do_shortcode('[scm_botao label="CRIAR NOVO CARNÊ" style="border:0px solid;" class="btn btn-primary" target="/modulo/novo-carneh/?op=nnew&pai=__pai__&i000302_cadastro=__pai__&i000302_qtd_par=12&i000302_carne_num=1" on_op="view" role="master"]'); ?>
    <?php echo do_shortcode('[scm_botao label="EXCLUIR CARNÊ" style="border:0px solid;" class="btn btn-primary" target="/modulo/excluir-carneh/?op=nnew&pai=__cod__&i000304_associado=__cod__" on_op="view" role="master"]'); ?>
    </div>
    </div>
    </div>
    </div>

    <?php  
    get_footer();
    exit;
  }
}
add_action( 'parse_request', 'md000301_parse_request');


function md000301_create_module(){
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
    CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000301` (
      `md000301_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
      `md000301_data` date DEFAULT NULL,
      `md000301_hora` varchar(10) DEFAULT NULL,
      `md000301_cadastro` int(11) DEFAULT NULL,
      `md000301_sit` int(11) DEFAULT '1',
      `md000301_cn` int(11) DEFAULT '1',
      `md000301_p` int(11) DEFAULT '1',
      `md000301_ps` int(11) DEFAULT '1',
      `md000301_vencimento` date DEFAULT NULL,
      `md000301_valor` float(7,2) DEFAULT '0.00',
      `md000301_q` varchar(1) DEFAULT 'n',
      `md000301_pago_a` varchar(50) DEFAULT NULL,
      `md000301_pago_data` date DEFAULT NULL,
      PRIMARY KEY (`md000301_codigo`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (`md000002_codigo`, `md000002_md000002`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (000301, 'md000301', 'md000301', 'md000301', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'md000301', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'md000301_codigo', 120, 'ASC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $wpdb->query($sql);

  
  $sql = "
  delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000301;
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000301, 0, 'textfield', 'md000301_codigo', 'codigo', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000301, 1, 'textfield', 'md000301_data', 'data', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000301, 2, 'textfield', 'md000301_hora', 'hora', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000301, 3, 'textfield', 'md000301_cadastro', 'matricula', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela, md000001_url) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000301, 4, 'textfield', 'md000301_sit', 'status', 's', 10, 1, 'md000301','<div class=\"md000301_sit___this__\"></div>');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000301, 5, 'textfield', 'md000301_cn', 'carneh', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000301, 6, 'textfield', 'md000301_p', 'parcela', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000301, 7, 'textfield', 'md000301_ps', 'parcelas', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'datefield', 'datefield', 'datefield', 'datefield', 'label', 'label', 000301, 8, 'textfield', 'md000301_vencimento', 'vencimento', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_formato, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('float', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'moeda', 'label', 'label', 000301, 9, 'textfield', 'md000301_valor', 'valor', 's', 10, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000301, 10, 'textfield', 'md000301_q', 'quitado', 's', 1, 1, 'md000301');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela, md000001_url) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000301, 11, 'textfield', 'md000301_pago_a', '', 's', 50, 1, 'md000301','<a class=\'hidden___md000301_q__\' href=\'../md000303/?op=nnew&pai=__codigo__&md000303_cadastro=__codigo__&md000303_doc=__tcod__&md000303_valor=__md000301_valor__\'>BAIXA</a>');
  insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'datefield', 'datefield', 'datefield', 'datefield', 'label', 'label', 000301, 12, 'textfield', 'md000301_pago_data', 'pago data', 's', 10, 1, 'md000301');
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);
//<a class=\"btn btn-primary btn-xm hidden___md000301_q__\" href=\"/receber/?pai=__cod__&i000303_cadastro=__cod__&i000303_doc=__tcod__&i000303_valor=__md000301_valor__\">RECEBER</a>
//<a class=\"btn btn-primary btn-xm hidden___md000301_q__\" href=\"../receber/?op=nnew&pai=__cod__&i000303_cadastro=__cod__&i000303_doc=__tcod__&i000303_valor=__md000301_valor__\">RECEBER</a>
  $sql = "
  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000301_bi`;
  CREATE TRIGGER `".$wpdb->prefix."md000301_bi` BEFORE INSERT ON `".$wpdb->prefix."md000301` FOR EACH ROW begin
      if new.md000301_data is null then set new.md000301_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000301_hora is null then set new.md000301_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);
}

function md000301_parcelas_quitadas( &$wp ) {
  if(!current_user_can('administrativo')) { return '';}
  if($wp->request == 'modulo/parcelas-quitadas'){
    scmHeader();?>
    <main id="content" class="<?php //echo odin_classes_page_full(); ?>" tabindex="-1" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">

            <div style="padding: 10px;">
            <?php bloginfo('name'); ?> - <a href="<?php echo bloginfo('url') ?>" title="<?php bloginfo('name'); ?>">HOME</a> - <a href="<?php echo bloginfo('url').'/modulo/associado/' ?>" title="<?php bloginfo('name'); ?>">SISTEMA</a></div>
            </div>

            <div class="col-md-3"><?php echo do_shortcode('[scm_busca target="/modulo/associado/"]') ?></div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <h1 style="text-align:center;padding:0px;margin: 20px 0px 0px 0px;">ASSOCIADOS</h1>
    <div style="text-align: center;">SISTEMA DE CADASTRO</div>

    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="text-align: center;">
    <?php //echo do_shortcode('[scm_botao class="btn btn-primary_" label="reload" style="border:1px solid;" target="" access=""]') ?>
    <?php //echo do_shortcode('[scm_botao class="btn btn-primary_" label="cadastro" style="border:1px solid;" target="../associado/?op=view&cod=__cod__" access=""]') ?>
    <?php //echo do_shortcode('[scm_botao class="btn btn-primary_" label="listagem" style="border:1px solid;" target="../associado/?" ]') ?>
    </div>
    </div>
    </div>
    </div>

    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="background-color: silver;padding: 20px;text-transform: uppercase;margin:10px; ">
    <?php echo do_shortcode('[scm_view md=000200 cod=__cod__ on_op="view" un_show="md00000200_data md00000200_hora md00000200_fj md00000200_cpf md00000200_rg md00000200_sexo md00000200_logra_tp md00000200_logradouro md00000200_numero md00000200_complemento md00000200_ddd md00000200_telefone md00000200_e_mail md00000200_website md00000200_segmento md00000200_cep md00000200_tp_cad md00000200_ref md00000200_nascimento md00000200_ponto_ref md00000200_codigo md00000200_endereco md00000200_bairro md00000200_cidade md00000200_uf md00000200_regiao"]') ?>
    </div>
    </div>
    </div>
    </div>

    <h2 class="text-center">PARCELAS QUITADAS</h2>
    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="text-align: center;">

    <?php echo do_shortcode('[scm_list md="000301" on_op="view" criterio="md000301_cadastro=__cod__&md000301_q = \'s\'" un_show="md000301_codigo md000301_data md000301_hora md000301_cadastro md000301_q" col__url="md000301_pago_a:__md000301_q__"]'); ?>
    <hr style="border: solid silver 1px;" />
    <?php //echo do_shortcode('[scm_botao style="border:0px solid;" class="btn" label="VER PARCELAS QUITADAS" target="/modulo/parcelas-quitadas/?op=view&pai=__pai__&cod=__cod__" on_op="view"]'); ?>
    <?php echo do_shortcode('[scm_botao label="VOLTAR" style="border:0px solid;" class="btn" target="/modulo/associado/?op=view&cod=__cod__" on_op="view"]'); ?>
    <?php //echo do_shortcode('[scm_botao style="border:0px solid;" class="btn" label="CRIAR NOVO CARNÊS" target="/criar-novo-carne/?pai=__pai__&i000302_cadastro=__pai__&i000302_qtd_par=12&i000302_carne_num=1" on_op="view"]'); ?>
    <?php //echo do_shortcode('[scm_botao style="border:0px solid;" class="btn" label="IMPRIMIR CARNÊ" target="../pdf-carneh/?cod=__pai__" janela="_BLACK" on_op="view"]'); ?>
    </div>
    </div>
    </div>
    </div>










    </main>
    <?php  
    scmFooter();    
    exit;
  }
}

function md000301_on_ative() {
  md000301_create_module();
}

function md000301_delete_module(){
    global $wpdb;
    $wpdb->query( "delete from ".scmPrefix(true)."md000002 where md000002_codigo = 000301;");
    $wpdb->query( "delete from ".scmPrefix(true)."md000001 where md000001_modulo = 000301;");
    $wpdb->query( "drop table if exists ".scmPrefix(false)."md000301");
}

function md000301_on_desative() {
  md000301_delete_module();
}


function md000301_wp_head() {
  // if (!scmIsRole('caixa')) {
    echo '
    <style>  
    .hidden__n { display:none !important; } 
    .hidden__s { display:none !important; } 
    .hidden_ { display:none !important; } 

    .md000301_sit_1 {
      height: 20px;
      width:100px;
      background-image: url(http://localhost/associacao/wp-content/plugins/wpmsc/assets/images/1.png);
    }
    .md000301_sit_2 {
      height: 20px;
      width:100px;
      background-image: url(http://localhost/associacao/wp-content/plugins/wpmsc/assets/images/2.png);
    }
    .md000301_sit_3 {
      height: 20px;
      width:100px;
      background-image: url(http://localhost/associacao/wp-content/plugins/wpmsc/assets/images/3.png);
    }
    .md000301_sit_4 {
      height: 20px;
      width:100px;
      background-image: url(http://localhost/associacao/wp-content/plugins/wpmsc/assets/images/4.png);
    }
    .md000301_sit_5 {
      height: 20px;
      width:100px;
      background-image: url(http://localhost/associacao/wp-content/plugins/wpmsc/assets/images/5.png);
    }
    .md000301_sit_6 {
      height: 20px;
      width:100px;
      background-image: url(http://localhost/associacao/wp-content/plugins/wpmsc/assets/images/6.png);
    }



    </style> 
    ';
  // } else{
    echo '<style>  .hidden_s { display:none !important; } </style> ';
  // }
  
  
}
// add_action('wp_loaded','wpmsc_001324_wp_loaded');
// wp_head
add_action('wp_head', 'md000301_wp_head');

