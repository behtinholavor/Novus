<?php
include "config.php";   
if(isset($_POST['produto_cadastro']) && ($_POST['produto_cadastro'] == "produto_cadastro")) {
$nome = strtolower(trim($_POST['nome']));
$tamanho = trim($_POST['tamanho']);
$sexo = strtolower(trim($_POST['sexo']));
$status = strtolower(trim($_POST['status']));
$total = trim($_POST['total']); 
$cliente = trim($_POST['cliente']);
$loja = trim($_POST['loja']);
$codigo = $_POST['codigo'];
$usuarios_usuario_id  = $_POST['usuarios_usuario_id'];
$descricao = strtolower(trim($_POST['descricao']));

$total2 = $total;
$converte_tota = str_replace(",",".", $total2);
$cliente2 = $cliente;
$converte_cliente = str_replace(",",".", $cliente2);
$loja2 = $loja;
$converte_loja = str_replace(",",".", $loja2);
/* Vamos checar algum erro nos campos */

IF($total == 0.00){
$total = "-";
}ELSE{
$total = $total;
}

IF($cliente == 0.00){
$cliente = "-";
}ELSE{
$cliente = $cliente;
}
IF($loja == 0.00){
$loja = "-";
}ELSE{
$loja = $loja;
}

$sql = mysql_query(          

"INSERT INTO produtos
(produto_id, codigo, nome, tamanho, sexo, status, data_cadastro, descricao, usuarios_usuario_id, valor_total, valor_cliente, valor_loja, valor_original_total, valor_original_cliente, valor_original_loja)

VALUES
('', '$codigo', '$nome', '$tamanho', '$sexo', '$status', now(), '$descricao', '$usuarios_usuario_id', '$converte_tota', '$converte_cliente', '$converte_loja', '$converte_tota', '$converte_cliente', '$converte_loja')")

or die( mysql_error()

);  
$id = mysql_insert_id();
$sql2 = mysql_query(          

"INSERT INTO historico_produtos
(historico_produtos_id, data_cadastro, info, produtos_produto_id)

VALUES
('', now(), '$status', '$id')")

or die( mysql_error()

);        

if (!$sql){

echo"<script type='text/javascript'>
alert(' Não foi possível realizar o cadastro, contate o administrador.');
window.open=history.go(-1);
</script>";
                            
                 

}else{

echo"<script type='text/javascript'>
alert('Produto cadastrado com sucesso.');
window.open=history.go(-1);
</script>";


}



}

?>

