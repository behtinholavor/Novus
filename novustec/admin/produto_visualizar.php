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
      
      $produto_id = $_GET['produto_id'];
      $fornecedor = $_GET['fornecedor'];
                                        
      
      $result = mysql_query("SELECT * FROM produtos WHERE produto_id = '$produto_id'");
      if (!$result) {
         echo 'Não foi possível executar a consulta: ' . mysql_error();
         exit;
      }
      $row = mysql_fetch_row($result);
      
               $valor= $row[8];
           $converte_valor = number_format($valor,2,",",".");
                     $valor2= $row[9];
           $converte_valor2 = number_format($valor2,2,",",".");
                     $valor3= $row[10];
           $converte_valor3 = number_format($valor3,2,",",".");
      
      $status =   $row[5];
      $sexo =   $row[4];
      
      if ($status == estoque){
      $check1 = "selected";
      }ELSE{
      $check1 = "";
      }
      
      if ($status == vendido){
      $check2 = "selected";
      }ELSE{
      $check2 = "";
      }
      
      if ($status == devolver){
      $check3 = "selected";
      }ELSE{
      $check3 = "";
      }
      
      if ($sexo == unisex){
      $sexo1 = "checked";
      }ELSE{
      $sexo1 = "";
      }
      if ($sexo == feminino){
      $sexo2 = "checked";
      }ELSE{
      $sexo2 = "";
      }
      if ($sexo == masculino){
      $sexo3 = "checked";
      }ELSE{
      $sexo3 = "";
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
                     <h1 class="page-header">
                        Visualizar Produto
                        <p style='float:right ; font-size: 11px; font-weight: bold;'>(Fornecedor: <?php echo $fornecedor; ?>)</p>
                     </h1>
                  </div>
                  <form name="profile" method="post" action="./funcoes/produto_edit.php" role="form" autocomplete="false">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Código Produto</label>
                           <input class="form-control" name="codigo" id="codigo" type="text" value="<?php echo $row[1]; ?>" disabled> 
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Nome*</label>
                           <input class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?php echo $row[2]; ?>" required="" disabled>  
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Tamanho*</label>
                           <input class="form-control" placeholder="Tamanho.." name="tamanho" type="text" value="<?php echo $row[3]; ?>" required="" disabled>  
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Sexo*</label> <br>
                           <label class="radio-inline">
                           <input type="radio" name="sexo" id="optionsRadiosInline1" value="unisex" <?PHP echo $sexo1; ?> disabled>Unisex
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="sexo" id="optionsRadiosInline2" value="feminino" <?PHP echo $sexo2; ?> disabled>Feminino
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="sexo" id="optionsRadiosInline3" value="masculino" <?PHP echo $sexo3; ?> disabled>Masculino
                           </label>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Status*</label>
                           <select class="form-control" name="status" required="" disabled>
                              <option value="0" >Selecione</option>
                              <option value="estoque" <?PHP echo $check1; ?>>Estoque</option>
                              <option value="vendido" <?PHP echo $check2; ?>>Vendido</option>
                              <option value="devolver" <?PHP echo $check3; ?>>Devolver</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Preço Total*</label>
                           <input class="form-control" placeholder="Preço Total.." id="total" name="total" value="<?php echo $converte_valor; ?>" required="" data-prefix="R$ " data-thousands="." data-decimal="," disabled>  
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Comição Cliente*</label>
                           <input class="form-control" placeholder="Comição Cliente.." id="cliente" name="cliente" value="<?php echo $converte_valor2; ?>" required="" data-prefix="R$ " data-thousands="." data-decimal="," disabled>  
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Comição Loja*</label>
                           <input class="form-control" placeholder="Comição Loja.." id="loja" name="loja" required="" value="<?php echo $converte_valor3; ?>" data-prefix="R$ " data-thousands="." data-decimal="," disabled>  
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Descrição</label>
                           <textarea class="form-control" rows="3" name="descricao" disabled><?php echo $row[12]; ?></textarea>  
                        </div>
                     </div>
                     <div style="margin-bottom:20px" class="col-lg-12">
                        <input type="hidden" name="produto_cadastro" value="produto_cadastro">
                        <input type="hidden" id="usuarios_usuario_id" name="usuarios_usuario_id" value="<?php echo $usuario_id; ?>">
                        <button disabled type="submit" id="enviar" class="btn btn-success">Editar</button>
                        <button onclick="goBack()" type="return" class="btn btn-info">Voltar</button>
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
