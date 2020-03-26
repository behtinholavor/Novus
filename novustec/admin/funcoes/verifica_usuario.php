<?php

session_start(); // Inicia a session

include "./funcoes/config.php";

$usuario = $_POST['email'];
$senha = $_POST['senha'];

if ((!$usuario) || (!$senha)){

echo "Por favor, todos campos devem ser preenchidos! <br /><br />";

include "../login.php";

}else{

$senha = md5($senha);

$sql = mysqli_query(

"SELECT * FROM usuarios
WHERE email='{$usuario}'
AND senha='{$senha}'
AND ativado='1'"

);

$login_check = mysqli_num_rows($sql);

if ($login_check > 0){

while ($row = mysql_fetch_array($sql)){

foreach ($row AS $key => $val){

$$key = stripslashes( $val );

}

$_SESSION['usuario_id'] = $usuario_id;
$_SESSION['nome'] = $nome;
$_SESSION['sobrenome'] = $sobrenome;
$_SESSION['email'] = $email;
$_SESSION['nivel_usuario'] = $nivel_usuario;

mysqli_query(

"UPDATE usuarios SET data_ultimo_login = now()
WHERE usuario_id ='{$usuario_id}'"

);

header("Location: admin/asdasdasd.php");

}

}else{

echo "Você não pode logar-se! Este usuário e/ou senha não são válidos!<br />
Por favor tente novamente!<br />";

include "./login.php";

}

}

?>