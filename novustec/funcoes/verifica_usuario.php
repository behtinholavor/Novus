<?php

session_start();

include "../admin/funcoes/config.php";

$usuario = $_POST['email'];
$senha = $_POST['senha'];

if ((!$usuario) || (!$senha)){
	echo "Por favor, todos campos devem ser preenchidos! <br /><br />";
	include "index.php";
} else {
	$senha = md5($senha);
	$sql = "SELECT * FROM usuarios WHERE email='{$usuario}' AND senha='{$senha}' AND ativado='1'";	
	
	$result = $mysqli->query($sql);		
	    
	$check_row = $result->num_rows;
	$data_row = $result->fetch_row();
	$result->close();

	if ($check_row == 1) {			
		// foreach ($data_row as $row => $value){
		// 	echo "[", $row, "] = ", $value, "<br/>";
		// }		
		$_SESSION['usuario_id'] = $data_row[0];
		$_SESSION['nome'] = $data_row[1];
		$_SESSION['sobrenome'] = $data_row[2];
		$_SESSION['email'] = $data_row[3];
		$_SESSION['nivel_usuario'] = $data_row[7];
		
		mysqli_query("UPDATE usuarios SET data_ultimo_login = now() WHERE usuario_id ='{$data_row[0]}'");
		
		header("Location: ../admin/index.php");
	} else {
		echo"<script type='text/javascript'>
		alert('Usuario ou Senha incorretos.');
		window.open=history.go(-1);
		</script>";

		include "../login.php";
	}
}
?>