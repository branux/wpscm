<?php 
function md000302_parse_request( &$wp ) {
  // if(!current_user_can('master')) { return '';}
  
  if($wp->request == 'md000302_create_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000302_create_module();
    echo "md000302_create_module OK";
    exit;
  }
  if($wp->request == 'md000302_delete_module'){
    if (!scmIsRole('administrator')) { return ''; }
    md000302_delete_module();
    echo "md000302_delete_module OK";
    exit;
  }

  if($wp->request == 'md000302'){
    get_header();
    ?>

    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="text-align: center;">
    <?php echo do_shortcode('[scm_botao class="btn btn-primary_" label="cadastro" style="border:1px solid;" target="../md000200/?op=view&cod=__pai__" ]') ?>
    <?php echo do_shortcode('[scm_botao class="btn btn-primary_" label="reload" style="border:1px solid;" target="" access=""]') ?>
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

    <h2 style="text-align:center;margin: 0px;padding:0px; " >CRIAR PARCELAS</h2>
    <div class="container" style="text-transform: uppercase; max-width: 1024px; border: 0px solid gray;">
    <div class="row">
    <div class="col-md-12 ">
    <div style="padding: 20px;text-transform: uppercase;margin:10px; ">
    <?php echo do_shortcode('[scm_nnew md="000302" on-op="nnew" un_show="md000302_carne_num"]') ?>
    <?php //echo do_shortcode('[scm_insert md="000302" on_op="insert" target_pos_insert="'.get_bloginfo('url').'/md000200/?op=view&cod=__pai__"]') ?>
    <?php echo do_shortcode('[scm_insert md="000302" on_op="insert" target_pos_insert="../md000305_update_pendencia_single/?cod=__pai__"]') ?>

    </div>
    </div>
    </div>
    </div>


    </main>
    <?php 
    get_footer();
    exit;
  }
}
add_action( 'parse_request', 'md000302_parse_request');

function md000302_create_module() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  global $wpdb;
  global $charset_collate;


  $sql = "
    CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."md000302` (
      `md000302_codigo` bigint(20) NOT NULL AUTO_INCREMENT,
      `md000302_data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
      `md000302_hora` varchar(10) DEFAULT NULL,
      `md000302_cadastro` int(11) DEFAULT NULL,
      `md000302_qtd_par` int(11) NOT NULL,
      `md000302_descri` varchar(100) NOT NULL,
      `md000302_carne_num` int(11) DEFAULT NULL,
      `md000302_venc_prim_par` date DEFAULT NULL,
      `md000302_valor_mensal` float(7,2) DEFAULT NULL,
      PRIMARY KEY (`md000302_codigo`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;
  ";
  $wpdb->query($sql);



  $sql = "INSERT INTO `".$wpdb->prefix."md000002` (
  `md000002_codigo`, 
  `md000002_md000002`, 
  `md000002_tabela`, 
  
  `md000002_sql_sort`, 
  `md000002_sql_limit`, 
  `md000002_sql_dir`, 
  
  `md000002_ativo`, 
  `md000002_retirar_acentos`, 
  `md000002_caixa_alta`, 

  `md000002_grupalizar`, 
  `md000002_show_cp_option`, 
  `md000002_show_tcp_option`
  
  ) VALUES (
  000302, 
  'md000302', 
  'md000302', 
  
  'md000302_codigo', 
  10, 
  'desc', 
  
  '', 
  '', 
  '', 
  
  0, 
  0, 
  0
  
  );";
  $wpdb->query($sql);

  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $sql = "
delete from ".$wpdb->prefix."md000001 where md000001_modulo = 000302;
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'label', 'label', 000302, 0, 'textfield', 'md000302_codigo', 'codigo', 's', 10, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela, md000001_ctr_new, md000001_ctr_edit) values ('string', 'label', 'label', 000302, 1, 'textfield', 'md000302_data', 'data', 's', 10, 1, 'md000302', 'textfield_', 'textfield_');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield_', 'textfield_', 'textfield', 'textfield', 'label', 'label', 000302, 2, 'textfield', 'md000302_hora', 'hora', 's', 10, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000302, 3, 'textfield', 'md000302_cadastro', 'matricula', 's', 10, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000302, 4, 'textfield', 'md000302_qtd_par', 'qtd parcelas', 's', 10, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('string', 'textfield', 'textfield', 'textfield', 'textfield', 'label', 'label', 000302, 5, 'textfield', 'md000302_descri', 'descricao', 's', 100, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('int', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'label', 'label', 000302, 6, 'textfield', 'md000302_carne_num', 'carne num', 's', 10, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('date', 'datefield', 'datefield', 'datefield', 'datefield', 'label', 'label', 000302, 7, 'textfield', 'md000302_venc_prim_par', 'vencimento parcela 1', 's', 10, 1, 'md000302');
insert into ".$wpdb->prefix."md000001 (md000001_tipo, md000001_ctr_new, md000001_ctr_edit, md000001_ctr_loc, md000001_ctr_lst, md000001_formato, md000001_ctr_view, md000001_ctr_list, md000001_modulo, md000001_ordem, md000001_xtype, md000001_campo, md000001_label, md000001_ativo, md000001_size, md000001_black, md000001_tabela) values ('float', 'numberfield', 'numberfield', 'numberfield', 'numberfield', 'moeda', 'label', 'label', 000302, 8, 'textfield', 'md000302_valor_mensal', 'valor das parcelas', 's', 10, 1, 'md000302');
  ";
  $mysqli->multi_query($sql);





  $sql = "

DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000302_ai`;
CREATE TRIGGER `".$wpdb->prefix."md000302_ai` AFTER INSERT ON `".$wpdb->prefix."md000302`
  FOR EACH ROW begin
  DECLARE ps INT DEFAULT new.md000302_qtd_par;
  DECLARE p INT DEFAULT 0;
  declare carne_num integer default 0;
  select 
    max(md000301_cn) 
  from 
    ".$wpdb->prefix."md000301 
  where 
    md000301_cadastro = new.md000302_cadastro 
  into 
    carne_num
  ;
  
  if(carne_num is null) then 
    set carne_num = 0;
  end if;
  set carne_num = carne_num + 1;

  WHILE p < ps DO

    insert into ".$wpdb->prefix."md000301(
      md000301_cadastro, 
      md000301_sit, 
      md000301_cn,

      md000301_p, 
      md000301_ps, 
      md000301_vencimento, 

      md000301_valor, 
      md000301_q
    ) values (
      new.md000302_cadastro,
      2,
      carne_num,

      (p + 1),
      new.md000302_qtd_par,
      (select date_add(new.md000302_venc_prim_par, interval p month) ),

      new.md000302_valor_mensal,
      'n'
    );
    
    SET p = p + 1;
  END WHILE;
  update ".$wpdb->prefix."md000301 set md000301_sit=5 where md000301_q='n' and md000301_cadastro = new.md000302_cadastro and md000301_vencimento < (SELECT DATE(CURRENT_TIMESTAMP() ));
  update ".$wpdb->prefix."md000301 set md000301_sit=2 where md000301_q='n' and md000301_cadastro = new.md000302_cadastro and md000301_vencimento > (SELECT DATE(CURRENT_TIMESTAMP() ));
  update ".$wpdb->prefix."md000301 set md000301_sit=3 where md000301_q='n' and md000301_cadastro = new.md000302_cadastro and md000301_vencimento = (SELECT DATE(CURRENT_TIMESTAMP() ));

end;


  DROP TRIGGER IF EXISTS `".$wpdb->prefix."md000302_bi`;
  CREATE TRIGGER `".$wpdb->prefix."md000302_bi` BEFORE INSERT ON `".$wpdb->prefix."md000302` FOR EACH ROW begin
      if new.md000302_data is null then set new.md000302_data  = (SELECT DATE(CURRENT_TIMESTAMP())); end if;
      if new.md000302_hora is null then set new.md000302_hora  = (SELECT TIME(CURRENT_TIMESTAMP())); end if;
  end;
  ";
  $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  $mysqli->multi_query($sql);

}

function md000302_on_ative() {
  md000302_create_module();
}
register_activation_hook( SCM_PATH.'/wpmsc.php', 'md000302_on_ative' );

function md000302_delete_module(){
    global $wpdb;
    $wpdb->query( "delete from ".scmPrefix(true)."md000002 where md000002_codigo = 000302;");
    $wpdb->query( "delete from ".scmPrefix(true)."md000001 where md000001_modulo = 000302;");
    $wpdb->query( "drop table if exists ".scmPrefix(false)."md000302");
}
function md000302_on_desative() {
  md000302_delete_module();
}
register_deactivation_hook( SCM_PATH.'/wpmsc.php', "md000302_on_desative" );










































function md000301_imprimir_carneh( &$wp ) {

  if($wp->request == 'modulo/imprimir-carneh'){







  global $wpdb;
  include(IDADOS_PDF_ENGINE);
  $cod = isset($_GET['cod']) ? $_GET['cod'] : 0;
  if(!$cod) die('cod');

  $sql = "
  select
    md000200_codigo, 
    md000200_nome, 
    md000200_endereco, 
    md000200_logra_tp, 
    md000200_logradouro, 
    md000200_numero, 
    md000200_ponto_ref, 
    md000200_bairro, 
    md000200_cidade, 
    md000200_uf, 
    md000200_cep
    
  from ".$wpdb->prefix."md00000200 
  where
       md000200_codigo = ".$cod."
  ";
  
  $tb = scmDbData($sql,'rows');

  $associado[0]["md000200_nome"]       = strtoupper($tb['rows'][0]['md000200_nome']); 
  $associado[0]["md000200_endereco1"]  = strtoupper($tb['rows'][0]['md000200_endereco']);
  $associado[0]["md000200_endereco2"]  = strtoupper($tb['rows'][0]['md000200_bairro']." - ".$tb['rows'][0]['md000200_cidade']." - ".$tb['rows'][0]['md000200_uf']);


  //validade é a ulyima parcela do carnê
  $sql = "
    select 
      md000301_vencimento 
    from 
      ".$wpdb->prefix."md000301 
    where 
      md000301_cadastro = ".$cod." 
    order by 
      md000301_codigo desc 
    limit 
      0, 1
    ;
    ";
  $tb = scmDbData($sql,'rows');
  $associado[0]["md000200_validade"]   = $tb['rows'][0]['md000301_vencimento'];
  
  $sql = "
    select 
      md000301_cn 
    from 
      ".$wpdb->prefix."md000301 
    where 
      md000301_cadastro = ".$cod." 
    order 
      by md000301_codigo desc 
    limit 0, 1 
    ;
  ";
  $tb = scmDbData($sql,'rows');


  $associado[0]["carne"] = $tb['rows'][0]['md000301_cn'];


  $sql = "
   select 
    md000301_codigo,
    md000301_data,
    md000301_cn,
    md000301_vencimento,
    md000301_valor,
    md000301_ps,
    md000301_p,
    md000301_q
  from 
    ".$wpdb->prefix."md000301
  where 
    md000301_cadastro = ".$cod."
    and 
    md000301_cn = ".$associado[0]["carne"]." 
  order by 
    md000301_vencimento asc 
  ";
  $tb = scmDbData($sql,'rows');


  $reg = array();
  for ($i=0;$i<($tb['r']);$i++){
    $reg[$i]['codigo']      = $tb['rows'][$i]['md000301_codigo'];
    $reg[$i]['data']        = scmDateMysqlBr($tb['rows'][$i]['md000301_data']);

    $reg[$i]['cn']          = $tb['rows'][$i]['md000301_cn'];
    $reg[$i]['vencimento']  = scmDateMysqlBr($tb['rows'][$i]['md000301_vencimento']);
    $reg[$i]['valor']       = $tb['rows'][$i]['md000301_valor'];
    $reg[$i]['ps']          = $tb['rows'][$i]['md000301_ps'];
    $reg[$i]['p']           = $tb['rows'][$i]['md000301_p'];
    $reg[$i]['quitado']     = $tb['rows'][$i]['md000301_q'];

  }


  $wpmsc_grupo_carneh_layout1 = "Contribuicao mensal do associado";
  $wpmsc_grupo_carneh_layout2 = "Associado Contribuinte";

  $wpmsc_grupo_nome_cp1 = "";
  $wpmsc_grupo_nome_cp2 = "";
  $wpmsc_grupo_endereco_cp1 = "";
  $wpmsc_grupo_endereco_cp2 = "";
  $wpmsc_grupo_endereco_cp3 = "";

  $wpmsc_grupo_rodape1 = "";
  $wpmsc_grupo_rodape2 = "";



  class PDF extends FPDF{}
  $pdf=new PDF('p','mm','A4');
  $pdf->SetAutoPageBreak(0);
  $pdf->AddPage('P');
  $pdf->SetMargins(0, 0, 0); 
  $ln = 0; 
  $pc = 1;
  $cl = 0;
  for ($i=0;$i<($tb['r']);$i++){
    if($pc>4) {
      $cl = 0;
      $pc=1;
      $ln=0;
      $pdf->AddPage('P');
    }
    
    


    $cl = 0;
    for ($c=0;$c<=1;$c++){
      $pdf->SetFont('Arial','i',7);
      $pdf->SetXY($cl+14, $ln+11);
      $pdf->Cell(55,4, $wpmsc_grupo_carneh_layout1 , 0,0,"L");//"Contribuicao mensal do associado "

      $pdf->SetFont('Arial','i',6);
      $pdf->SetXY($cl+65, $ln+11);
      $pdf->Cell(38,4, "impresso em: ".date("Y/m/d h:m:s") , 0,0,"R");

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+48, $ln+15);
      $pdf->Cell(55,4, $wpmsc_grupo_carneh_layout2, 0,0);//"Organizacao"

      $pdf->SetFont('Arial','B',10);
      $pdf->SetXY($cl+48, $ln+18);
      $pdf->Cell(55,4, $wpmsc_grupo_nome_cp1, 0,0);
      $pdf->SetFont('Arial','B',8);
      $pdf->SetXY($cl+48, $ln+21);
      
      $pdf->Cell(55,4, $wpmsc_grupo_nome_cp2, 0,0);










      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+48, $ln+24);
      $pdf->Cell(55,4, $wpmsc_grupo_endereco_cp1, 0,0);

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+48, $ln+26);
      $pdf->Cell(55,4, $wpmsc_grupo_endereco_cp2, 0,0);


      $pdf->SetFont('Arial','i',7);
      $pdf->SetXY($cl+48, $ln+33);
      $pdf->Cell(55,4, $wpmsc_grupo_carneh_layout3, 0,0);//"Associado contribuinte"
      


      $pdf->SetFont('Arial','B',8);
      $pdf->SetXY($cl+48, $ln+36);
      $pdf->Cell(55,4, $associado[0]["md000200_nome"], 0,0);

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+48, $ln+40);
      $pdf->Cell(55,3,$associado[0]["md000200_endereco1"],0,0);
      $pdf->SetXY($cl+48, $ln+43);
      $pdf->Cell(55,3,$associado[0]["md000200_endereco2"],0,0);





      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+13, $ln+48);
      $pdf->Cell(20,3,$reg[$i]['qrcode'],0,1,"L");





      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+13, $ln+52);
      $pdf->Cell(16,3,"Matricula",1,1,"L");

      $pdf->SetFont('Arial','B',10);
      $pdf->SetXY($cl+13, $ln+55);
      $pdf->Cell(16,4,str_pad($cod, 6, "0", STR_PAD_LEFT)  ,1,1,"L");
    

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+30, $ln+52);
      $pdf->Cell(15,3,"Documento",1,1,"C");

      $pdf->SetFont('Arial','B',10);
      $pdf->SetXY($cl+30, $ln+55);
      $pdf->Cell(15,4,str_pad($reg[$i]['codigo'], 6, "0", STR_PAD_LEFT),1,1,"C");

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+45, $ln+52);
      $pdf->Cell(20,3,"Emissão",1,1,"C");

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+45, $ln+55);
      $pdf->Cell(20,4,$reg[$i]['data'],1,1,"C");

      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+66, $ln+52);
      $pdf->Cell(20,3,"Vencimento",1,1,"C");

      $pdf->SetFont('Arial','B',10);
      $pdf->SetXY($cl+66, $ln+55);
      $pdf->Cell(20,4,$reg[$i]['vencimento'],1,1,"C");


      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+86, $ln+52);
      $pdf->Cell(17,3,"Valor R$",1,1,"R");//VALOR
    
      $pdf->SetFont('Arial','B',10);
      $pdf->SetXY($cl+86, $ln+55);
      $pdf->Cell(17,4,$reg[$i]['valor'],1,1,"R");




      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+13, $ln+61);
      $pdf->Cell(20,3,"Valor Pago",0);
    
      $pdf->SetFont('Arial','',7);
      $pdf->SetXY($cl+48, $ln+61);
      $pdf->Cell(20,3,"Data e Assinatura",0);



      
      $pdf->SetFont('Arial','',6);
      $pdf->SetXY($cl+13, $ln+70);
      $pdf->Cell(20,3,$wpmsc_grupo_rodape1,0);

      // $pdf->SetFont('Arial','',6);
      $pdf->SetXY($cl+13, $ln+72);
      $pdf->Cell(20,3,$wpmsc_grupo_rodape2,0);

      if($reg[$i]['quitado']=='s'){
        $pdf->SetFont('Arial','B',16);
        $pdf->SetXY($cl+13, $ln+65);
        $pdf->Cell(20,3,"-- P A R C E L A   Q U I T A D A --",0);
      }

      $cl = $cl + 96;
    }

    $ln = $ln + 70;
    $pc++;
  }
  $pdf->Output();














    exit;
  }
}

