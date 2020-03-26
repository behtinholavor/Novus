<?php
$html = '
<html>
<head></head>
<style>
h1 {color:#333; size:20px; margin-bottom:5px;}
h3 {color:#222;}
</style>
<body>

<h1>IgorEscobar.com</h1>
<h3>Desenvolvimento, Tecnologia e Informação, na ponta do lápis.</h3>
	
</body>
</html>
';

require_once("../dompdf/dompdf_config.inc.php");
20.	 
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper('letter', 'landscape');
$dompdf->render();
$dompdf->stream("exemplo-01.pdf");
?>