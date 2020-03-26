<?php
include "config.php";   
if(isset($_POST['produto_editar']) && ($_POST['produto_editar'] == "produto_editar")) {
$nome = strtolower(trim($_POST['nome']));
$tamanho = trim($_POST['tamanho']);
$sexo = strtolower(trim($_POST['sexo']));
$status = strtolower(trim($_POST['status']));
$total = trim($_POST['total']); 
$cliente = trim($_POST['cliente']);
$loja = trim($_POST['loja']);
$codigo = $_POST['codigo'];
$produto_id = $_POST['produto_id'];
$usuarios_usuario_id  = $_POST['usuarios_usuario_id'];
$produto_id  = $_POST['produto_id'];
$descricao = strtolower(trim($_POST['descricao']));
/* Vamos checar algum erro nos campos */
$total2 = $total;
$converte_tota = str_replace(",",".", $total2);
$cliente2 = $cliente;
$converte_cliente = str_replace(",",".", $cliente2);
$loja2 = $loja;
$converte_loja = str_replace(",",".", $loja2);
IF($status == devolver){
$converte_tota = "-";
$converte_cliente = "-";
$converte_loja = "-";
}

$sql = mysql_query(          

"UPDATE produtos SET codigo='$codigo', nome='$nome', tamanho='$tamanho', sexo='$sexo', status='$status', descricao='$descricao', valor_total='$converte_tota', valor_cliente='$converte_cliente', valor_loja='$converte_loja', valor_original_total = '$converte_tota', valor_original_cliente = '$converte_cliente', valor_original_loja = '$converte_loja' WHERE produto_id = '".$produto_id."'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a alteração, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Produto editado com sucesso..');
window.open=history.go(-1);
</script>";


}



}

?>

