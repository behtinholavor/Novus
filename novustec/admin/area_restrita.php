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
include "./funcoes/functions.php"; // arquivo de fun��es.
session_checker(); // chama a fun��o que verifica se a session iniciada da acesso � p�gina.

echo "Bem vindo <strong>". $_SESSION['nome'] ." ". $_SESSION['sobrenome'] ."</strong>!<br />
Voc� est� acessando �rea restrita para usu�rios cadastrados!
<br /><br />";

echo "Seu n�vel de usu�rio � <strong>". $_SESSION['nivel_usuario']."</strong>.
<br />Com esse n�vel, voc� tem permis�o de acesso �s
seguintes �reas: <br /><br />";

if ($_SESSION['nivel_usuario'] == 1){

echo "- <strong>Forum</strong><br />Abrir t�picos, postar em t�picos
de terceiros.<br /><br />";

}

if ($_SESSION['nivel_usuario'] == 2){

echo "- <strong>Forum</strong><br />Administra��o -
Acesso total <br /><br />";

}

/* N�o colocarei representa��es para outros n�veis de acesso, mas fica entendido que o
limite de n�veis de acesso quem define � voc�*/

echo "<a href=\"logout.php\">Sair</a>";

?>