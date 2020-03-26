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
                        Cadastrar Devolução
                        <p style='float:right ; font-size: 11px; font-weight: bold;'>(Fornecedor: <?php echo $fornecedor; ?>)</p>
                     </h1>
                  </div>
                  <div style="margin-bottom: 15px;" class="col-lg-12">  
                  </div>
                  <form id="venda" name="venda" method="post" action="./funcoes/devolucao_add.php" role="form" autocomplete="false">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Código Pagamento*</label>
                           <input <?PHP echo $disabled; ?>  class="form-control" name="codigo" id="codigo" type="text" placeholder="<?php echo uniqueAlfa(6); ?>" value="<?php echo uniqueAlfa(6); ?>" required=""> 
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Data*</label>
                           <input <?PHP echo $disabled; ?> type="date" class="form-control" name="data_cadastro" id="data_cadastro" type="text" placeholder="Data.." value="" required=""> 
                        </div>
                     </div>
                     <?php
                        $sql = "SELECT valor_cliente FROM produtos WHERE status = 'devolver' AND usuarios_usuario_id = '".$usuario_id."' AND pagamento = '0'";
                        $result = $conn->query($sql);
                        $contator = '0';
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row2 = $result->fetch_assoc()) {
                                  $valor = $row2["valor_cliente"];
                                                             $total = str_replace(',','.', $valor);
                                                      $subtotal += $total;
                                                      $top = number_format($subtotal, 2, ',', '.'); 
                        
                        $contator++;         
                            }
                        } else {
                            echo "Nenhum Resultado";
                        }
                        
                        $conn->close();
                        
                                       ?>

                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Nome*</label>
                           <input readonly <?PHP echo $disabled; ?> class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?PHP echo $nome; ?>" required="">  
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Sobrenome*</label>
                           <input readonly <?PHP echo $disabled; ?> class="form-control" placeholder="Sobrenome.." name="sobrenome"required="" value="<?PHP echo $sobrenome; ?>">  
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Descrição</label>
                           <textarea <?PHP echo $disabled; ?> class="form-control" rows="3" name="descricao"></textarea>  
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <!-- /.panel-heading -->
                        <div class="col-lg-12">
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                 Produtos    
                                 <p style="margin-bottom: 15px; padding-top: 5px; margin-right: 20px; float:right ; font-size: 11px; font-weight: bold;">Total Produtos a Devolver: <?PHP echo $contator; ?></p>
                                 <input type="hidden" class="form-control" placeholder="Sobrenome.." name="contador_vendidos" required="" value="<?PHP echo $contator; ?>"> 
                              </div>
                              <!-- .panel-heading -->
                              <div class="panel-body">
                                 <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                       <div class="panel-heading">
                                          <h4 class="panel-title">
                                             <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" class="">Produtos a Devolver</a>
                                          </h4>
                                       </div>
                                       <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" >
                                          <div class="panel-body">
                                             <div class="panel-body">
                                                <div class="table-responsive">
                                                   <table class="table table-striped table-bordered table-hover">
                                                      <thead>
                                                         <tr>
                                                            <td style="background: #eee;" colspan='7'>Protudos a Devolver</td>
                                                         </tr>
                                                         <tr>
                                                            <th>Codigo</th>
                                                            <th>Nome</th>
                                                            <th>Tamanho</th>
                                                            <th>Sexo</th>
                                                            <th>Status</th>
                                                         </tr>
                                                      </thead>
                                                      <tbody>
                                                         <?php
                                                         include './funcoes/config.php';
                                                            $sql = "SELECT produto_id, codigo, nome, tamanho, desconto, sexo, valor_cliente, status FROM produtos WHERE status = 'devolver' AND usuarios_usuario_id = '".$usuario_id."' AND pagamento= '0'";
                                                            $result = $conn->query($sql);
                                                            
                                                            if ($result->num_rows > 0) {
                                                                // output data of each row
                                                                while($row = $result->fetch_assoc()) {
          
                                                                    echo "<tr>";
                                                                    echo "<td>".$row["codigo"]."</td>";
                                                                    echo "<td>".$row["nome"]."</td>";
                                                                    echo "<td>".$row["tamanho"]."</td>";
                                                                    echo "<td>".$row["sexo"]."</td>";
                                                                    echo "<td>".$row["status"]."</td>";
                                                                  
                                                                    echo "<input type='hidden' name='produto_id[".$row['produto_id']."]'' value='".$row['produto_id']."'>";
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
                        <input type="hidden" name="pagamento_cadastro" value="pagamento_cadastro">
                        <input type="hidden" name="usuario_id" value="<?PHP echo $usuario_id; ?>">
                        <input type="hidden" name="valor_totall" value="<?PHP echo $top2; ?>">
                        <button style="float: right;" type="submit" class="btn btn-primary">Concluir<i style="margin-left: 10px;" class="fa fa-check"></i></button>
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


      </style>
   </body>
</html>