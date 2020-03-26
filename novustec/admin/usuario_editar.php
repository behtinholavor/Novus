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

$usuario_id = $_GET['usuario_id'];
$total = $_GET['total'];
                                   

$result = mysql_query("SELECT usuario_id, DATE_FORMAT(data_cadastro, '%d/%m/%Y') AS data, nome, sobrenome, email, senha, telefone, nivel_usuario, descricao FROM usuarios WHERE usuario_id = '$usuario_id'");
if (!$result) {
    echo 'Não foi possível executar a consulta: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

$nivel =   $row[7];
IF($nivel == 1){
$resposta = "selected";
}
IF($nivel == 2){
$resposta2 = "selected";
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
                        <h1 class="page-header">Editar Usuário<p style='float:right ; font-size: 11px; font-weight: bold;'>(Total de produtos: <?php echo $total; ?>)</p></h1>     
                    </div>  
           
                    <form name="profile" method="post" action="./funcoes/usuario_edit.php" role="form" autocomplete="false">     
                     <div class="col-lg-6">
                     <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="id" id="id" type="text" value="<?php echo $row[0]; ?>" disabled> 
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Data de Cadastro</label>
                        <input class="form-control" placeholder="Tamanho.." name="data_cadastro" value="<?php echo $row[1]; ?>" required="" disabled>  
                     </div>
                  </div>    
                      
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nome</label>
                        <input class="form-control" placeholder="Nome.." id="nome" name="nome" value="<?php echo $row[2]; ?>" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Sobrenome</label>
                        <input class="form-control" placeholder="Sobrenome.." name="sobrenome" value="<?php echo $row[3]; ?>" required="">  
                     </div>
                  </div>  
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>E-mail</label>
                        <input class="form-control" placeholder="E-mail.." name="email" value="<?php echo $row[4]; ?>" required="">  
                     </div>
                  </div>  
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Senha</label>
                        <input class="form-control" placeholder="Senha.." name="senha" type="password" value="<?php echo $row[5]; ?>" required="">  
                     </div>
                  </div>        
                                <div class="col-lg-6">
                     <div class="form-group">
                        <label>Telefone</label>
                        <input class="form-control" placeholder="Telefone.." name="telefone" id="telefone" value="<?php echo $row[6]; ?>" required="">  
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Nivel Usuário*</label>
                        <select class="form-control" name="nivel" required="">
                        <option value="">Selecione</option>
                                                <option value="1" <?php echo $resposta; ?>>Fornecedor</option>
                                                <option value="2" <?php echo $resposta2; ?>>Administrador</option>
                                            </select>
                     </div>
                  </div>
                  

                  <div class="col-lg-12">
                     <div class="form-group">
                        <label>Descrição</label>
                        <textarea placeholder="Descrição.." class="form-control" rows="3" name="descricao"><?php echo $row[8]; ?></textarea>  
                     </div>
                  </div>
                  <div style="margin-bottom:20px" class="col-lg-12">
                  <input type="hidden" name="usuario_editar" value="usuario_editar">
                  <input type="hidden" id="usuarios_usuario_id" name="usuarios_usuario_id" value="<?php echo $usuario_id; ?>">
                     <button type="submit" id="enviar" class="btn btn-success">Editar</button>
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
$(document).ready(function($){
    $("#telefone").mask("(99) 9999-99999"); 
});
</script>

<script>
  function goBack() {
    window.history.go(-1);
  }
</script>



  </style>

</body>

</html>
