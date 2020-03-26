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
      
      $pagamento_id = $_GET["pagamento_id"];   
      $fornecedor = $_GET["fornecedor"]; 
      
      $result = mysql_query("SELECT codigo_pagamento, DATE_FORMAT(data_cadastro, '%d/%m/%Y') as data, valor_total, nome, sobrenome, descricao FROM ordem_pagamentos WHERE pagamento_id = '$pagamento_id'");
      if (!$result) {
         echo 'Não foi possível executar a consulta: ' . mysql_error();
         exit;
      }
      $row = mysql_fetch_row($result);

      $codigo= $row[0];
      $data_cadastro= $row[1];
      $valor_total= $row[2];
      $nome= $row[3];
      $sobrenome= $row[4];
      $descricao= $row[5];
      
      
                           
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
                        Editar Pagamento
                        <p style='float:right ; font-size: 11px; font-weight: bold;'>(Fornecedor: <?php echo $fornecedor; ?>)</p>
                     </h1>
                  </div>
                  <div style="margin-bottom: 15px;" class="col-lg-12">  
                  </div>
                  <form id="venda" name="venda" method="post" action="./funcoes/pagamento_edit.php" role="form" autocomplete="false">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Código Pagamento*</label>
                           <input disabled <?PHP echo $disabled; ?>  class="form-control" name="codigo" id="codigo" type="text" placeholder="<?php echo $codigo; ?>" value="<?php echo $codigo; ?>" required=""> 
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Data*</label>
                           <input disabled <?PHP echo $disabled; ?> class="form-control" name="data_cadastro" id="data_cadastro" type="text" placeholder="Data.." required="" value="<?php echo $data_cadastro; ?>"> 
                        </div>
                     </div>

                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Valor Total (Cliente)</label>
                           <input disabled <?PHP echo $disabled; ?> type="text" class="form-control" name="valor_total" id="valor_total" type="text" placeholder="Data.." value="R$ <?php echo $valor_total; ?>" required=""> 
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Nome*</label>
                           <input disabled <?PHP echo $disabled; ?> class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?PHP echo $nome; ?>" required="">  
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Sobrenome*</label>
                           <input disabled <?PHP echo $disabled; ?> class="form-control" placeholder="Sobrenome.." name="sobrenome"required="" value="<?PHP echo $sobrenome; ?>">  
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Descrição</label>
                           <textarea <?PHP echo $disabled; ?> class="form-control" rows="3" name="descricao"><?PHP echo $descricao; ?></textarea>  
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <!-- /.panel-heading -->
                        <div class="col-lg-12">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 Produtos    
   
                              
                              </div>
                              <!-- .panel-heading -->
                              <div class="panel-body">
                                 <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          <h4 class="panel-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">Produtos Vendidos</a>
                                          </h4>
                                       </div>
                                       <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" >
                                          <div class="panel-body">
                                             <div class="panel-body">
                                                <div class="table-responsive">
                                                   <table class="table table-striped table-bordered table-hover">
                                                      <thead>
                                                         <tr>
                                                            <td style="background: #eee;" colspan='7'>Protudos Vendidos</td>
                                                         </tr>
                                                         <tr>
                                                            <th>Codigo</th>
                                                            <th>Nome</th>
                                                            <th>Tamanho</th>
                                                            <th>Sexo</th>
                                                            <th>Status</th>
                                                            <th>Desconto</th>
                                                            <th>Valor Cliente</th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <?php
                                       $sql = "SELECT P.produto_id, P.nome, P.codigo, P.tamanho, P.sexo, P.status, P.desconto, P.valor_cliente, J.produtos_produto_id, J.ordem_pagamentos_id FROM produtos P INNER JOIN pagamento_produtos J ON (P.produto_id=J.produtos_produto_id) WHERE J.ordem_pagamentos_id = '".$pagamento_id."'";
                                       $result = $conn->query($sql);
                                       
                                       if ($result->num_rows > 0) {
                                           // output data of each row
                                           while($row = $result->fetch_assoc()) {
                                           $fornecedor = ucfirst($row["nomeu"])." ".ucfirst($row["sobrenome"]);
                                               echo "<tr>";
                                               echo "<td>".$row["codigo"]."</td>";
                                               echo "<td>".$row["nome"]."</td>";
                                               echo "<td>".$row["tamanho"]."</td>";
                                               echo "<td>".$row["sexo"]."</td>";
                                               echo "<td>".$row["status"]."</td>";
                                               echo "<td>".$row["desconto"]."</td>";
                                               echo "<td>".$row["valor_cliente"]."</td>";
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
                                                <div class="panel-body">
                                                   <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.table-responsive -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- .panel-body -->
                           </div>
                           <div style="margin-bottom: 15px; border-bottom: 1px solid #eee;"></div>
                           <div class="col-lg-12">
                           </div>
                           <!-- /.panel -->
                        </div>
                        <!-- /.panel-body -->
                        <!-- /.panel -->
                     </div>
 <div style="margin-bottom:20px" class="col-lg-12">
                        <input type="hidden" name="produto_cadastro" value="produto_cadastro">
                        <input type="hidden" id="pagamento_id" name="pagamento_id" value="<?php echo $pagamento_id; ?>">
                        <button type="submit" id="enviar" class="btn btn-success">Editar</button>
                        <button onclick="goBack()" type="return" class="btn btn-info">Voltar</button>
                        <input name="pagamento_editar" id="pagamento_editar" type="hidden" value="pagamento_editar">
                        <div id=sucesso></div>
                     </div>
                  </form>
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
         function goBack() {
           window.history.go(-1);
         }
      </script>

      </style>
   </body>
</html>