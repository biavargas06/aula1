<?php
require('pdo.inc.php');

$nome = $_POST['nome'] ?? false;
$email = $_POST['email'] ?? false;
$user = $_POST['user'] ?? false;
$pass = $_POST['pass'] ?? false;
$adm = isset ($_POST['adm']);

if(!$nome || !$email || !$user|| !$pass){
    header('location:novo_usuario.php');
    die;
}

$pass = password_hash($pass, PASSWORD_BCRYPT);
$sql = $pdo->prepare('INSERT INTO usuarios (nome, email, username, senha, admin, ativo) VALUES (:nome, :email, :user, :pass, :adm, 1)');
$sql->bindParam(':nome', $nome);
$sql->bindParam(':email', $email);
$sql->bindParam(':user', $user);
$sql->bindParam(':pass', $pass);
$sql->bindParam(':adm', $adm);


$sql->execute();