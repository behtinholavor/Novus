<?php
include "config.php";   
if(isset($_POST['pagamento_editar']) && ($_POST['pagamento_editar'] == "pagamento_editar")) {
$descricao = strtolower(trim($_POST['descricao']));
$pagamento_id = $_POST['pagamento_id'];



$sql = mysql_query(          

"UPDATE ordem_pagamentos SET descricao='$descricao' WHERE pagamento_id = '$pagamento_id'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a alteração, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Ordem de pagamento alterada com sucesso..');
window.open=history.go(-1);
</script>";


}



}

?>

