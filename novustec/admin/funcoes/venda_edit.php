<?php
include "config.php";   
if(isset($_POST['venda_editar']) && ($_POST['venda_editar'] == "venda_editar")) {
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$telefone = $_POST['telefone'];
$descricao = strtolower(trim($_POST['descricao']));
$ordem_id = $_POST['ordem_id'];



$sql = mysql_query(          

"UPDATE ordem_venda SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', descricao='$descricao' WHERE ordem_venda_id = '$ordem_id'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a alteração, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Ordem de venda alterada com sucesso..');
window.open=history.go(-1);
</script>";


}



}

?>

