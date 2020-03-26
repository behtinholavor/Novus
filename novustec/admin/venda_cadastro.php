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
function uniqueAlfa($length=16)
{
 $salt = "0123456789";
 $len = strlen($salt);
 $pass = 'V';
 mt_srand(10000000*(double)microtime());
 for ($i = 0; $i < $length; $i++)
 {
   $pass .= $salt[mt_rand(0,$len - 1)];
 }
 return $pass;
}

if(!empty($_POST['check_list'])){
   $disabled = "";
   $botao = "<a style='float:right; margin-bottom: 20px;' onclick='goBack()' class='btn btn-warning'>Alterar Produtos <i class='fa fa-pencil'></i></a>";
   } ELSE{
   $mensagem = "<div class='alert alert-danger'>
                                Adicione ao menos um produto!.
                            </div>";
    $disabled = "disabled";
    $botao = "<a style='float:right; margin-bottom: 20px;' href='venda_produto.php' class='btn btn-success'>Adicionar <i class='fa fa-plus'></i></a>";
   }
   // Função de porcentagem: Quanto é X% de N?


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
                        <h1 class="page-header">Cadastrar Venda</h1> 
                      
                    </div>  
                    <div style="margin-bottom: 15px;" class="col-lg-12">  
                     <?php
                        echo $mensagem;
                       ?>   
                      
                       </div>
                       <form id="venda" name="venda" method="post" action="./venda_conclusao.php" role="form" autocomplete="false">
                     <div class="col-lg-12">
                     <div class="form-group">
                        <label>Código Venda*</label>
                        <input <?PHP echo $disabled; ?>  class="form-control" name="codigo_venda" id="codigo" type="text" placeholder="<?php echo uniqueAlfa(6); ?>" value="<?php echo uniqueAlfa(6); ?>" required=""> 
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
                        <input <?PHP echo $disabled; ?> class="form-control" placeholder="Sobrenome.." name="sobrenome"required="">  
                     </div>
                  </div>     
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone*</label>
                        <input <?PHP echo $disabled; ?> id="telefone" class="form-control" placeholder="Telefone.." name="telefone" required="">  
                     </div>
                  </div> 
                                    <div class="col-lg-3">
                     <div class="form-group">
                        <label>Data*</label>
                        <input <?PHP echo $disabled; ?> type="date" class="form-control" name="data_cadastro" id="data_cadastro" type="text" placeholder="Data.." value="" required=""> 
                     </div>
                  </div> 
                 
                  <div class="col-lg-3">
                     <div class="form-group">
                        <label>Desconto(%)</label>
                        <input <?PHP echo $disabled; ?> type="number" class="form-control" name="desconto" id="calc" type="text" placeholder="Desconto.." value="">
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
                            Produtos Adicionados
                           
                        </div>
                        
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <?php
                                 echo $botao;
                                ?>
                                    <thead>
                                        <tr>
                                            <th>Código Produto</th>
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
        
      $sql = "SELECT * FROM produtos WHERE status= 'estoque' AND produto_id = '$report_id'";
      $qr = mysql_query($sql) or die(mysql_error());
 while($ln = mysql_fetch_assoc($qr)){
 $valorr= $ln['valor_total'];
      $converte_valor = number_format($valorr,2,",",".");
$nome  = $ln['nome'];
                              $valor = $ln['valor_total'];
                                                            $total = str_replace(',','.', $valor);
                              $subtotal += $total;
                              $top = number_format($subtotal, 2, ',', '.');  
      echo "<tr>";
         echo "<td>".$ln['codigo']."</td>";
         echo "<td>".$ln['nome']."</td>";
         echo "<td>".$ln['tamanho']."</td>";
         echo "<td>".$ln['sexo']."</td>";
         echo "<td>".$ln['status']."</td>";
         echo "<td>R$ ".$converte_valor."<input type='hidden' name='produto_id[".$ln['produto_id']."]'' value='".$ln['produto_id']."'></td>";
         echo "</tr>";
      }      
     }
   echo '<tr style=" font-weight: bold; background-color: #eee;">     
                                    <td class="text-right" colspan="5">Sub Total</td>
                                    <td>R$ '.$top.'</td>
                                    <input type="hidden" name="sub_total" value="'.$top.'" />
                              
                              </tr>
                              <tr style="font-weight: bold;">     
                                    <td class="text-right" colspan="5">Desconto</td>
                                    <td>-</td>
                                    

                              </tr>
                              <tr style="font-weight: bold; background-color: #eee;">     
                                    <td class="text-right" colspan="5">Total</td>
                                    <td style="background-color: #eee;">-</td>
                                    <input type="hidden" name="valor_total" value="'.$top.'" />
                              </tr>
                              
                              
                              ';
                    
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
                  <input type="hidden" name="usuario_cadastro" value="usuario_cadastro">
                       <input type="hidden" id="venda_cadastro" name="venda_cadastro" value="venda_cadastro">
                     <button <?PHP echo $disabled; ?> style="float: right;" type="submit" class="btn btn-primary">Avançar<i style="margin-left: 10px;" class="fa fa-chevron-right"></i></button>
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
    
    function goBack() {
    window.history.back();
    }
    </script>

  </style>

</body>

</html>
