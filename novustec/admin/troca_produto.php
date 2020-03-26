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
 $ordem_venda_id= $_REQUEST['ordem_venda_id'];
 $ordem_venda= $_REQUEST['ordem_venda'];


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
                        <h1 class="page-header">Produtos</h1>                      
                    </div>  
           
          
                <div class="col-lg-12">
                
                    <div style="margin-bottom: 0px" class="panel panel-default">
                        <div class="panel-heading">
                            Selecione um Produto
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                        <form action="troca_cadastro.php" method="post">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th></th> 
                                        <th>Codigo</th>
                                            <th>Nome</th>
                                            <th>Tamanho</th>
                                            <th>Sexo</th>
                                            <th>Status</th>
                                            <th>Valor Total</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                  <?php
      require("./funcoes/config.php");

      $sql = "select P.produto_id, P.codigo, P.nome, P.tamanho, P.sexo, P.status, P.valor_total, P.valor_original_total
from produtos P
join venda_produtos V
on V.produtos_produto_id = P.produto_id
join ordem_venda O
on O.ordem_venda_id = V.ordem_venda_ordem_venda_id WHERE O.ordem_venda_id = '$ordem_venda_id'";
      $qr = mysql_query($sql) or die(mysql_error());
      while($ln = mysql_fetch_assoc($qr)){
      echo "<tr>";
       echo "<td><input type='checkbox' name='check_list[".$ln['produto_id']."]' value='".$ln['produto_id']."'></td>";
         echo "<td>".$ln['codigo']."</td>";
         echo "<td>".$ln['nome']."</td>";
         echo "<td>".$ln['tamanho']."</td>";
         echo "<td>".$ln['sexo']."</td>";
         echo "<td>".$ln['status']."</td>";
         echo "<td>R$ ".$ln['valor_original_total']."</td>";
         echo "</tr>";
      }
?>
                                  
                             <input style="display: none;" type="text" value="<?PHP echo $ordem_venda_id; ?>" name="ordem_venda_id">
                             <input style="display: none;" type="text" value="<?PHP echo $ordem_venda; ?>" name="ordem_venda">          
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <input style="float: right; margin-top:15px; margin-right: 30px;" class="btn btn-success" type="submit" value="Adicionar">
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
        return confirm('ATENÇÃO!\nA EXLUSÃO DO USUÁRIO REMOVE TODOS OS SEUS RESPECTIVOS PRODUTOS.\nGostaria de remover?');
    });
</script>

</body>

</html>
