<?php 
function md001200_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}

    if(($wp->request == 'md001200_install') ) {
        // if (!scmIsRole('administrator')) { return ''; }
        // md000003_create_fields();
        echo "md001200_install OK";
        exit;
    }
    
    if(($wp->request == 'md001200_create_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md001200_create_module();
        echo "md001200_create_module OK";
        exit;
    }
    if(($wp->request == 'md001200_delete_module') ) {
        if (!scmIsRole('administrator')) { return ''; }
        md001200_delete_module();
        echo "md001200_delete_module OK";
        exit;
    }
    if(($wp->request == 'md001200') ) {
        if (!scmIsRole('administrator,editor,author,contributor,subscriber')) { 
            // return ''; 
            get_header();
            echo '<div style="text-align:center;">';
            echo '<h1>LOGIN</h1>';
            echo '<div>ESTA PÁGINA PODE ESTAR DISPONÍVEL APENAS PARA USUÁRIO LOGADOS.</div>';
            echo '<a class="btn btn-primary" href="/login/">LOGIN</a> ou <a class="btn btn-primary" href="/cadastre-se/">CADASTRE-SE</a>';
            echo '</div>';
            get_footer();
            exit;
        }
        // scmHeader(); 
        // smc_cab();
        get_header();
        ?>

        <div class="row_">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="text-align: center;"><h4><strong>PESSOAS</strong></h4></div>
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
        <div class="row"></div>
        <div style="height: 20px;"></div>
        <?php echo do_shortcode('[scm_list md=001200 on_op="empty" col_x0="" col_url="md001200_nome:<a href=\'?op=view&cod=__md001200_codigo__&pai=__md001200_codigo__\'>__this__</a>" un_show="md001200_data md001200_hora md001200_fj md001200_cpf md001200_rg md001200_sexo md001200_logra_tp md001200_logradouro md001200_numero md001200_complemento md001200_ddd md001200_telefone md001200_e_mail md001200_website md001200_segmento md001200_cep md001200_tp_cad md001200_ref md001200_nascimento md001200_ponto_ref md001200_regiao" style="text-transform: uppercase;"]'); ?> 

        <div class="row_">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=001200 on_op="nnew" un_show="md001200_data md001200_hora md001200_fj md001200_cpf md001200_rg md001200_sexo md001200_logra_tp md001200_logradouro md001200_numero md001200_complemento md001200_ddd md001200_telefone md001200_e_mail md001200_website md001200_segmento md001200_cep md001200_tp_cad md001200_ref md001200_nascimento md001200_ponto_ref md001200_codigo md001200_regiao" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_insert md=001200 on_op="insert" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_view md=001200 cod=__cod__ on_op="view" un_show="md001200_data md001200_hora md001200_fj md001200_cpf md001200_rg md001200_sexo md001200_logra_tp md001200_logradouro md001200_numero md001200_complemento md001200_ddd md001200__telefone md001200_e_mail md001200_website md001200_segmento md001200_cep md001200_tp_cad md001200_ref md001200_nascimento md001200_ponto_ref md001200_codigo md001200_regiao" style="text-transform: uppercase;" role="administrator,editor,author,contributor,subscriber"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<div style="text-align:center;"><br>SITUAÇÃO CADASTRAL</div>[/scm_text]'); ?>
                <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=001200 cod=__cod__ on_op="edit" un_show="md001200_data md001200_hora md001200_fj md001200_cpf md001200_rg md001200_sexo md001200_logra_tp md001200_logradouro md001200_numero md001200_complemento md001200_ddd md001200_telefone md001200_e_mail md001200_website md001200_segmento md001200_cep md001200_tp_cad md001200_ref md001200_nascimento md001200_ponto_ref md001200_codigo md001200__regiao" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_update md=001200 cod=__cod__ on_op="update" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=001200 cod=__cod__ on_op="deletar" role="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_delete md=001200 cod=__cod__ on_op="delete" role="administrator,editor,author,contributor"]'); ?>
                <?php //echo do_shortcode('[scm_list md=000301 on_op="view" criterio="i000301_cadastro=__cod__" un_show="i000301_data i000301_hora i000301_cadastro i000301_q i000301__pago_data" rol_e="contributor,editor"]') ?>

                <?php //echo do_shortcode('[scm_botao label="CRIAR CARNÊ" target="'.get_bloginfo('url').'/md000302/?op=nnew&pai=__cod__&i000302_cadastro=__cod__" on_op="view" role="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="EXCLUIR CARNÊ" target="'.get_bloginfo('url').'/md000304/?op=nnew&pai=__cod__&i000304_associado=__cod__" on_op="view" role="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARTÃO" target="'.get_bloginfo('url').'/md000201/?cod=__cod__" janela="_blank" on_op="view" role="contributor,editor" class="btn"]') ?>
                <?php //echo do_shortcode('[scm_botao label="IMPRIMIR CARNÊ" target="'.get_bloginfo('url').'/md000202/?cod=__cod__" janela="_blank" on_op="view" role="contributor,editor" class="btn"]') ?>
            </div>
            <div class="col-md-2"></div>
        </div>
        <?php 
        // smc_bot();
        // scmFooter();
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md001200_parse_request');

function md001200_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md001200` (
    `md001200_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `md001200_data` date DEFAULT NULL,
    `md001200_hora` varchar(10) DEFAULT NULL,
    `md001200_nome` varchar(50) NOT NULL,
    `md001200_cpf` varchar(50) DEFAULT NULL,
    `md001200_nascimento` date DEFAULT NULL,
    `md001200_telefone` varchar(50) DEFAULT NULL,
    `md001200_e_mail` varchar(50) DEFAULT NULL,
    `md001200_obs` varchar(100) DEFAULT NULL,
    `md001200_usr` int DEFAULT 0,
    PRIMARY KEY (`md001200_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (`md000002_codigo`, `md000002_md000002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (001200, 'md000002', 'md000002', 'md000002', 'md000002', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'md001200', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'md001200_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $wpdb->query($sql);

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "


    delete from ".$wpdb->prefix."md000001 where md000001_modulo = 001200;


  ";
  $mysqli->multi_query($sql);

//DROP TRIGGER IF EXISTS `".$wpdb->prefix."md001200_bi`;
  $sql = "
  CREATE TRIGGER `".$wpdb->prefix."md001200_bi` BEFORE INSERT ON `".$wpdb->prefix."md001200` FOR EACH ROW begin
      if new.md001200_data is null then set new.md001200_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md001200_hora is null then set new.md001200_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end
  ";
  $mysqli->query($sql);

}
// function msc001200_on_ative() {
//     md001200_create_module();
// }
// register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc001200_on_ative' );

// function msc001200_on_desative() {
//     md001200_delete_module();
// }
// register_deactivation_hook( SCM_PATH.'/wpmsc.php', "msc001200_on_desative" );
function md001200_delete_module() {
    global $wpdb;
    $wpdb->query( "delete from ".$wpdb->prefix."md000002 where md000002_codigo = 001200;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 001200;");
    // $wpdb->query( "drop table if exists ".$wpdb->prefix."md001200");
}

