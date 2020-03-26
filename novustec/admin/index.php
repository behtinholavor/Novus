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
               
               $total_usuarios = "SELECT COUNT(*) as total FROM usuarios";
               $usuariosresult = $conn->query($total_usuarios);
               $usuariosrow = $usuariosresult->fetch_assoc();
               $total_usuarios = $usuariosrow["total"];
               
               $total_produtos = "SELECT COUNT(*) as total FROM produtos";
               $produtosresult = $conn->query($total_produtos);
               $produtosrow = $produtosresult->fetch_assoc();
               $total_produtos = $produtosrow["total"];
               
               $total_vendas = "SELECT COUNT(*) as total FROM ordem_venda";
               $vendasresult = $conn->query($total_vendas);
               $vendasrow = $vendasresult->fetch_assoc();
               $total_vendas = $vendasrow["total"];
               
               $total_pagamentos = "SELECT COUNT(*) as total FROM ordem_pagamentos";
               $pagamentosresult = $conn->query($total_pagamentos);
               $pagamentosrow = $pagamentosresult->fetch_assoc();
               $total_pagamentos = $pagamentosrow["total"];
               ?>
         </nav>
         <!-- Page Content -->
         <div id="page-wrapper">
            <div class="row">
               <div class="col-lg-12">
                  <h1 class="page-header">Dashboard</h1>
               </div>
               <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-lg-3 col-md-6">
                  <div class="panel panel-primary">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-users fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                              <div class="huge"><?PHP echo $total_usuarios; ?></div>
                              <div>Usuários</div>
                           </div>
                        </div>
                     </div>
                     <a href="usuario_gerenciar.php">
                        <div class="panel-footer">
                           <span class="pull-left">Ver Detalhes</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="panel panel-green">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-tags fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                              <div class="huge"><?PHP echo $total_produtos; ?></div>
                              <div>Produtos</div>
                           </div>
                        </div>
                     </div>
                     <a href="produto_gerenciar.php">
                        <div class="panel-footer">
                           <span class="pull-left">Ver Detalhes</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="panel panel-yellow">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-shopping-bag fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                              <div class="huge"><?PHP echo $total_vendas; ?></div>
                              <div>Vendas</div>
                           </div>
                        </div>
                     </div>
                     <a href="venda_gerenciar.php">
                        <div class="panel-footer">
                           <span class="pull-left">Ver Detalhes</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                        </div>
                     </a>
                  </div>
               </div>
               <div class="col-lg-3 col-md-6">
                  <div class="panel panel-red">
                     <div class="panel-heading">
                        <div class="row">
                           <div class="col-xs-3">
                              <i class="fa fa-usd fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">
                              <div class="huge"><?PHP echo $total_pagamentos; ?></div>
                              <div>Pagamentos</div>
                           </div>
                        </div>
                     </div>
                     <a href="pagamento_gerenciar.php">
                        <div class="panel-footer">
                           <span class="pull-left">Ver Detalhes</span>
                           <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                           <div class="clearfix"></div>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
            <!-- /.row -->
            <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Controle de Usuários
                     </div>
                     <!-- /.panel-heading -->
                     <div class="panel-body">
                        <div id="morris-bar-chart"></div>
                     </div>
                  </div>
               </div>

               <div class="col-lg-6">
                  <div class="panel panel-default">
                     <div class="panel-heading">
                        <i class="fa fa-bar-chart-o fa-fw"></i> Produtos
                     </div>
                     <!-- /.panel-heading -->
                     <div class="panel-body">
                        <div id="morris-donut-chart"></div>
                     </div>
                  </div>
               </div>
               
               <div class="col-lg-6">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Últimos 10 produtos cadastrados:
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered table-hover">
                                 <thead>
                                    <tr>
                                       <th>Código Produto</th>
                                       <th>Nome</th>
                                       <th>Sexo</th>
                                       <th>Valor</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $sql = "SELECT produto_id, codigo, nome, sexo, status, date_format(`data_cadastro`,'%d/%m/%Y') as `data_formatada`, valor_total FROM produtos ORDER BY data_cadastro DESC LIMIT 10";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                                     $valor= $row['valor_total'];
                                             $converte_valor = number_format($valor,2,",",".");
                                               echo "<tr>";
                                               echo "<td>".$row["codigo"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["sexo"]."</td>";
                                               echo "<td>".$converte_valor."</td>"; 
 
                                               echo "</tr>";
                                           }
                                       } else {
                                           echo "Nenhum resultado";
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
            </div>
            <!-- /.row -->
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
      <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
      <script src="http://cdn.oesmith.co.uk/morris-0.4.1.min.js"></script>
      <?php
         include './funcoes/grafico_vendidos.php';
         include './funcoes/grafico_valores.php';
         include './funcoes/grafico_produtos.php';
         ?>
      <script>
         var months = ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"];
         
         Morris.Bar({
           element: 'morris-bar-chart',
         <?PHP echo $data; ?>,
           xkey: 'm',
           ykeys: ['b', 'c'],
           labels: ['Novos Fornecedores', 'Novos Administradores'],
           continuousLine: true,
           parseTime: true,
           barColors: [
           '#337ab7',
             '#5cb85c',
             '#7a92a3',
           ],
           xLabelFormat: function(x) { // <--- x.getMonth() returns valid index
             var month = months[x.getMonth()];
             return month;
           },
           dateFormat: function(x) {
             var month = months[new Date(x).getMonth()];
             return month;
           },
         
         });
         
         

         
         
          Morris.Donut({
                 element: 'morris-donut-chart',
                 colors: ["#337ab7", "#7a92a3"],
                 data: <?PHP echo $data3; ?>
                 resize: true,
         
             });
      </script>  
   </body>
</html>