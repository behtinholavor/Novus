<?php
include "config.php";   



    
if(isset($_POST['pagamento_cadastro']) && ($_POST['pagamento_cadastro'] == "pagamento_cadastro")) {
$codigo = trim($_POST['codigo']);
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$data_cadastro = trim($_POST['data_cadastro']);
$descricao = strtolower(trim($_POST['descricao']));
$valor_total = trim($_POST['valor_totall']);
$usuario_id = $_POST["usuario_id"];
/* Vamos checar algum erro nos campos */

$total = $valor_total;
$converte_tota = str_replace(",",".", $total);

$sql = mysql_query(          

"INSERT INTO ordem_pagamentos
(pagamento_id, usuarios_usuario_id, codigo_pagamento, nome, sobrenome, valor_total, data_cadastro, descricao, tipo)

VALUES
('', '$usuario_id', '$codigo', '$nome', '$sobrenome', '$converte_tota', '$data_cadastro', '$descricao', 'pagamento')")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar o cadastro, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{


$id = mysql_insert_id();


  foreach($_POST['produto_id'] as $item)
  {
  $sql2 = mysql_query(          

    "INSERT INTO pagamento_produtos
    (pagamento_produtos_id, produtos_produto_id, ordem_pagamentos_id)

    VALUES
    ('', '$item', '$id')")

  or die( mysql_error()

  );       
  }

if (!$sql2){
 echo "ERRO";
}ELSE{

 foreach($_POST['produto_id'] as $item)
  {
  $sql3 = mysql_query(          

    "UPDATE produtos
SET pagamento = '1', status = 'pago'
WHERE produto_id='$item' ")

  or die( mysql_error()

  );    
    $sql4 = mysql_query(          

    "INSERT INTO historico_produtos
    (historico_produtos_id, produtos_produto_id, data_cadastro, info)

    VALUES
    ('', '$item', '$data_cadastro', 'pago')")

  or die( mysql_error()

  );  
    
  }

  

  
  
  
  
  
  
  
  
  
echo"<script type='text/javascript'>
alert('Pagamento cadastrado com sucesso.');
location.href='../pagamento_cliente.php';
</script>";
}




}



}

?>

