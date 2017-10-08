<?php 
function md000305_parse_request( &$wp ) {
    // if(!current_user_can('administrativo')) { return '';}
  if($wp->request == 'md000305_create_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000305_create_module();
    echo "md000305_create_module OK"; 
    exit;
  }
  if($wp->request == 'md000305_delete_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000305_delete_module();
    echo "md000305_delete_module OK"; 
    exit;
  }
  if($wp->request == 'md000305_update_pendencia_single'){
    $cod = isset($_GET['cod']) ? $_GET['cod'] : 0;
    if(!$cod) die('cod');
    echo do_shortcode('[msc000305_reset_pendencia_do_cod on__op="update-pendencia"]');
    echo "msc000305_reset_pendencia_do_cod OK"; 
    exit;
  }


  if($wp->request == 'md000305_resetar_listagem'){
    // if (!scmIsRole('administrator')) { return ''; }
    // md000305_delete_module();
    // echo "md000305_delete_module OK"; 
    get_header();
    global $wpdb;
      // if($wp->request == 'modulo/update-situacao-debito'){
        $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "
update ".$wpdb->prefix."md000301 set 
  md000301_sit = 5 
where md000301_sit < 5 
  and md000301_vencimento < '2017-08-24' 
  and md000301_q <> 's'
;

delete from ".$wpdb->prefix."md000305;
insert into ".$wpdb->prefix."md000305 (
  md000305_codigo,
  md000305_qtd,
  md000305_total
)
select 
  md000301_cadastro, 
  count(md000301_codigo), 
  sum(md000301_valor) 
from ".$wpdb->prefix."md000301 
where md000301_sit = 5 
group by md000301_cadastro
;

  ";
  $mysqli->multi_query($sql);
    
    echo 'md000305_delete_module OK';
    get_footer();

    exit;
  }
  if($wp->request == 'md000305'){
        get_header();
        ?>

        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <div style="text-align: center;"><h4><strong>PENDENCIAS</strong></h4></div>
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
                <?php echo do_shortcode('[scm_busca target="/md000200/"]') ?>
            </div>

        </div>

        <div style="height: 20px;"></div>

        <?php //die(get_bloginfo('url')) ?>
        <?php   $ptb = '/md000200/?op=view&cod=__md000200_codigo__';//WPSCM_PATH;//get_bloginfo("url"); ?>
        <?php 
// /?op=view&cod=__md000200_codigo__ 
         ?>
        <?php echo do_shortcode('[scm_list inner="LEFT JOIN wp_md000305 ON '.$wpdb->prefix.'md000200.md000200_codigo = wp_md000305.md000305_codigo" md=000200 on_op="ilist" col_x0="" col_url="md000200_nome:<a href=\''.$ptb.'\'  >__this__</a>" un_show="md000200_data md000200_hora md000200_fj md000200_cpf md000200_rg md000200_sexo md000200_logra_tp md000200_logradouro md000200_numero md000200_complemento md000200_ddd md000200_telefone md000200_e_mail md000200_website md000200_segmento md000200_cep md000200_tp_cad md000200_ref md000200_nascimento md000200_ponto_ref md000200_regiao" style="text-transform: uppercase;" mscColAdd="md000305_qtd:QTD:numeric:int,md000305_total:TotaL:numeric:int"]'); ?> 
        <?php echo do_shortcode('[scm_botao label="RESETAR listagem" target="'.get_bloginfo('url').'/md000305_resetar_listagem/"]') ?>
        <?php //echo do_shortcode('[md000305_resetar_listagem on_op="resetar_listagem"]') ?>
        <?php 
        echo '--';
        echo get_bloginfo('url');
        echo '--'; 
        ?>
<?php 
////mscColAdd='depois_de|antes_de,coluna_name,label'
 ?>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php echo do_shortcode('[scm_nnew md=000305 on_op="nnew" un_show="md000305_data md000305_hora md000305_fj md000305_cpf md000305_rg md000305_sexo md000305_logra_tp md000305_logradouro md000305_numero md000305_complemento md000305_ddd md000305_telefone md000305_e_mail md000305_website md000305_segmento md000305_cep md000305_tp_cad md000305_ref md000305_nascimento md000305_ponto_ref md000305_codigo md000305_regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_insert md=000305 on_op="insert" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="md000305_data md000305_hora md000305_fj md000305_cpf md000305_rg md000305_sexo md000305_logra_tp md000305_logradouro md000305_numero md000305_complemento md000305_ddd md000305__telefone md000305_e_mail md000305_website md000305_segmento md000305_cep md000305_tp_cad md000305_ref md000305_nascimento md000305_ponto_ref md000305_codigo md000305_regiao" style="text-transform: uppercase;"]'); ?>
                <?php //echo do_shortcode('[scm_text on_op="view"]<br>SITUAÇÃO CADASTRAL[/scm_text]'); ?>
                <?php //echo do_shortcode('[scm_view md=000305 cod=__cod__ on_op="view" un_show="md000305_codigo md000305_data md000305_hora"]'); ?>
                <?php echo do_shortcode('[scm_edit md=000305 cod=__cod__ on_op="edit" un_show="md000305_data md000305_hora md000305_fj md000305_cpf md000305_rg md000305_sexo md000305_logra_tp md000305_logradouro md000305_numero md000305_complemento md000305_ddd md000305_telefone md000305_e_mail md000305_website md000305_segmento md000305_cep md000305_tp_cad md000305_ref md000305_nascimento md000305_ponto_ref md000305_codigo md000305__regiao" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_update md=000305 cod=__cod__ on_op="update" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_deletar md=000305 cod=__cod__ on_op="deletar" role_="master"]'); ?>
                <?php echo do_shortcode('[scm_delete md=000305 cod=__cod__ on_op="delete" access="administrativo,super,master" role_="master"]'); ?>
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
add_action( 'parse_request', 'md000305_parse_request');

function md000305_create_module(){
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000305` (
    `md000305_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `md000305_data` date DEFAULT NULL,
    `md000305_hora` varchar(10) DEFAULT NULL,
    `md000305_qtd` int(11) NOT NULL DEFAULT '0' ,
    `md000305_total` float(7,2) NOT NULL DEFAULT '0' ,
    PRIMARY KEY (`md000305_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (
    `md000002_codigo`, `md000002_md000002`, `md000002_tabela`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_ativo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`
  ) VALUES ( 
    000305, '000305', 'md000305', 'md000305_codigo', 10, 'desc', '', '', '', 0, 0, 0
  );
  ";
  $wpdb->query($sql);

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "

delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000305;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000305, 0, 'textfield', 'md000305_codigo', 'codigo', 's', 10, 1, 'md000305');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000305, 1, 'textfield', 'md000305_data', 'data', 's', 10, 1, 'md000305');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000305, 2, 'textfield', 'md000305_hora', 'hora', 's', 10, 1, 'md000305');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000305, 4, 'textfield', 'md000305_qtd', 'qtd', 's', 10, 1, 'md000305');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000305, 5, 'textfield', 'md000305_total', 'total', 's', 10, 1, 'md000305');

  ";
  $mysqli->multi_query($sql);

//DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000305_bi`;
  $sql = "
  CREATE TRIGGER `".$wpdb->prefix."md000305_bi` BEFORE INSERT ON `".$wpdb->prefix."md000305` FOR EACH ROW begin
      if new.md000305_data is null then set new.md000305_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000305_hora is null then set new.md000305_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end
  ";
  $mysqli->query($sql);
}
function msc000305_on_ative() {
    md000305_create_module();
}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'msc000305_on_ative' );

function msc000305_on_desative() {
    global $wpdb;

    $wpdb->query( "delete from ".$wpdb->prefix."md000002 where md000002_codigo = 000305;");
    $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000305;");
    // $wpdb->query( "drop table if exists ".$wpdb->prefix."md000305");
}
register_deactivation_hook( SCM_PATH.'/wpmsc.php', "msc000305_on_desative" );



function msc000305_reset_pendencia_do_cod($atts, $content = null){
  extract(shortcode_atts(array(
    "on_op" => '',
    "access" => '',
    "role" => '',
    "url" => '',
    "id" => ''
  ), $atts));
  // return $on_op;

  if($access){if(!scmIsAccess($access)) return '';}
  if($role){if(!scmIsRole($role)) return '';}
  

  $get_url_if_op = isset($_GET['op']) ? $_GET['op'] : '';
  if($on_op) {
    if($on_op=="empty"){
      if($get_url_if_op) return '';
    }else{
     if(!$get_url_if_op)  return '';
     if($get_url_if_op<>$on_op) return '';

    }
  }

  global $wpdb;

  // $ret = '';
  // $cod = preg_replace("/__cod__/", (isset($_GET['cod']) ? $_GET['cod'] : 0) , $url);
  // $url = preg_replace("/__qs__/", $_SERVER['QUERY_STRING'] , $url);
  $pai = isset($_GET['pai']) ? $_GET['pai'] : 0;
  $cod = isset($_GET['cod']) ? $_GET['cod'] : 0;

  // $ret .= '';
  // $ret .= '';

  $sql ="
update ".$wpdb->prefix."md000301 set 
  md000301_sit = 5 
where md000301_sit < 5 
  and md000301_vencimento < '".date("Y-m-d")."' 
  and md000301_q <> 's'
  and md000301_cadastro = ".$cod."
;
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);

  
  $sql = "delete from ".$wpdb->prefix."md000305 where md000305_codigo = ".$cod.";";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);
  $sql = "
insert into ".$wpdb->prefix."md000305 (
  md000305_codigo,
  md000305_qtd,
  md000305_total
)
select 
  md000301_cadastro, 
  count(md000301_codigo), 
  sum(md000301_valor) 
from ".$wpdb->prefix."md000301 
where md000301_sit = 5 
and md000301_cadastro = ".$cod." 
group by md000301_cadastro
;
";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->query($sql);
  // $mysqli->close();
  // $mysqli->multi_query($sql);
  // echo $content;


    echo '<script type="text/javascript">';
    echo  'window.location.href = "../md000200/?op=view&cod='.$cod.'"';
    echo '</script>';
    exit;


  // return "--atualizado-".$pai."--".$sql;
}
add_shortcode("msc000305_reset_pendencia_do_cod", "msc000305_reset_pendencia_do_cod");


function md000305_delete_module(){
    global $wpdb;
    $wpdb->query( "delete from ".scmPrefix(true)."md000002 where md000002_codigo = 000305;");
    $wpdb->query( "delete from ".scmPrefix(true)."md000001 where md000001_modulo = 000305;");
    $wpdb->query( "drop table if exists ".scmPrefix(false)."md000305");

}

function md000305_on_desative() {
  md000305_delete_module();
}

