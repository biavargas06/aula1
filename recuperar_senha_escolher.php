<?php
require('twig_carregar.php');
require('pdo.inc.php');
$token = $_GET['token'] ?? false;

if(!$token) {
    header('location:login.php');
    die;
}

$sql = $pdo->prepare('SELECT * FROM usuarios WHERE recupera_token = ?');
$sql->execute([$token]);

if ($sql->rowCount() == 1){
    echo $twig->render('recupera_senha_escolher.html');
} else {
    header('location:login.php');
    die;
}