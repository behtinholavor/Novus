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
                     <h1 class="page-header">Cadastrar Pagamento</h1>
                  </div>
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Selecione um Fornecedor
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="dataTable_wrapper">
                              <table class="table table-striped table-bordered table-hover tabela" id="dataTables-example2">
                                 <thead>
                                    <tr>
                                       <th>Codigo</th>
                                       <th>Nome</th>
                                       <th>Sobrenome</th>
                                       <th>E-mail</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 <tbody> 
                                    <?php
                                       $sql = "SELECT usuario_id, nome, sobrenome, email FROM usuarios WHERE nivel_usuario = '1'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                               echo "<tr onclick=location.href='pagamento_cadastro.php?usuarios_usuario_id=".$row["usuario_id"]."&nome=".ucfirst($row["nome"])."&sobrenome=".ucfirst($row["sobrenome"])."' class='odd gradeX'>";
                                               echo "<td>".$row["usuario_id"]."</td>";
                                               echo "<td>".ucfirst($row["nome"])."</td>";
                                               echo "<td>".ucfirst($row["sobrenome"])."</td>";
                                               echo "<td>".$row["email"]."</td>";
                                                echo "<td><center><a class='btn btn-primary' href='pagamento_cadastro.php?usuarios_usuario_id=".$row["usuario_id"]."&nome=".ucfirst($row["nome"])."&sobrenome=".ucfirst($row["sobrenome"])."'>Cadastrar Pagamento</a></center></td>";                      
                                               echo "</tr>";
                                               echo "<input type='hidden' name='nome' value='".ucfirst($row["nome"])."'>";
                                               echo "<input type='hidden' name='sobrenome' value='".ucfirst($row["sobrenome"])."'>";
                                           }
                                       } else {
                                           echo "0 results";
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
      <script src="./js/tabelas.js"></script>
      <!-- Page-Level Demo Scripts - Tables - Use for reference -->

      </script>

   </body>
</html>
