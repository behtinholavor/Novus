<?php
include "config.php";   
if (isset($_POST['usuario_cadastro'])){
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$usuario = trim($_POST['usuario']);
$email = strtolower(trim($_POST['email']));
$senha = md5($_POST["senha"]);
$telefone = trim($_POST['telefone']);   
$nivel = trim($_POST['nivel']);      
$descricao = trim($_POST['descricao']);  
/* Vamos checar algum erro nos campos */

 

 $checkquery = mysql_query("SELECT * FROM usuarios 
  WHERE email ='$email'") or die(mysql_error());  
  if (mysql_num_rows($checkquery)) {
     echo"<script type='text/javascript'>
alert(' E-mail já cadastrado.');
window.open=history.go(-1);
</script>";
  }else {
    $sql = mysql_query(          

"INSERT INTO usuarios
(usuario_id, nome, sobrenome, email, senha, telefone, descricao, ativado, nivel_usuario, data_cadastro)

VALUES
('', '$nome', '$sobrenome', '$email', '$senha', '$telefone', '$descricao', '1', '$nivel', now())")

or die( mysql_error()

);

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar o cadastro, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Usuário cadastrado com sucesso.');
window.open=history.go(-1);
</script>";


}
 }

 
}

?>

