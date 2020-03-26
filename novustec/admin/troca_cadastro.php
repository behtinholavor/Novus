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
 $ordem_venda_id= $_REQUEST['ordem_venda_id'];
 $ordem_venda= $_REQUEST['ordem_venda'];
function uniqueAlfa($length=16)
{
 $salt = "0123456789";
 $len = strlen($salt);
 $pass = 'T';
 mt_srand(10000000*(double)microtime());
 for ($i = 0; $i < $length; $i++)
 {
   $pass .= $salt[mt_rand(0,$len - 1)];
 }
 return $pass;
}


       $sql2 = "SELECT nome, sobrenome, codigo_venda, telefone, desconto FROM ordem_venda WHERE ordem_venda_id= '$ordem_venda_id'";
      $qr2    = mysql_query($sql2) or die(mysql_error());
                              $ln2    = mysql_fetch_assoc($qr2);
      $nome = $ln2['nome'];
      $sobrenome = $ln2['sobrenome'];
      $telefone = $ln2['telefone'];
      $desconto = $ln2['desconto']; 
      
      if(!empty($_POST['check_list'])){
   $disabled = "";
   } ELSE{
   $mensagem = "<div class='alert alert-danger'>
                                Adicione ao menos um produto!.
                            </div>";
    $disabled = "disabled";
   }
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
                        <h1 class="page-header">Cadastrar Troca<p style='float:right ; font-size: 11px; font-weight: bold;'>(Ordem de Venda: <?php echo $ordem_venda; ?>)</p></h1> 
                      
                    </div>  
                    <div style="margin-bottom: 15px;" class="col-lg-12">  
                     <?php
                        echo $mensagem;
                       ?>   
                       </div>
                       <form id="venda" name="venda" method="post" action="./funcoes/troca_add.php" role="form" autocomplete="false">
                     <div class="col-lg-12">
                     <div class="form-group">
                        <label>Código Troca*</label>
                        <input <?PHP echo $disabled; ?>  class="form-control" name="codigo" id="codigo" type="text" placeholder="<?php echo uniqueAlfa(6); ?>" value="<?php echo uniqueAlfa(6); ?>" required=""> 
                     </div>
                  </div>
                      
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nome*</label>
                        <input <?PHP echo $disabled; ?> class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?PHP echo $nome; ?>" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Sobrenome*</label>
                        <input <?PHP echo $disabled; ?> class="form-control" placeholder="Sobrenome.." name="sobrenome"required="" value="<?PHP echo $sobrenome; ?>">  
                     </div>
                  </div>     
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone*</label>
                        <input <?PHP echo $disabled; ?> id="telefone" class="form-control" placeholder="Telefone.." name="telefone" required="" value="<?PHP echo $telefone; ?>">  
                     </div>
                  </div> 
                                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Data*</label>
                        <input <?PHP echo $disabled; ?> type="date" class="form-control" name="data_cadastro" id="data_cadastro" type="text" placeholder="Data.." value="" required=""> 
                     </div>
                  </div>  
             
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea <?PHP echo $disabled; ?> class="form-control" rows="3" name="descricao"></textarea>  
                     </div>
                     
                  </div>  
                  <div class="col-lg-12">    

<div class="panel panel-default">
                        <div class="panel-heading">
                            Produtos para Troca
                           
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                 <a style='float:right; margin-bottom: 20px;' href='troca_produto.php?ordem_venda_id=<?PHP echo $ordem_venda_id; ?>&ordem_venda=<?PHP echo $ordem_venda; ?>' class='btn btn-success'>Adicionar <i class='fa fa-plus'></i></a>
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
                   if(!empty($_POST['check_list'])){
     foreach($_POST['check_list'] as $report_id){
        
      $sql = "SELECT * FROM produtos WHERE produto_id = '$report_id'";
      $qr = mysql_query($sql) or die(mysql_error());
 while($ln = mysql_fetch_assoc($qr)){
$nome  = $ln['nome'];
                              $valor = $ln['valor_total'];
                              $subtotal += $valor;
                              $top = number_format($subtotal, 2, ',', '.'); 
                              
                              $valor2 = $ln['valor_original_total'];
                              $subtotal2 += $valor2;
                              $top2 = number_format($subtotal2, 2, ',', '.');   
      echo "<tr>";   
         echo "<td>".$ln['codigo']."</td>";
         echo "<td>".$ln['nome']."</td>";
         echo "<td>".$ln['tamanho']."</td>";
         echo "<td>".$ln['sexo']."</td>";
         echo "<td>".$ln['status']."</td>";
         echo "<td>R$ ".$ln['valor_original_total']."<input type='hidden' name='produto_id[".$ln['produto_id']."]'' value='".$ln['produto_id']."'></td>";
         echo "</tr>";
      }      
     }
      echo '
      <tr style="font-weight: bold; background-color: #eee;">
                                    <td class="text-right" colspan="5">Subtotal</td>
                                    <td>R$'.$top2.'</td>
                                    <input type="hidden" name="subtotal" value="'.$top2.'" />
                              </tr>
      <tr style="font-weight: bold;">
                                    <td class="text-right" colspan="5">Desconto Ativo</td>
                                    <td>'.$desconto.'%</td>
                                    <input type="hidden" name="desconto" value="'.$desconto.'" />
                              </tr>
      <tr style="font-weight: bold; background-color: #eee;">
                                    <td class="text-right" colspan="5">Total</td>
                                    <td>R$ '.$top.'</td>
                                    <input type="hidden" name="valor_total" value="'.$top.'" />
                              </tr>';
   } ELSE{
   $mensagem = "<div class='alert alert-danger'>
                                Adicione ao menos um produto!.
                            </div>";
    $disabled = "disabled";
   }   
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
                  <input type="hidden" name="troca_cadastro" value="troca_cadastro">
                   <input type="hidden" name="codigo_venda" value="<?PHP echo $codigo_venda ?>">
                   <input type="hidden" name="ordem_venda_id" value="<?PHP echo $ordem_venda_id ?>">
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

<script>
$(document).ready(function($){
    $("#telefone").mask("(99) 9999-99999"); 
});
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
