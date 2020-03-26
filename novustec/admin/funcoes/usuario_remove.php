<?php
echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
include 'config.php';
$usuario_id = $_GET['usuario_id'];


$sql2 = mysql_query(          

"UPDATE usuarios SET ativado='0' WHERE usuario_id='$usuario_id'")

or die( mysql_error()

); 
if (!$sql2){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a remoção, contate o administrador.');
window.location='../usuario_gerenciar.php';
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert(' Usuario desativado com sucesso.');
window.location='../usuario_gerenciar.php';
</script>";

}
 
?>