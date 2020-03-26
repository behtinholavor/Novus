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
                        <h1 class="page-header">Gerenciar Trocas</h1>        
                    </div>  
           
          
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Selecione uma Troca
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
                                        <th>Codigo Troca</th>
                                            <th>Nome</th>
                                            <th>Data</th>
                                            <th>Valor Total</th>
                                            <th>Op��es</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php


$sql = "SELECT ordem_troca_id, codigo, nome, sobrenome, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data, valor_total FROM ordem_troca";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    $remover1 = "<a disabled title='Remover' class='confirmation not-active' href='./funcoes/produto_remove.php?produto_id=".$row["produto_id"]."'><i style='margin-right: 5px; color: #C17A78; ' class='fa fa-minus-square fa-lg '></i></a>";
                        $valor= $row['valor_total'];
      $converte_valor = number_format($valor,2,",",".");


        echo "<tr>";
        echo "<td>".$row["codigo"]."</td>";
        echo "<td>".ucfirst($row["nome"])." ".ucfirst($row["sobrenome"])."</td>";
        echo "<td>".$row["data"]."</td>";
        echo "<td>R$ ".$converte_valor."</td>";
        echo "<td style='text-align: center;'>
        <a title='Visualizar' href='troca_visualizar.php?troca_id=".$row["ordem_troca_id"]."'><i style='margin-right: 5px; color: #3c763d;' class='fa fa-check-square fa-lg'></i></a>
        <a title='Editar' href='troca_editar.php?troca_id=".$row["ordem_troca_id"]."'><i style='margin-right: 5px; color: #31708f;' class='fa fa-pencil-square fa-lg'></i></a>
        $remover1
        </td>";
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
                    "sZeroRecords":  "N�o foram encontrados resultados",
                    "sInfo":         "Mostrando de _START_ at� _END_ de _TOTAL_ registros",
                    "sInfoEmpty":    "Mostrando de 0 at� 0 de 0 registros",
                    "sInfoFiltered": "",
                    "sInfoPostFix":  "",
                    "sSearch":       "Buscar:",
                    "sUrl":          "",
                    "oPaginate": {
                        "sFirst":    "Primeiro",
                        "sPrevious": "Anterior",
                        "sNext":     "Seguinte",
                        "sLast":     "�ltimo"
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

<style>
<!--
 .not-active {
    pointer-events: none;
    cursor: default;
    color: #C17A78;
}
//-->
</style>

</body>

</html>
