<?php 
function md000260_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    
    if(($wp->request == 'md000260_create_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        
        md000260_create_module();
        idados_create_fields("000260");

        echo "md000260_create_module OK";
        exit;
    }
    if(($wp->request == 'md000260_delete_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md000260_delete_module();
        echo "md000260_delete_module OK";
        exit;
    }
    if(($wp->request == 'md000260') ) {
        if (!scmIsRole('administrator,author,editor,contributor,subscriber')) { 
            // return ''; 
            get_header();
            echo '<div style="text-align:center;">';
            echo '<h1>LOGIN</h1>';
            echo '<div style="padding:20px;color:red;">ESTA PÁGINA PODE ESTAR DISPONÍVEL <br> APENAS PARA USUÁRIO LOGADOS.</div>';
            echo '<a class="btn btn-primary" href="/login/">LOGIN</a>';
            echo '</div>';
            get_footer();
            exit;
        }

        // scmHeader(); 
        // smc_cab();
        get_header();
        ?>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="text-align: center;"><h4><strong>RENDIMENTOS DOS ASSOCIADOS</strong></h4></div>
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
                <?php echo do_shortcode('[scm_busca target="/md000260/"]') ?>
            </div>

        </div>

        <div style="height: 20px;"></div>
        <?php echo do_shortcode('[scm_list md=000260 on_op="empty" col_x0="" col_url="md000260_valor:<a href=\'?op=view&cod=__md000260_codigo__&pai=__md000260_codigo__\'>__this__</a>" style="text-transform: uppercase;"]'); ?> 

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=000260 on_op="nnew" un_show="md000260_data md000260_hora md000260_fj md000260_cpf md000260_rg md000260_sexo md000260_logra_tp md000260_logradouro md000260_numero md000260_complemento md000260_ddd md000260_telefone md000260_e_mail md000260_website md000260_segmento md000260_cep md000260_tp_cad md000260_ref md000260_nascimento md000260_ponto_ref md000260_codigo md000260_regiao" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_insert md=000260 on_op="insert" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_view md=000260 cod=__cod__ on_op="view" un_show="md000260_data md000260_hora md000260_fj md000260_cpf md000260_rg md000260_sexo md000260_logra_tp md000260_logradouro md000260_numero md000260_complemento md000260_ddd md000260__telefone md000260_e_mail md000260_website md000260_segmento md000260_cep md000260_tp_cad md000260_ref md000260_nascimento md000260_ponto_ref md000260_codigo md000260_regiao" style="text-transform: uppercase;" role="administrator,editor,author,contributor,subscriber"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<div style="text-align:center;"><br>SITUAÇÃO CADASTRAL</div>[/scm_text]'); ?>
                <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=000260 cod=__cod__ on_op="edit" un_show="md000260_data md000260_hora md000260_fj md000260_cpf md000260_rg md000260_sexo md000260_logra_tp md000260_logradouro md000260_numero md000260_complemento md000260_ddd md000260_telefone md000260_e_mail md000260_website md000260_segmento md000260_cep md000260_tp_cad md000260_ref md000260_nascimento md000260_ponto_ref md000260_codigo md000260__regiao" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_update md=000260 cod=__cod__ on_op="update" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=000260 cod=__cod__ on_op="deletar" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_delete md=000260 cod=__cod__ on_op="delete" role="administrator,editor,author,contributor"]'); ?>
                

                <?php //echo do_shortcode('[scm_botao label="CRIAR CARNÊ" target="'.get_bloginfo('url').'/md000302/?op=nnew&pai=__cod__&md000302_cadastro=__cod__&md000302_qtd_par=12&md000302_venc_prim_par=01/01/2017&md000302_valor_mensal=10&md000302_descri=Contribuição do associado" on_op="view" role="contributor,editor,author,administrator" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="EXCLUIR CARNÊ" target="'.get_bloginfo('url').'/md000304/?op=nnew&pai=__cod__&md000304_associado=__cod__" on_op="view" rol_e="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARTÃO" target="'.get_bloginfo('url').'/md000201/?cod=__cod__" janela="_blank" on_op="view" rol_e="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARNÊ" target="'.get_bloginfo('url').'/md000202/?cod=__cod__" janela="_blank" on_op="view" rol_e="contributor,editor" class="btn"]') ?>
            </div>
            <div class="col-md-2"></div>
        </div>

        <div class="row">
        <div class="col-md-12">
        <?php //echo do_shortcode('[scm_list md=000301 on_op="view" criteri_o="md000301_cadastro=__cod__" un__show="md000301_data md000301_hora md000301_cadastro md000301_q md000301__pago_data" rol_e="contributor,editor"]') ?>
        </div>
        </div>
        <?php 
        // smc_bot();
        // scmFooter();
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md000260_parse_request');


/*

delete from wp_md000260;
insert into wp_md000260 (
  md000260_grupo,
  md000260_associado,
  md000260_total_grupo,
  md000260_valor
) select 
    md000230_grupo,
    md000230_associado,
    md000220_valor,
    sum(md000230_valor)
  from wp_md000230
  inner join wp_md000220 on md000230_grupo = md000220_codigo 
  where md000230_grupo = 1 
  group by md000230_grupo, md000230_associado, md000220_valor
  

25000 x 20000 = 500000000
500000000 / 25000 = 
500000000 / 20000 = 

25000 / 20000 * 100
20000 / 25000 * 100
select 
    md000230_grupo,
    md000230_associado,
    md000220_valor,
    md000230_valor
  from wp_md000230
  inner join wp_md000220 on md000230_grupo = md000220_codigo 
*/
  

function md000260_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000260` (
    `md000260_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `md000260_data` date DEFAULT NULL,
    `md000260_hora` varchar(10) DEFAULT NULL,
    `md000260_total_grupo` float(7,2) DEFAULT '0',
    `md000260_valor` float(7,2) DEFAULT '0',
    `md000260_rateio` float(7,2) DEFAULT '0',
    `md000260_grupo` int NOT NULL,
    `md000260_associado` int NOT NULL,
    PRIMARY KEY (`md000260_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);


  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (`md000002_codigo`, `md000002_md000002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (000260, 'md000002', 'md000002', 'md000002', 'md000002', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'md000260', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'md000260_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);

  
  

//DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000260_bi`;
  $sql = "
  CREATE TRIGGER `".$wpdb->prefix."md000260_bi` BEFORE INSERT ON `".$wpdb->prefix."md000260` FOR EACH ROW begin
      if new.md000260_data is null then set new.md000260_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000260_hora is null then set new.md000260_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
      set new.md000260_rateio = new.md000260_valor / new.md000260_total_grupo * 100;
  end
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);


  $sql = "
  CREATE TRIGGER `".$wpdb->prefix."md000260_ai` AFTER INSERT ON `".$wpdb->prefix."md000260` FOR EACH ROW begin
    update ".$wpdb->prefix."md000220 set md000220_valor = md000220_valor + new.md000260_valor where md000220_codigo = new.md000260_grupo;
  end
  ";
  // $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  // $mysqli->query($sql);



}
// function msc000260_on_ative() {
//     md000260_create_module();
// }
// register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc000260_on_ative' );

// function msc000260_on_desative() {
//     md000260_delete_module();
// }
// register_deactivation_hook( SCM_PATH.'/wpmsc.php', "msc000260_on_desative" );
function md000260_delete_module() {
    global $wpdb;
    $wpdb->query( "delete from ".$wpdb->prefix."md000002 where md000002_codigo = 000260;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000260;");
    $wpdb->query( "drop table if exists ".$wpdb->prefix."md000260");
}

