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
session_start();
 unset( $_SESSION['carrinho2'] );
?>
<!DOCTYPE html>
<html lang="en">

<?php
 include './includes/header.php';
 include './funcoes/config.php';
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
                        <h1 class="page-header">Cadastrar Troca</h1>        
                    </div>  
           
          
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Selecione uma Venda
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
                                        <th>Codigo Venda</th>
                                            <th>Nome</th>
                                            <th>Data de Cadastro</th>
                                            <th>Valor Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php


$sql = "SELECT ordem_venda_id ,codigo_venda, nome, sobrenome, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data, valor_total FROM ordem_venda";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

        echo "<tr >";
        echo "<td>".$row["codigo_venda"]."</td>";
        echo "<td>".ucfirst($row["nome"])." ".ucfirst($row["sobrenome"])."</td>";
        echo "<td>".$row["data"]."</td>";
        echo "<td>R$ ".$row["valor_total"]."</td>";
                                                       echo "<td><center><a class='btn btn-primary' href='troca_cadastro.php?ordem_venda_id=".$row["ordem_venda_id"]."&ordem_venda=".$row["codigo_venda"]."'>Cadastrar Troca</a></center></td>";  
        echo "</tr>";
        
    }
} else {
    echo "Nenhum Resultado";
}
$conn->close();
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
         
                
               </form>
                                   <div class='col-lg-12'>
                             <?php
             echo $msg;
            ?>
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


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
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
    <script type="text/javascript">
    $('.confirmation').on('click', function () {
        return confirm('Gostaria de remover?');
    });
</script>

   <style type="text/css">
  .resposta
  {
  border: 1px solid rgb(255,0,0);
  
  }

  </style>       


</body>

</html>
