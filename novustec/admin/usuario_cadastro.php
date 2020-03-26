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
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Cadastrar Usuário</h1><?php echo $msg; ?>      
                    </div>  
           
                    <form name="profile" method="post" action="./funcoes/usuario_add.php" id="profile" role="form" autocomplete="false">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nome*</label>
                        <input class="form-control" placeholder="Nome.." name="nome" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Sobrenome*</label>
                        <input class="form-control" placeholder="Sobrenome.." name="sobrenome" required="">  
                     </div>
                  </div>      
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>E-mail*</label>
                        <input  class="form-control" placeholder="E-mail.." id="email" name="email" type="email" required=""> 
                        <div id="resultado"></div>    
                     </div>
                     
                  </div>
                                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Senha*</label>
                        <input class="form-control" placeholder="Senha.." name="senha" type="password" required="">  
                     </div>
                  </div>
                                    <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone*</label>
                        <input class="form-control" name="telefone" id="telefone" placeholder="Telefone.." required="">  
                     </div>
                  </div>
                                                      <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nivel Usuário*</label>
                        <select class="form-control" name="nivel" required="">
                        <option value="">Selecione</option>
                                                <option value="1">Fornecedor</option>
                                                <option value="2">Administrador</option>
                                            </select>
                     </div>
                  </div>
                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea class="form-control" rows="3" name="descricao"></textarea>  
                     </div>
                  </div>
                  <div style="margin-bottom:20px" class="col-lg-12">
                  <input type="hidden" name="usuario_cadastro" value="usuario_cadastro">
                     <button type="submit" class="btn btn-primary">Cadastrar</button>
                     <button type="reset" class="btn btn-default">Limpar</button>
                  </div>
                
               </form>
                                   <div class='col-lg-12'>

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

<script>
$(document).ready(function($){
    $("#telefone").mask("(99) 9999-99999"); 
});
</script>
<script type="text/javascript">
$(function(){ // declaro o início do jquery
$("input[name='email']").on('blur', function(){
  var email = $(this).val();
  $.get('./funcoes/usuario_verifica.php?email=' + email, function(data){
    $('#resultado').html(data);
  });
});
});// fim do jquery


</script>


</body>

</html>
