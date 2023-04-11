<?php
require('models/Model.php');
require('models/Usuario.php');

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

$usr = new Usuario();
$usr->create([
'nome' => $nome,
'email' => $email,
'username' => $user,
'senha' => $pass,
'admin' => $adm,
'ativo' => 1,
]);

header('location:usuarios.php');