<?php
  //envio o charset para evitar problemas com acentos
  header("Content-Type: text/html; charset=UTF-8");


  $mysqli = new mysqli('localhost', 'root', 'exbsthuyv', 'sistema');

  $user = filter_input(INPUT_GET, 'email');
  $sql = "SELECT * FROM `usuarios` WHERE `email` = '{$user}'"; //monto a query


  $query = $mysqli->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado
    echo "<div id='resposta' style='color: red;'> <span class='glyphicon glyphicon-remove' aria-hidden='true' style='margin-top: px;'></span>Usuário já cadastrado.</div>";
  } else {
  

  }