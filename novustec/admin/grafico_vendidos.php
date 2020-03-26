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
  
$servername = "localhost";
$username = "root";
$password = "exbsthuyv";
$dbname = "sistema_teste";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$janven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '01' AND info = 'vendido'";
$janvenresult = $conn->query($janven);
$janvenrow = $janvenresult->fetch_assoc();
$janven = $janvenrow["total"];

$jantotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '01' AND info = 'estoque'";
$jantotalresult = $conn->query($jantotal);
$jantotalrow = $jantotalresult->fetch_assoc();
$jantotal = $jantotalrow["total"];

$jantroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '01' AND info = 'trocado'";
$jantrocresult = $conn->query($jantroc);
$jantrocrow = $jantrocresult->fetch_assoc();
$jantroc = $jantrocrow["total"];


$fevven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '02' AND info = 'vendido'";
$fevvenresult = $conn->query($fevven);
$fevvenrow = $fevvenresult->fetch_assoc();
$fevven = $fevvenrow["total"];

$fevtotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '02' AND info = 'estoque'";
$fevtotalresult = $conn->query($fevtotal);
$fevtotalrow = $fevtotalresult->fetch_assoc();
$fevtotal = $fevtotalrow["total"];

$fevtroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '02' AND info = 'trocado'";
$fevtrocresult = $conn->query($fevtroc);
$fevtrocrow = $fevtrocresult->fetch_assoc();
$fevtroc = $fevtrocrow["total"];

$marven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '03' AND info = 'vendido'";
$marvenresult = $conn->query($marven);
$marvenrow = $marvenresult->fetch_assoc();
$marven = $marvenrow["total"];

$martotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '03' AND info = 'estoque'";
$martotalresult = $conn->query($martotal);
$martotalrow = $martotalresult->fetch_assoc();
$martotal = $martotalrow["total"];

$martroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '03' AND info = 'trocado'";
$martrocresult = $conn->query($martroc);
$martrocrow = $martrocresult->fetch_assoc();
$martroc = $martrocrow["total"];

$abrven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '04' AND info = 'vendido'";
$abrvenresult = $conn->query($abrven);
$abrvenrow = $abrvenresult->fetch_assoc();
$abrven = $abrvenrow["total"];

$abrtotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '04' AND info = 'estoque'";
$abrtotalresult = $conn->query($abrtotal);
$abrtotalrow = $abrtotalresult->fetch_assoc();
$abrtotal = $abrtotalrow["total"];

$abrtroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '04' AND info = 'trocado'";
$abrtrocresult = $conn->query($abrtroc);
$abrtrocrow = $abrtrocresult->fetch_assoc();
$abrtroc = $abrtrocrow["total"];

$maiven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '05' AND info = 'vendido'";
$maivenresult = $conn->query($maiven);
$maivenrow = $maivenresult->fetch_assoc();
$maiven = $maivenrow["total"];

$maitotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '05' AND info = 'estoque'";
$maitotalresult = $conn->query($maitotal);
$maitotalrow = $maitotalresult->fetch_assoc();
$maitotal = $maitotalrow["total"];

$maitroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '05' AND info = 'trocado'";
$maitrocresult = $conn->query($maitroc);
$maitrocrow = $maitrocresult->fetch_assoc();
$maitroc = $maitrocrow["total"];

$junven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '06' AND info = 'vendido'";
$junvenresult = $conn->query($junven);
$junvenrow = $junvenresult->fetch_assoc();
$junven = $junvenrow["total"];

$juntotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '06' AND info = 'estoque'";
$juntotalresult = $conn->query($juntotal);
$juntotalrow = $juntotalresult->fetch_assoc();
$juntotal = $juntotalrow["total"];

$juntroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '06' AND info = 'trocado'";
$juntrocresult = $conn->query($juntroc);
$juntrocrow = $juntrocresult->fetch_assoc();
$juntroc = $juntrocrow["total"];

$julven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '07' AND info = 'vendido'";
$julvenresult = $conn->query($julven);
$julvenrow = $julvenresult->fetch_assoc();
$julven = $julvenrow["total"];

$jultotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '07' AND info = 'estoque'";
$jultotalresult = $conn->query($jultotal);
$jultotalrow = $jultotalresult->fetch_assoc();
$jultotal = $jultotalrow["total"];

$jultroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '07' AND info = 'trocado'";
$jultrocresult = $conn->query($jultroc);
$jultrocrow = $jultrocresult->fetch_assoc();
$jultroc = $jultrocrow["total"];

$agoven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '08' AND info = 'vendido'";
$agovenresult = $conn->query($agoven);
$agovenrow = $agovenresult->fetch_assoc();
$agoven = $agovenrow["total"];

$agototal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '08' AND info = 'estoque'";
$agototalresult = $conn->query($agototal);
$agototalrow = $agototalresult->fetch_assoc();
$agototal = $agototalrow["total"];

$agotroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '08' AND info = 'trocado'";
$agotrocresult = $conn->query($agotroc);
$agotrocrow = $agotrocresult->fetch_assoc();
$agotroc = $agotrocrow["total"];

$setven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '09' AND info = 'vendido'";
$setvenresult = $conn->query($setven);
$setvenrow = $setvenresult->fetch_assoc();
$setven = $setvenrow["total"];

$settotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '09' AND info = 'estoque'";
$settotalresult = $conn->query($settotal);
$settotalrow = $settotalresult->fetch_assoc();
$settotal = $settotalrow["total"];

$settroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '09' AND info = 'trocado'";
$settrocresult = $conn->query($settroc);
$settrocrow = $settrocresult->fetch_assoc();
$settroc = $settrocrow["total"];

$outven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '10' AND info = 'vendido'";
$outvenresult = $conn->query($outven);
$outvenrow = $outvenresult->fetch_assoc();
$outven = $outvenrow["total"];

$outtotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '10' AND info = 'estoque'";
$outtotalresult = $conn->query($outtotal);
$outtotalrow = $outtotalresult->fetch_assoc();
$outtotal = $outtotalrow["total"];

$outtroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '10' AND info = 'trocado'";
$outtrocresult = $conn->query($outtroc);
$outtrocrow = $outtrocresult->fetch_assoc();
$outtroc = $outtrocrow["total"];

$novven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '11' AND info = 'vendido'";
$novvenresult = $conn->query($novven);
$novvenrow = $novvenresult->fetch_assoc();
$novven = $novvenrow["total"];

$novtotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '11' AND info = 'estoque'";
$novtotalresult = $conn->query($novtotal);
$novtotalrow = $novtotalresult->fetch_assoc();
$novtotal = $novtotalrow["total"];

$novtroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '10' AND info = 'trocado'";
$novtrocresult = $conn->query($novtroc);
$novtrocrow = $novtrocresult->fetch_assoc();
$novtroc = $novtrocrow["total"];

$dezven = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '12' AND info = 'vendido'";
$dezvenresult = $conn->query($dezven);
$dezvenrow = $dezvenresult->fetch_assoc();
$dezven = $dezvenrow["total"];

$deztotal = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '12' AND info = 'estoque'";
$deztotalresult = $conn->query($deztotal);
$deztotalrow = $deztotalresult->fetch_assoc();
$deztotal = $deztotalrow["total"];

$deztroc = "SELECT COUNT(*) as total FROM historico_produtos WHERE DATE_FORMAT(data_cadastro, '%m') = '11' AND info = 'trocado'";
$deztrocresult = $conn->query($deztroc);
$deztrocrow = $deztrocresult->fetch_assoc();
$deztroc = $deztrocrow["total"];

$data = "data: [{
    m: 'Jan',
    b: ".$janven.",
    c: ".$jantotal.",
    d: ".$jantroc." }, {
    m: 'Fev',
    b: ".$fevven.",
    c: ".$fevtotal.",
    d: ".$fevtroc." }, {
    m: 'Mar',
    b: ".$marven.",
    c: ".$martotal.",
    d: ".$martroc." }, {
    m: 'Abr',
    b: ".$abrven.",
    c: ".$abrtotal.",
    d: ".$abrtroc."}, {
    m: 'Mai',
    b: ".$maiven.",
    c: ".$maitotal.",
    d: ".$maitroc." }, {
    m: 'Jun',
    b: ".$junven.",
    c: ".$juntotal.",
    d: ".$juntroc." }, {
    m: 'Jul',
    b: ".$julven.",
    c: ".$jultotal.",
    d: ".$jultroc." }, {
    m: 'Ago',
    b: ".$agoven.",
    c: ".$agototal.",
    d: ".$agotroc." }, {
    m: 'Set',
    b: ".$setven.",
    c: ".$settotal.",
    d: ".$settroc." }, {
    m: 'Out',
    b: ".$outven.",
    c: ".$outtotal.",
    d: ".$outtroc." }, {
    m: 'Nov',
    b: ".$novven.",
    c: ".$novtotal.",
    d: ".$novtroc." }, {
    m: 'Dez',
    b: ".$dezven.",
    c: ".$deztotal.",
    d: ".$deztroc."
  }, ]";
 

?>

