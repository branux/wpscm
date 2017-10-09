<?php 
function md071000_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
    
    if(($wp->request == 'md071000_create_module') ) {
        $key = isset($_GET['scmkey']) ? $_GET['scmkey'] : '';$go = 0;if (scmIsRole('administrator')) $go = 1;if ($key==SCMKEY) $go = 1;if (!$go) return '';
        
        md071000_create_module();
        scm_create_fields("071000");

        echo "md071000_create_module OK";
        exit;
    }
    if(($wp->request == 'md071000_delete_module') ) {
        $key = isset($_GET['scmkey']) ? $_GET['scmkey'] : '';$go = 0;if (scmIsRole('administrator')) $go = 1;if ($key==SCMKEY) $go = 1;if (!$go) return '';
        md071000_delete_module();
        echo "md071000_delete_module OK";
        exit;
    }
    if(($wp->request == 'md071000') ) {
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

        <?php 
        // smc_bot();
        // scmFooter();
        get_footer();
        exit;
  }
}
add_action( 'parse_request', 'md071000_parse_request');



function md071000($atts, $content = null){
  extract(shortcode_atts(array(
    "on_op" => ''
  ), $atts));

  $get_url_if_op = isset($_GET['op']) ? $_GET['op'] : '';
  if($on_op) {
    if($on_op=="empty"){
      if($get_url_if_op) return '';
    }else{
      if(!$get_url_if_op)  return '';
      if($get_url_if_op<>$on_op) return '';
    }
  }

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
                    <?php echo do_shortcode('[scm_botao label="N" target="?op=nnew" class="btn btn-default" rol_e="administrator,editor,author,contributor"]') ?>
                    <?php echo do_shortcode('[scm_botao label="E" target="?op=edit&cod=__cod__" class="btn btn-default" on_op="view" rol_e="administrator,editor,author,contributor"]') ?>
                    <?php echo do_shortcode('[scm_botao label="D" target="?op=deletar&cod=__cod__" class="btn btn-default" on_op="view" rol_e="administrator,editor,author,contributor"]') ?>
                </div>
            </div>
            <div class="col-md-2">
                <?php echo do_shortcode('[scm_busca target="/md071000/"]') ?>
            </div>

        </div>

        <div style="height: 20px;"></div>
        <?php echo do_shortcode('[scm_list md=071000 on_op="empty" col_x0="" col_url="md071000_periodo:<a href=\'?op=view&cod=__md071000_codigo__&pai=__md071000_codigo__\'>__this__</a>" un_show="md071000_codigo"]'); ?> 

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=071000 on_op="nnew" un_show="md071000_data md071000_hora md071000_fj md071000_cpf md071000_rg md071000_sexo md071000_logra_tp md071000_logradouro md071000_numero md071000_complemento md071000_ddd md071000_telefone md071000_e_mail md071000_website md071000_segmento md071000_cep md071000_tp_cad md071000_ref md071000_nascimento md071000_ponto_ref md071000_codigo md071000_regiao" rol_e="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_insert md=071000 on_op="insert" rol_e="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_view md=071000 cod=__cod__ on_op="view" un_show="md071000_data md071000_hora md071000_fj md071000_cpf md071000_rg md071000_sexo md071000_logra_tp md071000_logradouro md071000_numero md071000_complemento md071000_ddd md071000__telefone md071000_e_mail md071000_website md071000_segmento md071000_cep md071000_tp_cad md071000_ref md071000_nascimento md071000_ponto_ref md071000_codigo md071000_regiao" rol_e="administrator,editor,author,contributor,subscriber"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<div style="text-align:center;"><br>SITUAÇÃO CADASTRAL</div>[/scm_text]'); ?>
                <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="i000305_codigo i000305_data i000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=071000 cod=__cod__ on_op="edit" un_show="md071000_data md071000_hora md071000_fj md071000_cpf md071000_rg md071000_sexo md071000_logra_tp md071000_logradouro md071000_numero md071000_complemento md071000_ddd md071000_telefone md071000_e_mail md071000_website md071000_segmento md071000_cep md071000_tp_cad md071000_ref md071000_nascimento md071000_ponto_ref md071000_codigo md071000__regiao" rol_e="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_update md=071000 cod=__cod__ on_op="update" rol_e="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=071000 cod=__cod__ on_op="deletar" rol_e="administrator,editor,author,contributor"]'); ?>
                <?php echo do_shortcode('[scm_delete md=071000 cod=__cod__ on_op="delete" rol_e="administrator,editor,author,contributor"]'); ?>
                

                <?php //echo do_shortcode('[scm_botao label="CRIAR CARNÊ" target="'.get_bloginfo('url').'/md000302/?op=nnew&pai=__cod__&md000302_cadastro=__cod__&md000302_qtd_par=12&md000302_venc_prim_par=01/01/2017&md000302_valor_mensal=10&md000302_descri=Contribuição do associado" on_op="view" rol_e="contributor,editor,author,administrator" class="btn"]') ?>
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



}
add_shortcode("md071000", "md071000");


function md071000_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;
/*

insert into wp_md071000 (
  md071000_associado,
  md071000_grupo,
  md071000_valor
)
select 
  md000260_associado,
  md000260_grupo,
  (md000240_valor * md000260_rateio / 100)
from wp_md000260
inner join wp_md000240 on md000240_grupo = md000260_grupo
where md000260_grupo = 1
;

*/
  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md071000` (
    `md071000_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `md071000_periodo` varchar(20) COLLATE utf8mb4_unicode_520_ci,
    `md071000_descricao` text COLLATE utf8mb4_unicode_520_ci,
    PRIMARY KEY (`md071000_codigo`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);


  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (`md000002_codigo`, `md000002_md000002`, `md000002_i00021`, `md000002_titulo`, `md000002_chamada`, `md000002_url`, `md000002_painel`, `md000002_url_md`, `md000002_url_access`, `md000002_param`, `md000002_introd`, `md000002_conteudo`, `md000002_sysmenu`, `md000002_ordem`, `md000002_descricao`, `md000002_set_visivel`, `md000002_restrito`, `md000002_tabela`, `md000002_open_default`, `md000002_padrao`, `md000002_access_pub`, `md000002_access_usr`, `md000002_access_ger`, `md000002_access_adm`, `md000002_access_root`, `md000002_filtrar_empresa`, `md000002_filtrar_usuario`, `md000002_filtrar_filial`, `md000002_md_list`, `md000002_md_new`, `md000002_md_edit`, `md000002_scmMdDelete`, `md000002_md_view`, `md000002_open_cod`, `md000002_cls`, `md000002_duplicado`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_de_sistema`, `md000002_ativo`, `md000002_show_title`, `md000002_show_tbar`, `md000002_html`, `md000002_width`, `md000002_height`, `md000002_renderto`, `md000002_dir`, `md000002_open`, `md000002_mdaccessini`, `md000002_open_js`, `md000002_botoes_padroes`, `md000002_reader`, `md000002_footer`, `md000002_show_context`, `md000002_show_pagin`, `md000002_show_sum`, `md000002_show_col_title`, `md000002_conexao`, `md000002_user`, `md000002_grupo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`) VALUES
  (071000, 'md000002', 'md000002', 'md000002', 'md000002', '', '', 0, 0, '', '', '', 0, 0, '', 0, '', 'md071000', '', '', 0, 0, 0, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, '', '', 'md071000_codigo', 10, 'DESC', '', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', 0, 0, 0);
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);

  
  



}
// function msc071000_on_ative() {
//     md071000_create_module();
// }
// register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc071000_on_ative' );

// function msc071000_on_desative() {
//     md071000_delete_module();
// }
// register_deactivation_hook( SCM_PATH.'/wpmsc.php', "msc071000_on_desative" );
function md071000_delete_module() {
    global $wpdb;
    $wpdb->query( "delete from ".$wpdb->prefix."md000002 where md000002_codigo = 071000;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 071000;");
    $wpdb->query( "drop table if exists ".$wpdb->prefix."md071000");
}

