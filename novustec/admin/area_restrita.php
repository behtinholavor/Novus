<!--
***NAO REPLICAR SEM AUTORIZACAO***
SISTEMA: VENDAS CONSIGNADAS.
VERSAO: 2.0
DESENVOLVIDO POR: NOVUS TECNOLOGIA.
E-MAIL: contato@novustec.com.br
SITE: WWW.NOVUSTEC.COM.BR
BY: FERNANDO SCHROEDER
***NAO REPLICAR SEM AUTORIZACAO***
-->
<?php

session_start(); // Inicia a session
include "./funcoes/functions.php"; // arquivo de funções.
session_checker(); // chama a função que verifica se a session iniciada da acesso à página.

echo "Bem vindo <strong>". $_SESSION['nome'] ." ". $_SESSION['sobrenome'] ."</strong>!<br />
Você está acessando área restrita para usuários cadastrados!
<br /><br />";

echo "Seu nível de usuário é <strong>". $_SESSION['nivel_usuario']."</strong>.
<br />Com esse nível, você tem permisão de acesso às
seguintes áreas: <br /><br />";

if ($_SESSION['nivel_usuario'] == 1){

echo "- <strong>Forum</strong><br />Abrir tópicos, postar em tópicos
de terceiros.<br /><br />";

}

if ($_SESSION['nivel_usuario'] == 2){

echo "- <strong>Forum</strong><br />Administração -
Acesso total <br /><br />";

}

/* Não colocarei representações para outros níveis de acesso, mas fica entendido que o
limite de níveis de acesso quem define é você*/

echo "<a href=\"logout.php\">Sair</a>";

?>