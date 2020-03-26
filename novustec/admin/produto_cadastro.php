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
      
      $usuario_id = $_GET["usuarios_usuario_id"];
      $nome = $_GET["nome"];
      $sobrenome = $_GET["sobrenome"];
      
      $fornecedor = $nome." ".$sobrenome; 
      
      
      function uniqueAlfa($length=16)
      {
      $salt = "ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
      $len = strlen($salt);
      $pass = '';
      mt_srand(10000000*(double)microtime());
      for ($i = 0; $i < $length; $i++)
      {
        $pass .= $salt[mt_rand(0,$len - 1)];
      }
      return $pass;
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
                        Cadastrar Produto
                        <p style='float:right ; font-size: 11px; font-weight: bold;'>(Fornecedor: <?php echo $fornecedor; ?>)</p>
                     </h1>
                  </div>
                  <form name="profile" method="post" action="./funcoes/produto_add.php" role="form" autocomplete="false">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Código Produto</label>
                           <input class="form-control" name="codigo" id="codigo" type="text" placeholder="<?php echo uniqueAlfa(6); ?>" value="<?php echo uniqueAlfa(6); ?>"> 
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Nome*</label>
                           <input class="form-control" placeholder="Nome.." id="nome" name="nome" required="">  
                        </div>
                     </div>
                     <div class="col-lg-6">
<div class="form-group">
                           <label>Tamanho*</label>
                           <select class="form-control" name="tamanho" required="">
                              <option value="">Selecione</option>
                              <option value="RN">RN</option>
                              <option value="P">P</option>
                              <option value="M">M</option>
                              <option value="G">G</option>
                              <option value="GG">GG</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Sexo*</label> <br>
                           <label class="radio-inline">
                           <input type="radio" name="sexo" id="optionsRadiosInline1" value="unisex" checked="">Unisex
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="sexo" id="optionsRadiosInline2" value="feminino">Feminino
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="sexo" id="optionsRadiosInline3" value="masculino">Masculino
                           </label>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Status*</label>
                           <select class="form-control" name="status" required="">
                              <option value="">Selecione</option>
                              <option value="estoque">Estoque</option>
                              <option value="devolver">Devolver</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Preço Total*</label>
                           <input onblur="calcula_preco(this.id);" id="base-2" id="campo" class="form-control real" placeholder="Preço Total.." name="total" required="" >  
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Comissão Cliente*</label>
                           <input id="total-2" class="form-control real"  placeholder="Comição Cliente.." id="disabled_input2" name="cliente" >  
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group">
                           <label>Comissão Loja*</label>
                           <input id="totall-2" class="form-control real" placeholder="Comição Loja.." id="disabled_input3" name="loja">  
                        </div>
                     </div>
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Descrição</label>
                           <textarea class="form-control" rows="3" name="descricao"></textarea>  
                        </div>
                     </div>
                     <div style="margin-bottom:20px" class="col-lg-12">
                        <input type="hidden" name="produto_cadastro" value="produto_cadastro">
                        <input type="hidden" id="usuarios_usuario_id" name="usuarios_usuario_id" value="<?php echo $usuario_id; ?>">
                        <button type="submit" id="enviar" class="btn btn-primary">Cadastrar</button>
                        <button type="reset" class="btn btn-default">Limpar</button>
                        <div id=sucesso></div>
                     </div>
                  </form>
                  <div class="col-lg-12" style="margin: 20px 0 20px; border-bottom: 1px solid #eee;"></div>
                  <div class="col-lg-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           Últimos 15 produtos cadastrados:
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
                                       <th>Status</th>
                                       <th>Data de Cadastro</th>
                                       <th>Opções</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                       $sql = "SELECT produto_id, codigo, nome, sexo, status, date_format(`data_cadastro`,'%d/%m/%Y') as `data_formatada`, valor_total FROM produtos WHERE usuarios_usuario_id = '".$usuario_id."' ORDER BY data_cadastro DESC LIMIT 15";
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
                                               echo "<td>".$row["status"]."</td>";
                                               echo "<td>".$row["data_formatada"]."</td>";
                                               echo "<td style='text-align: center;'>
                                                <a title='Visualizar' href='produto_visualizar.php?produto_id=".$row["produto_id"]."&fornecedor=".$fornecedor."'><i style='margin-right: 5px; color: #3c763d;' class='fa fa-check-square fa-lg'></i></a>
                                               <a title='Editar' href='produto_editar.php?produto_id=".$row["produto_id"]."&fornecedor=".$fornecedor."'><i style='margin-right: 5px; color: #31708f;' class='fa fa-pencil-square fa-lg'></i></a>
                                               <a title='Remover' class='confirmation' href='./funcoes/produto_remove.php?produto_id=".$row["produto_id"]."'><i style='margin-right: 5px; color: #a94442;' class='fa fa-minus-square fa-lg'></i></a>
                                               </td>";
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
         $(document).ready(function() {    
         $(".real").maskMoney({decimal:",",thousands:"."});
         
         });
      </script>
      <script>
         $(document).ready(function() {
             $('#dataTables-example').DataTable({
                     responsive: true
             });
         });
      </script>
      <script type="text/javascript">
         $('.confirmation').on('click', function () {
             return confirm('Gostaria de remover?');
         });
         
            $(document).ready(function() {
         $('#disabled_input').attr('disabled','disabled');        
         $('select[name="status"]').on('change',function(){
         var  devolver = $(this).val();
             if(devolver == "devolver"){           
             $('#base-2').attr('disabled','disabled');        
             $('#total-2').attr('disabled','disabled');     
             $('#totall-2').attr('disabled','disabled');       
              }else{
              $('#base-2').removeAttr('disabled');
              $('#total-2').removeAttr('disabled');
              $('#totall-2').removeAttr('disabled');
             }  
         
           });
         });
         
         function number_format( number, decimals, dec_point, thousands_sep ) {
         var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
         var d = dec_point == undefined ? "," : dec_point;
         var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
         var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
         return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
         }
         
         function calcula_preco(id_input) { 	
         // pega o numero identificador dos campos de calculo	
         id = id_input.split('-')[1];	
         // transforma o valor base em uma string apropriada para calculo	
         base = $('#base-' + id).val().replace(".","").replace(",",".");	
         
         // calcula a diferenca entre o valor base menos o desconto 	
         total = parseFloat(base/2);	
         // coloca o valor total no input em formato da moeda real	
         $('#total-' + id).val(number_format(total, 2, ',', '.'));
         $('#totall-' + id).val(number_format(total, 2, ',', '.'));		
         }
      </script>
   </body>
</html>
