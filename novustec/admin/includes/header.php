<head>
     <?php
      header ('Content-type: text/html; charset=ISO-8859-1');
      include "./funcoes/config.php";

session_start(); // Inicia a session
include "./funcoes/functions.php"; // arquivo de fun��es.
session_checker(); // chama a fun��o que verifica se a session iniciada da acesso � p�gina.


if ($_SESSION['nivel_usuario'] == 2){


}ELSE{
header ("Location:./404.php");
}

     ?>
     
     <meta http-equiv="Content-Language" content="pt-br">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema - Novus Tecnologia</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
      <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="../dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
    
    <link href="./style.css" rel="stylesheet">
    
    <script src="./js/jquery.maskedinput.js"></script>

    <!-- Custom Fonts -->
    <link href="../bower_components/Font-Awesome-master/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->   

    <link href="./css/stylo.css" rel="stylesheet">



</head>