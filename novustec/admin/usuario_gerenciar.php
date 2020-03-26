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
                        <h1 class="page-header">Gerenciar Usuários</h1>  
                                          
                    </div>  
           
          
                <div class="col-lg-12">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Selecione um Usuário
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr> 
                                        <th>Codigo</th>
                                            <th>Nome</th>
                                            <th>Sobrenome</th>
                                            <th>Nivel Usuário</th>
                                            <th>Data de Cadastro</th>
                                            <th>Total de Produtos</th>
                                            <th>Status</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                    <?php

$sql = "SELECT U.usuario_id, U.ativado, U.nome, U.sobrenome, U.email, U.nivel_usuario, DATE_FORMAT(U.data_cadastro, '%d/%m/%Y') AS data, (SELECT COUNT(produto_id) FROM produtos WHERE usuarios_usuario_id = U.usuario_id) AS soma FROM usuarios U";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        if($row["nivel_usuario"] == 1){
         $nivel="Fornecedor";
        }ELSE{
         $nivel="Administrador";
        }
        if($row["ativado"] == 1){
         $ativo="Ativo";
        }ELSE{
         $ativo="Desativado";
        }
        echo "<tr>";
        echo "<td>".$row["usuario_id"]."</td>";
        echo "<td>".ucfirst($row["nome"])."</td>";  
        echo "<td>".ucfirst($row["sobrenome"])."</td>";
        echo "<td>".$nivel."</td>";
        echo "<td>".$row["data"]."</td>";
        echo "<td>".$row["soma"]."</td>";
        echo "<td>".$ativo."</td>";
        echo "<td style='text-align: center;'>
        <a title='Visualizar' href='usuario_visualizar.php?usuario_id=".$row["usuario_id"]."&total=".$row["soma"]."'><i style='margin-right: 5px; color: #3c763d;' class='fa fa-check-square fa-lg'></i></a>
        <a title='Editar' href='usuario_editar.php?usuario_id=".$row["usuario_id"]."&total=".$row["soma"]."'><i style='margin-right: 5px; color: #31708f;' class='fa fa-pencil-square fa-lg'></i></a>
        <a title='Remover' class='confirmation' href='./funcoes/usuario_remove.php?usuario_id=".$row["usuario_id"]."'><i style='margin-right: 5px; color: #a94442;' class='fa fa-minus-square fa-lg'></i></a>
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
        return confirm('Gostaria de DESATIVAR o usuario?');
    });
</script>

</body>

</html>
