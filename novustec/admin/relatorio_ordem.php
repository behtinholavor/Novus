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
<!DOCTYPE html>
<html lang="en">
   <?php
      include './includes/header.php';
      include './funcoes/config.php';
      function uniqueAlfa($length=16)
      {
      $salt = "0123456789";
      $len = strlen($salt);
      $pass = 'D';
      mt_srand(10000000*(double)microtime());
      for ($i = 0; $i < $length; $i++)
      {
        $pass .= $salt[mt_rand(0,$len - 1)];
      }
      return $pass;
      }
      
      $usuario_id = $_GET["usuarios_usuario_id"];
      $nome = $_GET["nome"];
      $sobrenome = $_GET["sobrenome"];     
      $fornecedor = $nome." ".$sobrenome; 
                           
      ?>   
   <body>
      <div id="wrapper">
         <!-- Navigation -->
         <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php
               include './includes/menu_top.php';
               include './includes/menu.php';
               ?>
         </nav>
         <!-- Page Content -->
         <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">
                        Gerar Relatório
                     </h1>
                  </div>
                  <div style="margin-bottom: 15px;" class="col-lg-12">  
                  </div>
                  <form id="venda" name="venda" method="post" action="" role="form" autocomplete="false">
                  <div class="col-lg-4">
                        <div class="form-group">
                           <label>Ordem*</label>
                           <select class="form-control" name="ordem" required="">
                              <option value="">Selecione</option>
                              <option name="venda" value="venda">Ordem de Venda</option>
                              <option name="troca" value="troca">Ordem de Troca</option>
                              <option name="pagamento" value="pagamento">Ordem de Pagamento</option>
                              <option name="devolucao" value="devolucao">Ordem de Devolução</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Data Inicial*</label>
                          <input type="date" class="form-control" name="data_inicial" id="data_inicial" type="text" placeholder="Data.." value="" required=""> 
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Data Final*</label>
                           <input type="date" class="form-control" name="data_final" id="data_final" type="text" placeholder="Data.." value="" required=""> 
                        </div>
                     </div>
                     </div>

                     <div style="margin-bottom:20px" class="col-lg-12">
                        <input type="hidden" name="venda" value="venda">
                        <input type="hidden" name="rel_devolucao" value="rel_devolucao">
                        <input type="hidden" name="valor_totall" value="<?PHP echo $top2; ?>">
                        <button style="float: right;" type="submit" class="btn btn-primary">Gerar Relatório<i style="margin-left: 10px;" class="fa fa-check"></i></button>
                     </div>
                  </form>
                  <div class="col-lg-12" style="margin: 20px 0 20px; border-bottom: 1px solid #eee;"></div>
                                                      <?php
                                                      
                                    if (isset($_POST['venda'])){
                                        if($_POST['ordem']=='venda')
{
     echo '<div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Relatório de Vendas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Venda</th>
                                       <th>Nome</th>
                                       <th>Data</th>
                                       <th>Sub Total</th>
                                       <th>Desconto</th>
                                       <th>Total</th>
                                    </tr>
                                 </thead>
                                 <tbody>';
                                    $data_inicial = $_POST['data_inicial'];   
                                    $data_final = $_POST['data_final'];   
                                    echo '<form id="venda" name="venda" method="post" action="funcoes/rel_venda.php" role="form" autocomplete="false">';
                                    echo '<button style="float: right; margin-bottom: 10px; " type="submit" class="btn btn-info">Exportar PDF<i style="margin-left: 10px;" class="fa fa-check"></i></button>';
                                    echo '<input type="hidden" name="data_inicial" value="'.$data_inicial.'">';
                                    echo '<input type="hidden" name="data_final" value="'.$data_final.'">';
                                    echo '</form>';
                                       $sql = "SELECT codigo_venda, nome, subtotal, valor_total, desconto, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data from ordem_venda WHERE data_cadastro BETWEEN STR_TO_DATE('$data_inicial', '%Y-%m-%d') AND STR_TO_DATE('$data_final', '%Y-%m-%d')";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                               echo "<tr>";
                                               echo "<td>".$row["codigo_venda"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["data"]."</td>";
                                               echo "<td>R$ ".$row["subtotal"]."</td>";
                                               echo "<td>".$row["desconto"]."%</td>";
                                               echo "<td>R$ ".$row["valor_total"]."</td>";
                                               echo "</tr>";
                                           }
                                       } else {
                                           echo "Nenhum resultado";
                                       }
                                       $conn->close();
}
else if($_POST['ordem']=='troca')
{
     echo '<div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Relatório de Trocas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Troca</th>
                                       <th>Nome</th>
                                       <th>Data</th>
                                       <th>Sub Total</th>
                                       <th>Desconto</th>
                                       <th>Total</th>
                                    </tr>
                                 </thead>
                                 <tbody>';
                                    $data_inicial = $_POST['data_inicial'];   
                                    $data_final = $_POST['data_final'];   
                                    echo '<form id="venda" name="venda" method="post" action="funcoes/rel_troca.php" role="form" autocomplete="false">';
                                    echo '<button style="float: right; margin-bottom: 10px; " type="submit" class="btn btn-info">Exportar PDF<i style="margin-left: 10px;" class="fa fa-check"></i></button>';
                                    echo '<input type="hidden" name="data_inicial" value="'.$data_inicial.'">';
                                    echo '<input type="hidden" name="data_final" value="'.$data_final.'">';
                                    echo '</form>';
                                       $sql = "SELECT codigo, nome, subtotal, valor_total, desconto, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data from ordem_troca WHERE data_cadastro BETWEEN STR_TO_DATE('$data_inicial', '%Y-%m-%d') AND STR_TO_DATE('$data_final', '%Y-%m-%d')";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                               echo "<tr>";
                                               echo "<td>".$row["codigo"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["data"]."</td>";
                                               echo "<td>R$ ".$row["subtotal"]."</td>";
                                               echo "<td>".$row["desconto"]."%</td>";
                                               echo "<td>R$ ".$row["valor_total"]."</td>";
                                               echo "</tr>";
                                           }
                                       } else {
                                           echo "Nenhum resultado";
                                       }
                                       $conn->close();echo '<div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Relatório de Trocas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Troca</th>
                                       <th>Nome</th>
                                       <th>Data</th>
                                       <th>Sub Total</th>
                                       <th>Desconto</th>
                                       <th>Total</th>
                                    </tr>
                                 </thead>
                                 <tbody>';
                                    $data_inicial = $_POST['data_inicial'];   
                                    $data_final = $_POST['data_final'];   
                                    echo '<form id="venda" name="venda" method="post" action="funcoes/rel_troca.php" role="form" autocomplete="false">';
                                    echo '<button style="float: right; margin-bottom: 10px; " type="submit" class="btn btn-info">Exportar PDF<i style="margin-left: 10px;" class="fa fa-check"></i></button>';
                                    echo '<input type="hidden" name="data_inicial" value="'.$data_inicial.'">';
                                    echo '<input type="hidden" name="data_final" value="'.$data_final.'">';
                                    echo '</form>';
                                       $sql = "SELECT codigo, nome, subtotal, valor_total, desconto, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data from ordem_troca WHERE data_cadastro BETWEEN STR_TO_DATE('$data_inicial', '%Y-%m-%d') AND STR_TO_DATE('$data_final', '%Y-%m-%d')";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                               echo "<tr>";
                                               echo "<td>".$row["codigo"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["data"]."</td>";
                                               echo "<td>R$ ".$row["subtotal"]."</td>";
                                               echo "<td>".$row["desconto"]."%</td>";
                                               echo "<td>R$ ".$row["valor_total"]."</td>";
                                               echo "</tr>";
                                           }
                                       } else {
                                           echo "Nenhum resultado";
                                       }
                                       $conn->close();
}
else if($_POST['ordem']=='pagamento')
{
      echo '<div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Relatório de Pagamentos
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Pagamento</th>
                                       <th>Nome</th>
                                       <th>Sobrenome</th>
                                       <th>Data</th>
                                       <th>Total</th>
                                    </tr>
                                 </thead>
                                 <tbody>';
                                    $data_inicial = $_POST['data_inicial'];   
                                    $data_final = $_POST['data_final'];   
                                    echo '<form id="venda" name="venda" method="post" action="funcoes/rel_pagamento.php" role="form" autocomplete="false">';
                                    echo '<button style="float: right; margin-bottom: 10px; " type="submit" class="btn btn-info">Exportar PDF<i style="margin-left: 10px;" class="fa fa-check"></i></button>';
                                    echo '<input type="hidden" name="data_inicial" value="'.$data_inicial.'">';
                                    echo '<input type="hidden" name="data_final" value="'.$data_final.'">';
                                    echo '</form>';
                                       $sql = "SELECT codigo_pagamento, nome, sobrenome, valor_total, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data from ordem_pagamentos WHERE data_cadastro BETWEEN STR_TO_DATE('$data_inicial', '%Y-%m-%d') AND STR_TO_DATE('$data_final', '%Y-%m-%d') AND tipo='pagamento'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                               echo "<tr>";
                                               echo "<td>".$row["codigo_pagamento"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["sobrenome"]."</td>";
                                               echo "<td>".$row["data"]."</td>";
                                               echo "<td>R$ ".$row["valor_total"]."</td>";
                                               echo "</tr>";
                                           }
                                       } else {
                                           echo "Nenhum resultado";
                                       }
                                       $conn->close();
}
else if($_POST['ordem']=='devolucao')
{
       echo '<div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Relatório de Vendas
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Devolução</th>
                                       <th>Nome</th>
                                       <th>Sobrenome</th>
                                       <th>Data</th>
                                    </tr>
                                 </thead>
                                 <tbody>';
                                    $data_inicial = $_POST['data_inicial'];   
                                    $data_final = $_POST['data_final'];   
                                    echo '<form id="venda" name="venda" method="post" action="funcoes/rel_devolucao.php" role="form" autocomplete="false">';
                                    echo '<button style="float: right; margin-bottom: 10px; " type="submit" class="btn btn-info">Exportar PDF<i style="margin-left: 10px;" class="fa fa-check"></i></button>';
                                    echo '<input type="hidden" name="data_inicial" value="'.$data_inicial.'">';
                                    echo '<input type="hidden" name="data_final" value="'.$data_final.'">';
                                    echo '</form>';
                                       $sql = "SELECT codigo_pagamento, nome, sobrenome, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data from ordem_pagamentos WHERE data_cadastro BETWEEN STR_TO_DATE('$data_inicial', '%Y-%m-%d') AND STR_TO_DATE('$data_final', '%Y-%m-%d') AND tipo='devolucao'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                               echo "<tr>";
                                               echo "<td>".$row["codigo_pagamento"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["sobrenome"]."</td>";
                                               echo "<td>".$row["data"]."</td>";
                                               echo "</tr>";
                                           }
                                       } else {
                                           echo "Nenhum resultado";
                                       }
                                       $conn->close();
}
}
                                       ?>   
                                 </tbody>
                              </table>
                           </div>
                           <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                     </div>
                     <!-- /.panel -->
                  </div>
                  
                  <!-- /.col-lg-12 -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
         </div>
         <!-- /#page-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- jQuery -->
      <script src="../bower_components/jquery/dist/jquery.min.js"></script>
      <script src="../bower_components/jquery/dist/jquery.js"></script>
      <!-- Bootstrap Core JavaScript -->
      <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <!-- Metis Menu Plugin JavaScript -->
      <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
      <!-- Custom Theme JavaScript -->
      <script src="../dist/js/sb-admin-2.js"></script> 
      <script type="text/javascript" src="http://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
      <script src="https://cdn.rawgit.com/plentz/jquery-maskmoney/master/dist/jquery.maskMoney.min.js" type="text/javascript"></script>
      <script src="//cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css"></script>
      <script src="//cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>


      </style>
   </body>
</html>