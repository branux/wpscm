<?php 
function md000304_parse_request( &$wp ) {
  // if(!current_user_can('master')) { return '';}

  if($wp->request == 'md000304_create_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000304_create_module();
    echo "md000304_create_module OK"; 
    exit;
  }
  if($wp->request == 'md000304_delete_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000304_delete_module();
    echo "md000304_delete_module OK"; 
    exit;
  }

  if($wp->request == 'md000304'){
    get_header();
    ?>

    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="background-color: silver;padding: 20px;text-transform: uppercase;margin:10px; ">
    <?php echo do_shortcode('[scm_view md=000200 cod=__pai__ on_op="nnew" un_show="md000200_data md000200_hora md000200_fj md000200_cpf md000200_rg md000200_sexo md000200_logra_tp md000200_logradouro md000200_numero md000200_complemento md000200_ddd md000200_telefone md000200_e_mail md000200_website md000200_segmento md000200_cep md000200_tp_cad md000200_ref md000200_nascimento md000200_ponto_ref md000200_codigo md000200_endereco md000200_bairro md000200_cidade md000200_uf md000200_regiao"]') ?>
    </div>
    </div>
    </div>
    </div>
    


    <h2 class="text-center">EXCLUSÃO DE CARNÊ</h2>
		<div class="container" style="text-transform: uppercase;max-width:1024px;border:0px solid gray;">
		<div class="row">
		<div class="col-md-8 col-md-offset-2" style="border:0px solid gray;">
		
		<?php echo do_shortcode('[scm_nnew md=000304 on_op="nnew"]') ?>
		<?php echo do_shortcode('[scm_insert md=000304 target_pos_insert="../md000200/?op=view&cod=__pai__" on_op="insert"]') ?>
		
		</div>
		</div>
		</div>

    </main>
    <?php 
    get_footer();
    exit;
  }
}
add_action( 'parse_request', 'md000304_parse_request');


function md000304_create_module(){
  // if ( !defined( 'IDADOS_ENGINE' ) ) exit();
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "
  CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000304` (
    `md000304_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
    `md000304_data` date DEFAULT NULL,
    `md000304_hora` varchar(10) DEFAULT NULL,
    `md000304_associado` int(11) NOT NULL,
    `md000304_carne_del` int(11) NOT NULL,
    PRIMARY KEY (`md000304_codigo`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $mysqli->query($sql);

  $sql = "
  INSERT INTO `".$wpdb->prefix."md000002` (
    `md000002_codigo`, `md000002_md000002`, `md000002_tabela`, `md000002_sql_sort`, `md000002_sql_limit`, `md000002_sql_dir`, `md000002_ativo`, `md000002_retirar_acentos`, `md000002_caixa_alta`, `md000002_grupalizar`, `md000002_show_cp_option`, `md000002_show_tcp_option`
  ) VALUES ( 
    000304, 'EXCLUIR CARNES', 'md000304', 'md000304_codigo', 10, 'desc', '', '', '', 0, 0, 0
  );
  ";
  $wpdb->query($sql);



  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "

delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000304;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000304, 0, 'textfield', 'md000304_codigo', 'codigo', 's', 10, 1, 'md000304');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'textfield_', 'textfield_', 'datefield', 'datefield', 'label', 'label', 000304, 1, 'textfield', 'md000304_data', 'data', 's', 10, 1, 'md000304');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000304, 2, 'textfield', 'md000304_hora', 'hora', 's', 10, 1, 'md000304');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000304, 3, 'textfield', 'md000304_associado', 'matricula associado', 's', 10, 1, 'md000304');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000304, 4, 'textfield', 'md000304_carne_del', 'carne numero', 's', 10, 1, 'md000304');


  ";
  $mysqli->multi_query($sql);



  $sql = "
  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000304_bi`;
  CREATE TRIGGER ".$wpdb->prefix."md000304_bi BEFORE INSERT ON ".$wpdb->prefix."md000304 FOR EACH ROW 
  BEGIN 
    if new.md000304_data is null then 
      set new.md000304_data = (SELECT DATE(CURRENT_TIMESTAMP())); 
    end if; 
    if new.md000304_hora is null then 
      set new.md000304_hora = (SELECT TIME(CURRENT_TIMESTAMP())); 
    end if; 
  end 
  ";
  
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);

  $sql = "
  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000304_ai`;
  CREATE TRIGGER `".$wpdb->prefix."md000304_ai` AFTER INSERT ON `".$wpdb->prefix."md000304`
    FOR EACH ROW begin
      delete 
      from 
        ".$wpdb->prefix."md000301 
      where 
        md000301_cadastro = new.md000304_associado 
        and md000301_cn = new.md000304_carne_del
      ;
    end
  ;

  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);

}


function wpmsc_000304b_on_ative() {
  md000304_create_module();
}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'wpmsc_000304b_on_ative' );

function wpmsc_000304_on_desative() {
  md000304_delete_module();
}
register_deactivation_hook( SCM_PATH.'/wpmsc.php', "wpmsc_000304_on_desative" );

function md000304_delete_module(){
  global $wpdb;

  $wpdb->query( "delete from ".$wpdb->prefix."md000002 where md000002_codigo = 000304;");
  $wpdb->query( "delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000304;");
  // $wpdb->query( "drop table if exists ".$wpdb->prefix."md000304");
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query("DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000304_ai`;");
}