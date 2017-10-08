<?php 
function md000003_action_links( $links ) {
	$site_url = site_url();
	$links[] = '<a target="_blank" href="'.$site_url.'/md000003_create_fields/?md=">generate-fields</a>';
	return $links;
}
add_filter( 'plugin_action_links_'.WPSCM_FILE, 'md000003_action_links' );

function md000003_parse_request( &$wp ) {
	if (!scmIsRole('administrator')) { return ''; }
	if(($wp->request == 'md000003_create_fields') ) {
		md000003_create_fields();
		exit;
	}
}
add_action( 'parse_request', 'md000003_parse_request');

function md000003_create_fields(){
	$md = isset($_GET['md']) ? $_GET['md'] : '';
	if(!$md) {echo 'md'; exit;}
	global $wpdb;
	$sql = "SHOW COLUMNS FROM ".$wpdb->prefix.'md'.$md;
	// echo $sql;
	// echo '<br>';
	$tb = scmDbExe($sql,'rows');

	$tabela_len = strlen($tabela);
	$sql_name = "";
	$sql_value = "";
	echo '<pre>';
	// print_r($tb['rows']);
	//die();
	// echo "\n";
	// echo "\n";
	// echo "delete from \".\$wpdb->prefix.\"md000001 where md000001_modulo = md".$md.";\n";
	echo "delete from ".$wpdb->prefix."md000001 where md000001_modulo = ".$md.";\n";
	$campos = array();
	$i=0;
	foreach ($tb['rows'] as $key => $value) {
		// echo $value['Field'];
		echo '<br>';
		$campos[$i]['nome'] = $value['Field'];
		$campos[$i]['tipo'] = $value['Type'];
		$campos[$i]['tam'] = $value['Type'];
		$campos[$i]['label'] = substr($value['Field'], 9);

		$campos[$i]['ctr_list'] = 'label';
		$campos[$i]['ctr_new'] = 'textfield';
		$campos[$i]['ctr_view'] = 'label';
		$campos[$i]['ctr_edit'] = 'textfield';

		$campos[$i]['ordem'] = $i;
		$campos[$i]['tabela'] = 'md'.$md;
		



		if(substr($value['Type'], 0, 7) == 'varchar'){
			$campos[$i]['tipo'] = 'varchar';
			$campos[$i]['tam'] = substr($value['Type'],  8 ,-1);
		}
		if(substr($value['Type'], 0, 5) == 'float'){
  			$campos[$i]['tam'] = 10;
  			$campos[$i]['tipo'] = 'float';
		}
		if(substr($value['Type'], 0, 4) == 'date'){
  			$campos[$i]['tam'] = 10;
  			$campos[$i]['tipo'] = 'date';
		}
		if(substr($value['Type'], 0, 3) == 'int'){
  			$campos[$i]['tam'] = 10;
  			$campos[$i]['tipo'] = 'int';
		}
		if(substr($value['Type'], 0, 4) == 'text'){
  			$campos[$i]['tam'] = 1000;
  			$campos[$i]['tipo'] = 'blob';

		}
		$sql = "
		insert into ".$wpdb->prefix."md000001 (
			md000001_modulo,
			md000001_campo, 
			md000001_tipo, 
			md000001_size, 
			md000001_label,

			md000001_ctr_list,
			md000001_ctr_new,
			md000001_ctr_view,
			md000001_ctr_edit,
			

			md000001_ordem,
			md000001_xtype,
			md000001_tabela



		) values (
			'".$md."',
			'".$campos[$i]['nome']."',
			'".$campos[$i]['tipo']."',
			'".$campos[$i]['tam']."',
			'".$campos[$i]['label']."',

			'".$campos[$i]['ctr_list']."',
			'".$campos[$i]['ctr_new']."',
			'".$campos[$i]['ctr_view']."',
			'".$campos[$i]['ctr_edit']."',

			'".$campos[$i]['ordem']."',
			'".$campos[$i]['ctr_new']."',
			'".$campos[$i]['tabela']."'
		);";
		echo $sql;
		echo "<br>";
		$i++;

		/*
        $campo[$i]['name']    = $row['md000001_campo'];
        $campo[$i]['type']    = $row['md000001_tipo'];
        $campo[$i]['value']   = isset($values[$name]) ? $values[$name] : '';
        $campo[$i]['xtype']   = strtolower($row['md000001_ctr_new']);

		if($campo[$i]['type']=='string'){
		md000001_ctr_new

		*/
	}

	// echo '<br>';
	// echo '---';
	// print_r($campos);

}





