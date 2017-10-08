<?php 
function md000003_action_links( $links ) {
$site_url = site_url();
$links[] = '<a target="_blank" href="'.$site_url.'/md000003/?create_fields=1&md=0">generate-fields</a>';
// $links[] = '<a target="_blank" href="'.$site_url.'/i0003/listagem/">Listagem</a>';
// $links[] = '<a target="_blank" href="'.$site_url.'/i0003/novo/">novo</a>';
return $links;
}
// add_filter( 'plugin_action_links_wpmsc/wpmsc.php', 'i0003_action_links' );
// add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'i0003_action_links' );
add_filter( 'plugin_action_links_'.WPSCM_FILE, 'md000003_action_links' );
//die(plugin_basename(__FILE__));
//wpscm/module/001/md000003.php
// die(WPSCM_FILE);
// /var/www/html/sistema/wp-content/plugins/wpscm/
add_filter( 'query_vars', 'md000003_add_filter_query_vars' );
function md000003_add_filter_query_vars( $query_vars ) {
$query_vars[] = 'create_fields';
return $query_vars;
}

add_action( 'parse_request', 'md000003_parse_request');
function md000003_parse_request( &$wp ) {
if ( array_key_exists( 'create_fields', $wp->query_vars ) ) {
md000003_create_fields();
exit;
}
}




function md000003_create_fields() {
if ( !is_user_logged_in() ) return "";

$md = isset($_GET['md']) ? $_GET['md'] : 0;

if(!$md) {echo 'md'; exit;}

$tabela   = 'md'.$md;

global $wpdb;

$sql = "SHOW COLUMNS FROM ".$wpdb->prefix.$tabela;
// echo $sql;
// exit;
$tb = scmDbExe($sql,'rows');




// echo '<pre>';
// print_r($tb);

// echo '</pre>';
// exit;


$tabela_len = strlen($tabela);
$sql_name = "";
$sql_value = "";
echo '<pre>';
//print_r($tb['rows']);
//die();
echo "\n";
echo "\n";
echo "delete from \".\$wpdb->prefix.\"md000001 where md000001_modulo = ".$md.";\n";
$campos = array();


for ($i=0; $i < $tb['r']; $i++) {


// $tb['rows'][$i]['label'] = $tb['rows'][$i]['Field'];

// $label  = $tb['rows'][$i]['Field'];
// $len  = strlen($label );
// $type = $tb['rows'][$i]['Type'];
// $label1 = substr($label, 0, ($tabela_len));
// if($tabela == $label1){
//   $label2 = substr($label, ($tabela_len+1));
// }else{
//   $label2 = $label;
// }
// $label2 = preg_replace('/_/', ' ', $label2);
// $label2 = strtoupper($label2);
// $tb['rows'][$i]['label'] = $label2;
// $tb['rows'][$i]['width'] =40;
// $campos[$i]['md000001_tipo']   = 'string';
// $tb['rows'][$i]['size'] = 10;
// if(substr($tb['rows'][$i]['Type'], 0, 7) == 'varchar'){
//   $tb['rows'][$i]['size'] = substr($tb['rows'][$i]['Type'],  8 );
//   $tb['rows'][$i]['size'] = substr($tb['rows'][$i]['size'], 0, -1 );
//   $tb['rows'][$i]['type'] = 'string';
//   $campos[$i]['md000001_ctr_new']  = 'textfield';
//   $campos[$i]['md000001_ctr_edit'] = 'textfield';
//   $campos[$i]['md000001_ctr_loc']  = 'textfield';
//   $campos[$i]['md000001_ctr_lst']  = 'textfield';
//   $campos[$i]['md000001_tipo']   = 'string';
//   // $tb['rows'][$i]['Field'] =  "'" .$tb['rows'][$i]['Field']."'";
// }
// if(substr($tb['rows'][$i]['Type'], 0, 5) == 'float'){
//   $tb['rows'][$i]['size'] = 10;
//   $tb['rows'][$i]['type'] = 'float';
//   $campos[$i]['md000001_ctr_new']  = 'numberfield';
//   $campos[$i]['md000001_ctr_edit'] = 'numberfield';
//   $campos[$i]['md000001_ctr_loc']  = 'numberfield';
//   $campos[$i]['md000001_ctr_lst']  = 'numberfield';
//   $campos[$i]['md000001_tipo']   = 'float';
//   $campos[$i]['md000001_formato']  = 'moeda';
// }
// if(substr($tb['rows'][$i]['Type'], 0, 4) == 'date'){
//   $tb['rows'][$i]['size'] = 10;
//   $tb['rows'][$i]['type'] = 'date';
//   $campos[$i]['md000001_ctr_new']  = 'datefield';
//   $campos[$i]['md000001_ctr_edit'] = 'datefield';
//   $campos[$i]['md000001_ctr_loc']  = 'datefield';
//   $campos[$i]['md000001_ctr_lst']  = 'datefield';
//   $campos[$i]['md000001_tipo']   = 'date';
//   // $tb['rows'][$i]['Field'] =  "'" .$tb['rows'][$i]['Field']."'";
// }
// if(substr($tb['rows'][$i]['Type'], 0, 3) == 'int'){
//   $tb['rows'][$i]['size'] = 10;
//   $tb['rows'][$i]['type'] = 'int';

//   $campos[$i]['md000001_ctr_new']  = 'numberfield';
//   $campos[$i]['md000001_ctr_edit'] = 'numberfield';
//   $campos[$i]['md000001_ctr_loc']  = 'numberfield';
//   $campos[$i]['md000001_ctr_lst']  = 'numberfield';
//   $campos[$i]['md000001_tipo']   = 'int';
// }
// if(substr($tb['rows'][$i]['Type'], 0, 4) == 'text'){
//   $tb['rows'][$i]['size'] = 1000;
//   $tb['rows'][$i]['type'] = 'blob';
//   $campos[$i]['md000001_ctr_new']  = 'textfield';
//   $campos[$i]['md000001_ctr_edit'] = 'textfield';
//   $campos[$i]['md000001_ctr_loc']  = 'textfield';
//   $campos[$i]['md000001_ctr_lst']  = 'textfield';
//   $campos[$i]['md000001_tipo']   = 'blob';
//   // $tb['rows'][$i]['Field'] =  "'" .$tb['rows'][$i]['Field']."'";
// }
// $campos[$i]['md000001_ctr_view'] = 'label';
// $campos[$i]['md000001_ctr_list'] = 'label';
// $tb['rows'][$i]['label'] = $label2;
// $campos[$i]['md000001_modulo'] = $md;
// $campos[$i]['md000001_ordem']  = $i;
// $campos[$i]['md000001_xtype']  = 'textfield';
// // $campos[$i]['md000001_type']  = $tb['rows'][$i]['type'];
// $campos[$i]['Type']       = $type;
// $campos[$i]['md000001_campo']  = strtolower($tb['rows'][$i]['Field']);
// // $campos[$i]['md000001_tipo']  = strtolower($tb['rows'][$i]['Field']);
// $campos[$i]['md000001_label']  = strtolower($tb['rows'][$i]['label']);
// $campos[$i]['md000001_ativo']  = 's';
// $campos[$i]['md000001_size']   = $tb['rows'][$i]['size'];
// $campos[$i]['md000001_black']  = 1;
// $campos[$i]['md000001_tabela']   = $tabela;

// if($campos[$i]['md000001_campo'] == $tabela.'_data'){
//   $campos[$i]['md000001_ctr_new']  = 'textfield_';
//   $campos[$i]['md000001_ctr_edit'] = 'textfield_';
// }

// if($campos[$i]['md000001_campo'] == $tabela.'_hora'){
//   $campos[$i]['md000001_ctr_new']  = 'textfield_';
//   $campos[$i]['md000001_ctr_edit'] = 'textfield_';
// }





/*
md000001_ordem,
md000001_ctr_vitrine,
md000001_dm,md000001_tipo,
md000001_height,
md000001_largura,
md000001_altura,
md000001_align,
md000001_hidden,
md000001_black
*/

// echo '<pre>';
// print_r($campos[$i]);
// die();







// $sql_field = '';
// $sql_value = '';
// $tab = "\t";
// $tab = "";
// $nn = "\n";
// $nn = "";
// $ii = 0;
// foreach($campos[$i] as $field => $value) {
//   if(substr($field, 0,5)=='md000001'){
//     $aspas = "'";
//     // $aspas = "";
//     if($field=='md000001_size') $aspas = "";
//     if($field=='md000001_modulo') $aspas = "";
//     if($field=='md000001_ordem') $aspas = "";
//     if($field=='agenda_data') $aspas = "";
//     if($field=='md000001_black') $aspas = "";
//     if($ii){
//       $sql_field .= ', '.$nn;
//       $sql_value .= ', '.$nn;
//     }
//     $sql_field .= $tab.$field;
//     $sql_value .= $tab.$aspas.$value.$aspas;
//     $ii++;
//   }
// }



// $nn = "¥n";




// $sql  = "insert into \".\$wpdb->prefix.\"md000001 (".$nn;
// $sql .= $sql_field.$nn;
// $sql .= ") values (".$nn;
// $sql .= $sql_value.$nn;
// $sql .= ");".$nn;
// print($sql)."\n";





///wp-admin/admin.php?page=wp-dbmanager/database-run.php
// print('<br>');
// print($sql_field);
// print('<br>');
// print($sql_value);
// print('<br>');

}
echo "\n";
}
// add_shortcode("msccreate_fields", "msccreate_fields");
