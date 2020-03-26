<?php
include "config.php";   



    
if(isset($_POST['venda_cadastro']) && ($_POST['venda_cadastro'] == "venda_cadastro")) {
$codigo = trim($_POST['codigo_venda']);
$nome = strtolower(trim($_POST['nome']));
$sobrenome = strtolower(trim($_POST['sobrenome']));
$telefone = trim($_POST['telefone']);
$data_cadastro = trim($_POST['data_cadastro']);
$descricao = strtolower(trim($_POST['descricao']));
$valor_total = trim($_POST['valor_total']);
$sub_total = trim($_POST['sub_total']);
$desconto = trim($_POST['desconto']);
$valor_original = trim($_POST['valor_original']);
/* Vamos checar algum erro nos campos */

$total2 = $valor_total;
$converte_tota = str_replace(",",".", $total2);
$cliente2 = $sub_total;
$converte_cliente = str_replace(",",".", $cliente2);

                              $desconto_final = (100-$desconto)/100;
                              $resultado_desconto = $sub_total*$desconto_final;
                              $resultado_desconto2 = number_format($resultado_desconto, 2, ',', '.');
                              $resultado_desconto3 = number_format($valor_original, 2, ',', '.');

$sql = mysql_query(          

"INSERT INTO ordem_venda
(ordem_venda_id, codigo_venda, nome, sobrenome, telefone, valor_total, data_cadastro, descricao, desconto, subtotal)

VALUES
('', '$codigo', '$nome', '$sobrenome', '$telefone', '$converte_tota', '$data_cadastro', '$descricao', '$desconto', '$converte_cliente')")

or die( mysql_error()

);     
$id = mysql_insert_id();
if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar o cadastro, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{




  foreach($_POST['produto_id'] as $item)
  {    
  $sql2 = mysql_query(          

    "INSERT INTO venda_produtos
    (venda_produtos_id, produtos_produto_id, ordem_venda_ordem_venda_id)

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
SET status='vendido', desconto='$desconto', valor_total = FORMAT(valor_total * ((100-$desconto)/100), 2), valor_cliente = valor_cliente * ((100-$desconto)/100), valor_loja = ROUND(valor_loja * ((100-$desconto)/100), 2)
WHERE produto_id='$item'")

  or die( mysql_error()

  );  
    
    $sql4 = mysql_query(          

    "INSERT INTO historico_produtos
    (historico_produtos_id, produtos_produto_id, data_cadastro, info)

    VALUES
    ('', '$item', '$data_cadastro', 'vendido')")

  or die( mysql_error()

  ); 
 
  }
echo"<script type='text/javascript'>
alert('Venda cadastrada com sucesso.');
location.href='../venda_sessao.php';
</script>";
}




}



}

?>

