<?php

function session_checker(){

if (!isset($_SESSION['usuario_id'])){

header ("Location:./404.php");
exit();

}

}

?>