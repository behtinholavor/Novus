<?php
  
include "config.php";



$janven = "SELECT COALESCE(SUM(TRUNCATE(valor_total, 2)),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '01'";
$janvenresult = $conn->query($janven);
$janvenrow = $janvenresult->fetch_assoc();
$janven = $janvenrow["total"];


$fevven = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '02'";
$fevvenresult = $conn->query($fevven);
$fevvenrow = $fevvenresult->fetch_assoc();
$fevven = $fevvenrow["total"];


$marven = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '03'";
$marvenresult = $conn->query($marven);
$marvenrow = $marvenresult->fetch_assoc();
$marven = $marvenrow["total"];


$abrtroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '04'";
$abrtrocresult = $conn->query($abrtroc);
$abrtrocrow = $abrtrocresult->fetch_assoc();
$abrtroc = $abrtrocrow["total"];

$maitroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '05'";
$maitrocresult = $conn->query($maitroc);
$maitrocrow = $maitrocresult->fetch_assoc();
$maitroc = $maitrocrow["total"];

$juntroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '06'";
$juntrocresult = $conn->query($juntroc);
$juntrocrow = $juntrocresult->fetch_assoc();
$juntroc = $juntrocrow["total"];


$jultroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '07'";
$jultrocresult = $conn->query($jultroc);
$jultrocrow = $jultrocresult->fetch_assoc();
$jultroc = $jultrocrow["total"];

$agotroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '08'";
$agotrocresult = $conn->query($agotroc);
$agotrocrow = $agotrocresult->fetch_assoc();
$agotroc = $agotrocrow["total"];


$settroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '09'";
$settrocresult = $conn->query($settroc);
$settrocrow = $settrocresult->fetch_assoc();
$settroc = $settrocrow["total"];


$outtroc = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '10'";
$outtrocresult = $conn->query($outtroc);
$outtrocrow = $outtrocresult->fetch_assoc();
$outtroc = $outtrocrow["total"];

$novven = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '11'";
$novvenresult = $conn->query($novven);
$novvenrow = $novvenresult->fetch_assoc();
$novven = $novvenrow["total"];


$dezven = "SELECT COALESCE(SUM(valor_total),0) as total FROM ordem_venda WHERE DATE_FORMAT(data_cadastro, '%m') = '12'";
$dezvenresult = $conn->query($dezven);
$dezvenrow = $dezvenresult->fetch_assoc();
$dezven = $dezvenrow["total"];


$data2 = "data: [{
    m: '2016-01',
    b: ".$janven." }, {
    m: '2016-02',
    b: ".$fevven." }, {
    m: '2016-03',
    b: ".$marven." }, {
    m: '2016-04',
    b: ".$abrven."}, {
    m: '2016-05',
    b: ".$maiven." }, {
    m: '2016-06',
    b: ".$junven." }, {
    m: '2016-07',
    b: ".$julven."}, {
    m: '2016-08',
    b: ".$agoven." }, {
    m: '2016-09',
    b: ".$setven." }, {
    m: '2016-10',
    b: ".$outven." }, {
    m: '2016-11',
    b: ".$novven." }, {
    m: '2016-12',
    b: ".$dezven."
  }, ]";
 

?>

