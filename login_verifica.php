<?php
require ('pdo.inc.php');
$user = $_POST['user'];
$pass = $_POST['pass'];

//Cria a consulta e aguarda os dados
$sql = $pdo->prepare('SELECT * FROM usuarios WHERE username = :usr AND ativo= 1 ');

//Adiciona os dados na consulta
$sql->bindParam(':usr', $user);

//Roda a consulta
$sql->execute();

//Se encontrou usuario
if ($sql->rowCount()){

   $user = $sql->fetch(PDO:: FETCH_OBJ);

   //Verificar se a senha está correta
   if(!password_verify($pass, $user->senha)){
      header('location:login.php?erro=4');
      die;
   }

   //Armazenar usuário
   session_start();
   $_SESSION['user'] = $user->nome;
   
    header('location:boasvindas.php');
    die;
 } else{
    header('location:login.php?erro=1');
    die;
 }
