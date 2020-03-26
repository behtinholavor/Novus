 <?php
include "config.php";
$hoje=date('d_m_Y');  
$data_inicial = $_POST['data_inicial'];   
$data_final = $_POST['data_final'];   
$comando="SELECT codigo_pagamento, nome, valor_total, sobrenome, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data from ordem_pagamentos WHERE data_cadastro BETWEEN STR_TO_DATE('$data_inicial', '%Y-%m-%d') AND STR_TO_DATE('$data_final', '%Y-%m-%d') AND tipo='pagamento'";
		$resultado=mysql_query($comando);
		$rows = mysql_num_rows($resultado);      
    $html="<body style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif;'>"; 
    $html="<style> tbody>tr:nth-child(odd){ background-color: rgb(240,240,240); }</style>"; 
    $html.="<h1 style='padding: 0px; margin: 0px; text-align: center; font-family: Helvetica Neue,Helvetica,Arial,sans-serif;'>Ordens de Pagamentos</h1>";  
    $html.="<h2 style='padding: 0px; margin: 0px; margin-bottom: 10px; text-align: center; font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 12px;'>De: $data_inicial a $data_final</h2>";  
		$html.="<table style='margin-top: 10px; border-collapse: collapse; margin: 0px auto;'>";
		$html.="<thead style='background-color: #2e6da4; color: #FFF;'>";
    $html.="<TR >";
    $html.="<th style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; padding: 10px 20px; border: 1px solid #DDD; font-weight: bold; font-size: 14px; text-align: center;'>PAGAMENTO</th>";
    $html.="<th style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; padding: 10px 20px; border: 1px solid #DDD; font-weight: bold; font-size: 14px; text-align: center;'>NOME</th>";
    $html.="<th style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; padding: 10px 20px; border: 1px solid #DDD; font-weight: bold; font-size: 14px; text-align: center;'>SOBRENOME</th>";
    $html.="<th style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; padding: 10px 20px; border: 1px solid #DDD; font-weight: bold; font-size: 14px; text-align: center;'>DATA</th>";
    $html.="<th style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; padding: 10px 20px; border: 1px solid #DDD; font-weight: bold; font-size: 14px; text-align: center;'>TOTAL</th>";
    $html.="</TR>";
    $html.="</thead>";
    $html.="<tbody >";
		while ($dados=mysql_fetch_array($resultado)){
    $sub=$dados[valor_total];
		$html.="<tr>";
    $html.="<td style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: center; font-size: 12px;'>$dados[codigo_pagamento]</td>";
    $html.="<td style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: center; font-size: 12px;'>$dados[nome]</td>";
    $html.="<td style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: center; font-size: 12px;'>$dados[sobrenome]</td>";
    $html.="<td style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: center; font-size: 12px;' >$dados[data]</td>";
    $html.="<td style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: center; font-size: 12px;'>R$ $dados[valor_total]</td>";
    $html.="</tr>";    
    $total+=$sub;
		}
		$html.="<tr>";
    $html.="<td colspan='4' style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: right; font-size: 12px; font-weight: bold;'>TOTAL:</td>";    
    $html.="<td style='font-family: Helvetica Neue,Helvetica,Arial,sans-serif; border: 1px solid #DDD; padding: 10px 10px; text-align: center; font-size: 12px; font-weight: bold;'>R$ $total</td>";
    $html.="</tr>";
    $html.="</tbody>";
		$html.="</table>"; 
    $html.="<h2 style='padding: 0px; margin: 0px; margin-bottom: 10px; margin-right: 100px; text-align: right; font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 10px;'>Total de Resultados: $rows</h2>";       
require_once("../dompdf/dompdf_config.inc.php");
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream("rel_pagamento_$hoje.pdf");
?>