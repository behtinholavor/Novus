<?php
include "config.php";   



    
if(isset($_POST['troca_cadastro']) && ($_POST['troca_cadastro'] == "troca_cadastro")) {
$codigo = trim($_POST['codigo']);
$ordem_venda_id = trim($_POST['ordem_venda_id']);
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$telefone = trim($_POST['telefone']);
$data_cadastro = trim($_POST['data_cadastro']);
$descricao = strtolower(trim($_POST['descricao']));
$valor_total = trim($_POST['valor_total']);
$desconto = trim($_POST['desconto']);
$subtotal = trim($_POST['subtotal']);
/* Vamos checar algum erro nos campos */
$total2 = $valor_total;
$converte_tota = str_replace(",",".", $total2);
$cliente2 = $subtotal;
$converte_subtotal = str_replace(",",".", $cliente2);


$sql = mysql_query(          

"INSERT INTO ordem_troca
(ordem_troca_id, ordem_venda_id, codigo, nome, sobrenome, valor_total, data_cadastro, telefone, descricao, subtotal, desconto)

VALUES
('', '$ordem_venda_id', '$codigo', '$nome', '$sobrenome', '$converte_tota', '$data_cadastro', '$telefone', '$descricao', '$converte_subtotal', '$desconto' )")

or die( mysql_error()

);     

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar o cadastro, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{


$id2 = mysql_insert_id();


  foreach($_POST['produto_id'] as $item)
  {
  echo $item;
  $sql2 = mysql_query(          

    "INSERT INTO troca_produtos
    (troca_produtos_id, ordem_troca_ordem_troca_id, produtos_produto_id, info)

    VALUES
    ('', '$id2', '$item', '')")

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
SET status='estoque', desconto='', valor_total = valor_original_total, valor_cliente = valor_original_cliente, valor_loja = valor_original_loja
WHERE produto_id='$item'")

  or die( mysql_error()

  );    
    $sql4 = mysql_query(          

    "INSERT INTO historico_produtos
    (historico_produtos_id, produtos_produto_id, data_cadastro, info)

    VALUES
    ('', '$item', '$data_cadastro', 'trocado')")

  or die( mysql_error()

  );    
  }
echo"<script type='text/javascript'>
alert('Troca cadastrada com sucesso.');
location.href='../troca_venda.php';
</script>";
}




}



}

?>

