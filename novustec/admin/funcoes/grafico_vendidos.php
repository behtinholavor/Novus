<?php
  
include "config.php";


###############################################################
$janven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '01' AND nivel_usuario = '1'";
$janvenresult = $conn->query($janven);
$janvenrow = $janvenresult->fetch_assoc();
$janven = $janvenrow["total"];

$jantotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '01' AND nivel_usuario = '2'";
$jantotalresult = $conn->query($jantotal);
$jantotalrow = $jantotalresult->fetch_assoc();
$jantotal = $jantotalrow["total"];

#####################################################################################################################################
$fevven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '02' AND nivel_usuario = '1'";
$fevvenresult = $conn->query($fevven);
$fevvenrow = $fevvenresult->fetch_assoc();
$fevven = $fevvenrow["total"];

$fevtotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '02' AND nivel_usuario = '2'";
$fevtotalresult = $conn->query($fevtotal);
$fevtotalrow = $fevtotalresult->fetch_assoc();
$fevtotal = $fevtotalrow["total"];

########################################################################
$marven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '03' AND nivel_usuario = '1'";
$marvenresult = $conn->query($marven);
$marvenrow = $marvenresult->fetch_assoc();
$marven = $marvenrow["total"];

$martotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '03' AND nivel_usuario = '2'";
$martotalresult = $conn->query($martotal);
$martotalrow = $martotalresult->fetch_assoc();
$martotal = $martotalrow["total"];

###################################################################
$abrven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '04' AND nivel_usuario = '1'";
$abrvenresult = $conn->query($abrven);
$abrvenrow = $abrvenresult->fetch_assoc();
$abrven = $abrvenrow["total"];

$abrtotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '04' AND nivel_usuario = '2'";
$abrtotalresult = $conn->query($abrtotal);
$abrtotalrow = $abrtotalresult->fetch_assoc();
$abrtotal = $abrtotalrow["total"];
######################################################################
$maiven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '05' AND nivel_usuario = '1'";
$maivenresult = $conn->query($maiven);
$maivenrow = $maivenresult->fetch_assoc();
$maiven = $maivenrow["total"];

$maitotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '05' AND nivel_usuario = '2'";
$maitotalresult = $conn->query($maitotal);
$maitotalrow = $maitotalresult->fetch_assoc();
$maitotal = $maitotalrow["total"];

############################################################################################

$junven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '06' AND nivel_usuario = '1'";
$junvenresult = $conn->query($junven);
$junvenrow = $junvenresult->fetch_assoc();
$junven = $junvenrow["total"];

$juntotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '06' AND nivel_usuario = '2'";
$juntotalresult = $conn->query($juntotal);
$juntotalrow = $juntotalresult->fetch_assoc();
$juntotal = $juntotalrow["total"];
##############################################################################################

$julven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '07' AND nivel_usuario = '1'";
$julvenresult = $conn->query($julven);
$julvenrow = $julvenresult->fetch_assoc();
$julven = $julvenrow["total"];

$jultotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '07' AND nivel_usuario = '2'";
$jultotalresult = $conn->query($jultotal);
$jultotalrow = $jultotalresult->fetch_assoc();
$jultotal = $jultotalrow["total"];
##########################################################################################################

$agoven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '08' AND nivel_usuario = '1'";
$agovenresult = $conn->query($agoven);
$agovenrow = $agovenresult->fetch_assoc();
$agoven = $agovenrow["total"];

$agototal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '08' AND nivel_usuario = '2'";
$agototalresult = $conn->query($agototal);
$agototalrow = $agototalresult->fetch_assoc();
$agototal = $agototalrow["total"];
###########################################################################################

$setven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '09' AND nivel_usuario = '1'";
$setvenresult = $conn->query($setven);
$setvenrow = $setvenresult->fetch_assoc();
$setven = $setvenrow["total"];

$settotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '09' AND nivel_usuario = '2'";
$settotalresult = $conn->query($settotal);
$settotalrow = $settotalresult->fetch_assoc();
$settotal = $settotalrow["total"];
#################################################################################################################

$outven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '10' AND nivel_usuario = '1'";
$outvenresult = $conn->query($outven);
$outvenrow = $outvenresult->fetch_assoc();
$outven = $outvenrow["total"];

$outtotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '10' AND nivel_usuario = '2'";
$outtotalresult = $conn->query($outtotal);
$outtotalrow = $outtotalresult->fetch_assoc();
$outtotal = $outtotalrow["total"];
##############################################################################

$novven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '11' AND nivel_usuario = '1'";
$novvenresult = $conn->query($novven);
$novvenrow = $novvenresult->fetch_assoc();
$novven = $novvenrow["total"];

$novtotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '11' AND nivel_usuario = '2'";
$novtotalresult = $conn->query($novtotal);
$novtotalrow = $novtotalresult->fetch_assoc();
$novtotal = $novtotalrow["total"];
#################################################################################################

$dezven = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '12' AND nivel_usuario = '1'";
$dezvenresult = $conn->query($dezven);
$dezvenrow = $dezvenresult->fetch_assoc();
$dezven = $dezvenrow["total"];

$deztotal = "SELECT COUNT(*) as total FROM usuarios WHERE DATE_FORMAT(data_cadastro, '%m') = '12' AND nivel_usuario = '2'";
$deztotalresult = $conn->query($deztotal);
$deztotalrow = $deztotalresult->fetch_assoc();
$deztotal = $deztotalrow["total"];
##########################################################################

$data = "data: [{
    m: 'Jan',
    b: ".$janven.",
    c: ".$jantotal." }, {
    m: 'Fev',
    b: ".$fevven.",
    c: ".$fevtotal." }, {
    m: 'Mar',
    b: ".$marven.",
    c: ".$martotal." }, {
    m: 'Abr',
    b: ".$abrven.",
    c: ".$abrtotal."}, {
    m: 'Mai',
    b: ".$maiven.",
    c: ".$maitotal." }, {
    m: 'Jun',
    b: ".$junven.",
    c: ".$juntotal." }, {
    m: 'Jul',
    b: ".$julven.",
    c: ".$jultotal." }, {
    m: 'Ago',
    b: ".$agoven.",
    c: ".$agototal." }, {
    m: 'Set',
    b: ".$setven.",
    c: ".$settotal." }, {
    m: 'Out',
    b: ".$outven.",
    c: ".$outtotal." }, {
    m: 'Nov',
    b: ".$novven.",
    c: ".$novtotal."}, {
    m: 'Dez',
    b: ".$dezven.",
    c: ".$deztotal."
  }, ]";
 

?>

