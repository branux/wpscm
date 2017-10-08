<?php 
function md000201_parse_request( &$wp ) {
	if($wp->request == 'md000201'){
		global $wpdb;
		define('MSC_PDF_ENGINE', SCM_PATH.'pdf_engine/fpdf17/fpdf.php');
		// echo SCM_PATH;
		include(MSC_PDF_ENGINE);
		$cod = isset($_GET['cod']) ? $_GET['cod'] : 0;
		if(!$cod) {echo 'cod';exit;}
		if ( is_user_logged_in() ) {
			$user_id = get_current_user_id();
			$wpmsc_grupo = get_user_meta($user_id,  'wpmsc_grupo', true );
			if($wpmsc_grupo){
				$wpmsc_grupo_nome_cp1 = get_post_meta( $wpmsc_grupo, 'wpmsc_grupo_nome_cp1', true );
				$wpmsc_grupo_nome_cp2 = get_post_meta( $wpmsc_grupo, 'wpmsc_grupo_nome_cp2', true );
				$wpmsc_grupo_endereco_cp1 = get_post_meta( $wpmsc_grupo, 'wpmsc_grupo_endereco_cp1', true );
				$wpmsc_grupo_endereco_cp2 = get_post_meta( $wpmsc_grupo, 'wpmsc_grupo_endereco_cp2', true );
				$wpmsc_grupo_endereco_cp3 = get_post_meta( $wpmsc_grupo, 'wpmsc_grupo_endereco_cp3', true );
			}
		}

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

		$cartao[0]["nome"]        = strtoupper($tb['rows'][0]['md000200_nome']); 
		$cartao[0]["endereco1"]   = strtoupper($tb['rows'][0]['md000200_endereco']);
		$cartao[0]["endereco2"]   = strtoupper($tb['rows'][0]['md000200_bairro']." - ".$tb['rows'][0]['md000200_cidade']." - ".$tb['rows'][0]['md000200_uf']);

		$sql = "select md000301_vencimento from ".$wpdb->prefix."md000301 where md000301_cadastro = ".$cod." order by md000301_codigo desc limit 0, 1 ";
		$tb2 = scmDbData($sql,'rows');

		if($tb2['r']){
			$cartao[0]["validade"] = scmDateMysqlBr($tb2['rows'][0]['md000301_vencimento']);
		}
		$w_fator = 0.25;

		class PDF extends FPDF{};

		$pdf=new PDF('p','mm','A4');
		$pdf->AddPage('P');
		$pdf->SetMargins(0, 0, 0); 
		$ln = 0; 
		$pc = 1;

		$path_cartao_jpg = SCM_PATH."assets/images/cartao.jpg";//wp_upload_dir();
		// $path_img = $upload_dir['path'] . '/cartao.jpg';
		if(is_file($path_cartao_jpg)){
			$pdf->Image($path_cartao_jpg,5,10+$ln,200,70);
		}
		
		// $pdf->SetFont('Arial','B',10);
		// $pdf->SetXY(15, 15);
		// $pdf->Cell(80,4,SCM_PATH,1,1,"L");

		// $pdf->SetFont('Arial','',8);
		// $pdf->SetXY(15, $ln+44);
		// $pdf->Cell(80,4,"Identificacao do Associado",0,1,"L");

		$pdf->SetFont('Arial','B',10);
		$pdf->SetXY(15, $ln+49);
		$pdf->Cell(60,4,substr($cartao[0]["nome"],0,40),0,1,"L");

		$pdf->SetFont('Arial','',10);
		$pdf->SetXY(15, $ln+55);
		$pdf->Cell(60,3,$cartao[0]["endereco1"],0,1,"L");
		$pdf->SetXY(15, $ln+58);
		$pdf->Cell(60,4,$cartao[0]["endereco2"],0,1,"L");

		$pdf->SetFont('Arial','',8);
		$pdf->SetXY(15, $ln+63);
		$pdf->Cell(15,3,"Matricula N",0,1,"L");

		$pdf->SetFont('Arial','B',10);
		$pdf->SetXY(15, $ln+66);
		$pdf->Cell(15,3,str_pad($cod, 6, "0", STR_PAD_LEFT),0,1,"L");

		$pdf->SetFont('Arial','',8);
		$pdf->SetXY(75, $ln+63);
		$pdf->Cell(15,3,"Validade",0,1,"R");

		$pdf->SetFont('Arial','B',10);
		$pdf->SetXY(75, $ln+66);
		$pdf->Cell(20,3,$cartao[0]['validade'],0,1,"R");

		$pdf->Output();

		exit;
	}
}

add_action( 'parse_request', 'md000201_parse_request');
