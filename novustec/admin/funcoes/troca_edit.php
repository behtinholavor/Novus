<?php
include "config.php";   
if(isset($_POST['troca_editar']) && ($_POST['troca_editar'] == "troca_editar")) {
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$telefone = $_POST['telefone'];
$descricao = strtolower(trim($_POST['descricao']));
$troca_id = $_POST['troca_id'];



$sql = mysql_query(          

"UPDATE ordem_troca SET nome='$nome', sobrenome='$sobrenome', telefone='$telefone', descricao='$descricao' WHERE ordem_troca_id = '$troca_id'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a alteração, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Ordem de troca alterada com sucesso..');
window.open=history.go(-1);
</script>";


}



}

?>

