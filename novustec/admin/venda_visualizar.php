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
$venda_id = $_GET['venda_id'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT ordem_venda_id, subtotal, desconto, codigo_venda, valor_total AS totall, nome, sobrenome, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data, telefone, descricao FROM ordem_venda WHERE ordem_venda_id = '$venda_id'";
$result = $conn->query($sql);

$row = $result->fetch_assoc();

$sql2 = "SELECT * FROM ordem_troca WHERE ordem_venda_id = '$venda_id'";
$result2 = $conn->query($sql2);

$row2 = $result2->fetch_assoc();

IF(mysqli_num_rows($result2) > 0){
$troca = "<div class='alert alert-warning'>
                                Esta venda possuí a ordem <a href='troca_visualizar.php?troca_id=".$row2['ordem_troca_id']."' class='alert-link'> ".$row2['codigo']."</a> de troca.
                            </div>";
}ELSE{
$troca = "";
}
   
$conn->close();
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
                        <h1 class="page-header">Visualizar Venda</h1> 
                      
                    </div>  
                    <div style="margin-bottom: 15px;" class="col-lg-12">  
                     <?php
                      echo $troca;
                       ?>   
                       </div>
                     <div class="col-lg-12">
                     <div class="form-group">
                        <label>Código Venda*</label>
                        <input readonly class="form-control" name="codigo_venda" id="codigo" type="text" placeholder="" value="<?php echo $row['codigo_venda']; ?>" required=""> 
                     </div>
                  </div>
                      
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nome*</label>
                        <input readonly class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?php echo $row['nome']; ?>" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Sobrenome*</label>
                        <input readonly class="form-control" placeholder="Sobrenome.." name="sobrenome"required="" value="<?php echo $row['sobrenome']; ?>">  
                     </div>
                  </div>     
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone*</label>
                        <input readonly id="telefone" class="form-control" placeholder="Telefone.." name="telefone" value="<?php echo $row['telefone']; ?>" required="">  
                     </div>
                  </div> 
                                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Data*</label>
                        <input readonly class="form-control" name="data_cadastro" id="data_cadastro" type="text"  value="<?php echo $row['data']; ?>" required=""> 
                     </div>
                  </div>  
             
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea readonly class="form-control" rows="3" name="descricao" ><?php echo $row['descricao'];; ?></textarea>  
                     </div>
                     
                  </div>  
                  <div class="col-lg-12">    

<div class="panel panel-default">
                        <div class="panel-heading">
                            Produtos Adicionados
                           
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                 
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nome</th>
                                            <th>Tamanho</th>
                                            <th>Sexo</th>
                                            <th>Status</th>
                                            <th>Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php

include './funcoes/config.php'; 
$sql = "select P.codigo, P.produto_id, P.valor_original_total, P.nome, P.tamanho, P.sexo, P.status, P.valor_total, V.produtos_produto_id, V.ordem_venda_ordem_venda_id
from produtos P
inner join venda_produtos V on P.produto_id = V.produtos_produto_id WHERE V.ordem_venda_ordem_venda_id = '$venda_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row2 = $result->fetch_assoc()) {
                         $valor= $row2['valor_original_total'];
      $converte_valor = number_format($valor,2,",",".");
      $valor2= $row['subtotal'];
      $converte_subtotal = number_format($valor2,2,",",".");
      
      $valor3= $row['totall'];
      $converte_totall = number_format($valor3,2,",",".");
        
        echo "<tr>";
        echo "<td>".$row2["codigo"]."</td>";
        echo "<td>".$row2["nome"]."</td>";
        echo "<td>".$row2["tamanho"]."</td>";
        echo "<td>".$row2["sexo"]."</td>";
        echo "<td>".$row2["status"]."</td>";
        echo "<td>R$ ".$converte_valor."</td>";
        echo "</tr>";
    }
} else {
    echo "Nenhum Resultado";
}



$conn->close();
 echo '<tr style=" font-weight: bold; background-color: #eee;">     
                                    <td class="text-right" colspan="5">Sub Total</td>
                                    <td>R$ '.$converte_subtotal.'</td>
                              
                              </tr>
                              <tr style="font-weight: bold;">     
                                    <td class="text-right" colspan="5">Desconto</td>
                                    <td>'.$row["desconto"].'%</td>

                              </tr>
                              <tr style="font-weight: bold; background-color: #eee;">     
                                    <td class="text-right" colspan="5">Total</td>
                                    <td style="background-color: #eee;">R$ '.$converte_totall.'</td>

                              </tr>
                              
                              
                              ';
                             
               ?>
                                        
                                    </tbody>
                                    
                                </table>
                              
                            </div>
                            <div class="panel-body">
                            
                            <!-- /.table-responsive -->
                        </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>   
                  <div style="margin-bottom:20px" class="col-lg-12">
                     <button disabled="" type="submit" id="enviar" class="btn btn-success">Editar</button>
                     <button onclick="goBack()" type="return" class="btn btn-info">Voltar</button>
                    
                  </div>
                

                           <div class="col-lg-12" style="margin: 20px 0 20px; border-bottom: 1px solid #eee;"></div>        
                                  
        

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

<script>
$(document).ready(function($){
    $("#telefone").mask("(99) 9999-99999"); 
});

</script>

<script>
  function goBack() {
    window.history.go(-1);
  }
</script>
 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true,
                "oLanguage": {
                    "sProcessing":   "Processando...",
                    "sLengthMenu":   "Mostrar _MENU_ registros",
                    "sZeroRecords":  "Não foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "Último"
                    }
                }
        });
    });
    </script>

  </style>

</body>

</html>
