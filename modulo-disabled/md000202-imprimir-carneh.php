<?php 

function md000202_parse_request( &$wp ) {
	if($wp->request == 'md000202'){
		global $wpdb;
		define('MSC_PDF_ENGINE', SCM_PATH.'pdf_engine/fpdf17/fpdf.php');
		include(MSC_PDF_ENGINE);
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

		from ".$wpdb->prefix."md000200 
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
		$associado[0]["md000200_validade"] = $tb['rows'][0]['md000301_vencimento'];

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
				$pdf->Cell(20,3,"Data e Assinatura de quem recebeu",0);

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
add_action( 'parse_request', 'md000202_parse_request');