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
$codigo = trim($_POST['codigo_venda']);
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$telefone = trim($_POST['telefone']);
$data_cadastro = trim($_POST['data_cadastro']);
$descricao = strtolower(trim($_POST['descricao']));
$desconto = trim($_POST['desconto']);

IF($desconto == ''){
$desconto = '0';
}ELSE{
$desconto = $desconto;
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
                        <h1 class="page-header">Ordem de Venda</h1> 
                      
                    </div>  
                    <div style="margin-bottom: 15px;" class="col-lg-12">  
                     <?php
                        echo $mensagem;
                       ?>   
                       </div>
                     <div class="col-lg-12">
                     <form id="venda" name="venda" method="post" action="./funcoes/venda_add.php" role="form" autocomplete="false">
                     <div class="form-group">
                        <label>Código Venda*</label>
                        <input readonly class="form-control" name="codigo_venda" id="codigo" type="text" placeholder="" value="<?php echo $codigo; ?>" required=""> 
                     </div>
                  </div>
                      
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nome*</label>
                        <input readonly class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?php echo $nome; ?>" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Sobrenome*</label>
                        <input readonly class="form-control" placeholder="Sobrenome.." name="sobrenome"required="" value="<?php echo $sobrenome; ?>">  
                     </div>
                  </div>     
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone*</label>
                        <input readonly id="telefone" class="form-control" placeholder="Telefone.." name="telefone" value="<?php echo $telefone; ?>" required="">  
                     </div>
                  </div> 
                      <div class="col-lg-3">
                     <div class="form-group">
                        <label>Data*</label>
                        <input readonly type="date" class="form-control" name="data_cadastro" id="data_cadastro" type="text" placeholder="Data.." value="<?php echo $data_cadastro; ?>" required=""> 
                     </div>
                  </div> 
                 
                  <div class="col-lg-3">
                     <div class="form-group">
                        <label>Desconto(%)</label>
                        <input readonly type="number" class="form-control" name="desconto" id="calc" type="text" placeholder="Desconto.." value="<?php echo $desconto; ?>" required="">
                     </div>
                     </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea readonly class="form-control" rows="3" name="descricao" ><?php echo $descricao; ?></textarea>  
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
                     if(!empty($_POST['produto_id'])){
     foreach($_POST['produto_id'] as $report_id){
        
      $sql = "SELECT * FROM produtos WHERE status= 'estoque' AND produto_id = '$report_id'";
      $qr = mysql_query($sql) or die(mysql_error());
 while($ln = mysql_fetch_assoc($qr)){
  $valorr= $ln['valor_total'];
      $converte_valor = number_format($valorr,2,",",".");
$nome  = $ln['nome'];
                              $valor = $ln['valor_total'];
                                                            $total = str_replace(',','.', $valor);
                              $subtotal += $total;
                              $desconto_final = (100-$desconto)/100;
                              $resultado_desconto = $subtotal*$desconto_final;
                              $resultado_desconto2 = number_format($resultado_desconto, 2, ',', '');
                              $top = number_format($subtotal, 2, ',', '.');
      echo "<tr>";
         echo "<td>".$ln['codigo']."</td>";
         echo "<td>".$ln['nome']."</td>";
         echo "<td>".$ln['tamanho']."</td>";
         echo "<td>".$ln['sexo']."</td>";
         echo "<td>".$ln['status']."</td>";
         echo "<td>R$ ".$converte_valor."<input type='hidden' name='produto_id[".$ln['produto_id']."]'' value='".$ln['produto_id']."'>
         <input type='hidden' name='valor_original[".$ln['valor_total']."]'' value='".$ln['valor_total']."'>
         </td>";
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
                                    <td>'.$desconto.'%</td>
                                    <input type="hidden" name="desconto" value="'.$desconto.'" />

                              </tr>
                              <tr style="font-weight: bold; background-color: #eee;">     
                                    <td class="text-right" colspan="5">Total</td>
                                    <td style="background-color: #eee;">R$ '.$resultado_desconto2.'</td>
                                    <input type="hidden" name="valor_total" value="'.$resultado_desconto2.'" />
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
                  <input type="hidden" id="venda_cadastro" name="venda_cadastro" value="venda_cadastro">
                     <button style="float: right;" type="submit" class="btn btn-success">Concluir<i style="margin-left: 10px;" class="fa fa-check"></i></button>
                      <button style="float: left;" href="#" onclick="history.go(-1);return false;" class="btn btn-primary"><i style="margin-right: 10px;" class="fa fa-chevron-left"></i>Retonar</button>
  
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

function doSomething() {
    alert( 'you clicked on the link' );
    return true;
}
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
