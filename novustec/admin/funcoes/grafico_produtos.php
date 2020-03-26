<?php
  
include "config.php";



$janven = "SELECT COUNT(*) as total FROM produtos WHERE status = 'estoque'";
$janvenresult = $conn->query($janven);
$janvenrow = $janvenresult->fetch_assoc();
$janven = $janvenrow["total"];

$fevven = "SELECT COUNT(*) as total FROM produtos WHERE status = 'vendido'";
$fevvenresult = $conn->query($fevven);
$fevvenrow = $fevvenresult->fetch_assoc();
$fevven = $fevvenrow["total"];


$data3 = "[{
            label: 'Produtos em Estoque',
            value: ".$janven."
        }, {
            label: 'Produtos Vendidos',
            value: ".$fevven."
        }],";
 

?>

