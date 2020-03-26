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
 $ordem_venda_id = $_POST['ordem_venda_id'];
 $codigo_venda= $_POST['codigo_venda'];
$codigo = trim($_POST['codigo']);
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$telefone = trim($_POST['telefone']);
$data_cadastro = trim($_POST['data_cadastro']);
$descricao = strtolower(trim($_POST['descricao']));
 session_start();
 

      if(!isset($_SESSION['carrinho2'])){
         $_SESSION['carrinho2'] = array();   
      }
       
      //adiciona produto
       
      if(isset($_GET['acao'])){
          
         //ADICIONAR CARRINHO
         if($_GET['acao'] == 'add'){
            $id = intval($_GET['id']);
            if(!isset($_SESSION['carrinho2'][$id])){
               $_SESSION['carrinho2'][$id] = 1;
               
            }else{
               echo "Produto já foi adicionado!";
            }
         }
          
         //REMOVER CARRINHO
         if($_GET['acao'] == 'del'){
            $id = intval($_GET['id']);
            if(isset($_SESSION['carrinho2'][$id])){
               unset($_SESSION['carrinho2'][$id]);
            }
         }
          
         //ALTERAR QUANTIDADE
         if($_GET['acao'] == 'up'){
            if(is_array($_POST['prod'])){
               foreach($_POST['prod'] as $id => $qtd){
                  $id  = intval($id);
                  $qtd = intval($qtd);
                  if(!empty($qtd) || $qtd <> 0){
                     $_SESSION['carrinho2'][$id] = $qtd;
                  }else{
                     unset($_SESSION['carrinho2'][$id]);
                  }
               }
            }
         }
       
      }
       if(count($_SESSION['carrinho2']) == 0){
                        $mensagem = "<div class='alert alert-danger'>
                                Adicione ao menos um produto!.
                            </div>";
                        $disabled = "disabled";
                     }else{
                      $disabled = "";
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
                        <h1 class="page-header">Cadastrar Troca<p style='float:right ; font-size: 11px; font-weight: bold;'>(Ordem de Venda: <?php echo $codigo_venda; ?>)</p></h1> 
                      
                    </div>  
                    <div style="margin-bottom: 15px;" class="col-lg-12">    
                       </div>
                       <form id="venda" name="venda" method="post" action="./funcoes/troca_add.php" role="form" autocomplete="false">
                     <div class="col-lg-12">
                     <div class="form-group">
                        <label>Código Troca*</label>
                        <input readonly class="form-control" name="codigo" id="codigo" type="text" placeholder="" value="<?php echo $codigo; ?>" required=""> 
                     </div>
                  </div>
                      
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nome*</label>
                        <input readonly class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?PHP echo $nome; ?>" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Sobrenome*</label>
                        <input readonly class="form-control" placeholder="Sobrenome.." name="sobrenome"required="" value="<?PHP echo $sobrenome; ?>">  
                     </div>
                  </div>     
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone*</label>
                        <input readonly id="telefone" class="form-control" placeholder="Telefone.." name="telefone" required="" value="<?PHP echo $telefone; ?>">  
                     </div>
                  </div> 
                                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Data*</label>
                        <input readonly type="date" class="form-control" name="data_cadastro" id="data_cadastro" type="text" placeholder="Data.." value="<?php echo $data_cadastro; ?>" required="" > 
                     </div>
                  </div>  
             
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea readonly class="form-control" rows="3" name="descricao"><?php echo $descricao; ?></textarea>  
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
                              
                                    <thead>
                                        <tr>
                                            <th>Codigo</th>
                                            <th>Nome</th>
                                            <th>Tamanho</th>
                                            <th>Sexo</th>
                                            <th>Status</th>
                                            <th>Valor</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                   <?php
                     if(count($_SESSION['carrinho2']) == 0){
                        echo '<tr><td colspan="5">Não há produtos selecionados.</td></tr>';
                        $disabled = "disabled";
                     }else{
                        require("./funcoes/config.php");
                                                               $total = 0;
                        foreach($_SESSION['carrinho2'] as $id => $qtd){
                              $sql   = "SELECT * FROM produtos WHERE produto_id= '$id'";
                              $qr    = mysql_query($sql) or die(mysql_error());
                              $ln    = mysql_fetch_assoc($qr);
                              $disabled = ""; 
                              $nome  = $ln['nome'];
                              $valor = $ln['valor_total'];
                                                            $total = str_replace(',','.', $valor);
                              $subtotal += $total;
                              $top = number_format($subtotal, 2, ',', '.');  
                           echo '<tr> 
                                 <td>'.$ln['codigo'].'</td>
                                 <td>'.$nome.'</td>
                                 <td>'.$ln['tamanho'].'</td>
                                 <td>'.$ln['sexo'].'</td> 
                                 <td>'.$ln['status'].'</td>
                                 <td>R$ '.$ln['valor_total'].'</td>
                                 <td class="text-center"><a disabled class=" btn btn-danger" href="?acao=del&id='.$id.'&ordem_venda_id='.$ordem_venda_id.'">Remover</a></td>
                              </tr><input type="hidden" name="produto_id['.$id.']" value="'.$id.'">';
                              
                        }

                           echo '<tr>
                                    <td colspan="5">Total</td>
                                    <td>R$ '.$top.'</td>
                                    <input type="hidden" name="valor_total" value="R$ '.$top.'" />
                                    <td></td>
                              </tr>';
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
                  <input type="hidden" name="ordem_venda_id" value="<?PHP echo $ordem_venda_id; ?>">     
                    <button style="float: right;" type="submit" class="btn btn-primary">Concluir<i style="margin-left: 10px;" class="fa fa-check"></i></button>
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
