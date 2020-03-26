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
               <div  class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">Ajuda</h1>
                  </div>
                  <div  class="col-lg-12 ">

                     <div  class="panel panel-default">
                        <div class="panel-heading">
                           Informações:
                        </div>
                        <!-- /.panel-heading -->
                        <div style="margin: 0px auto;" class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">


                                       <tr>
                                       <th>Sistema:</th>
                                       <th style="font-weight: normal;">Vendas consignadas</th>
                                       </tr>
                                        <tr>
                                       <th>Versão:</th>
                                       <th style="font-weight: normal;">2.0</th>
                                       </tr>
                                        <tr>
                                       <th>Desenvolvido por:</th>
                                       <th style="font-weight: normal;">Novus Tecnologia</th>
                                       </tr>
                                       <tr>
                                       <th>E-mail:</th>
                                       <th style="font-weight: normal;">contato@novustec.com.br</th>
                                       </tr>
                                       <tr>
                                       <th>Site:</th>
                                       <th style="font-weight: normal;"><a href="http://www.novustec.com.br" target="_blank">www.novustec.com.br</a></th>
                                       </tr>
                              </table>
                           </div>
                           <!-- /.table-responsive -->
                        </div>
                        
                        <!-- /.panel-body -->
                     </div>
                     <p class="text-center" style="font-size: 9px;">*Para duvidas/sugestões/melhorias entrar em contato através dos canais acima.</p>
                     <!-- /.panel -->
                
                     <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-12 -->


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

   </body>
</html>