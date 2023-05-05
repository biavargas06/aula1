<?php
require('models/Model.php');
require('models/Produto.php');

$produto = $_POST['produto'] ?? false;
$preco = $_POST['preco'] ?? false;


if(!$produto || !$preco){
    header('location:cadastro_produto.php');
    die;
}


$prdt = new Produto();
$prdt->create([
'produto' => $produto,
'preco' => $preco,
]);

header('location:produtos.php');