<?php
include 'config.php';
$venda_id = $_GET['venda_id'];

$sql = mysql_query(          

"DELETE FROM venda_produtos WHERE ordem_venda_id='$venda_id'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a remoção, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

$sql2 = mysql_query(          

"DELETE FROM ordem_venda WHERE ordem_venda_id='$venda_id'")

or die( mysql_error()

);  
if (!$sql2){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a remoção, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert(' Ordem de venda removida com sucesso.');
window.open=history.go(-1);
</script>";
}
} 
 
 
?>