<?php
include 'config.php';
$produto_id = $_GET['produto_id'];

$sql = mysql_query(          

"DELETE FROM historico_produtos WHERE produtos_produto_id='$produto_id'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a remoção, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

$sql2 = mysql_query(          

"DELETE FROM produtos WHERE produto_id='$produto_id'")

or die( mysql_error()

); 

echo"<script type='text/javascript'>
alert('Produto removido com sucesso.');
window.open=history.go(-1);
</script>";


} 
 
 
?>