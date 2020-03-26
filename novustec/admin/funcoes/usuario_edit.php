<?php
include "config.php";   
if(isset($_POST['usuario_editar']) && ($_POST['usuario_editar'] == "usuario_editar")) {
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$email = strtolower(trim($_POST['email']));
$senha = md5($_POST["senha"]);
$telefone = trim($_POST['telefone']); 
$nivel = trim($_POST['nivel']); 
$usuarios_usuario_id = trim($_POST['usuarios_usuario_id']); 
$descricao = strtolower(trim($_POST['descricao']));


/* Vamos checar algum erro nos campos */


$sql = mysql_query(          

"UPDATE usuarios SET nome='$nome', sobrenome='$sobrenome', email='$email', senha='$senha', telefone='$telefone', nivel_usuario='$nivel', descricao='$descricao' WHERE usuario_id = '$usuarios_usuario_id'")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar a alteração, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Usuário editado com sucesso..');
window.open=history.go(-1);
</script>";


}



}

?>

