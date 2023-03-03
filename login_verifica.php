<?php
$user = $_POST['user'];
$pass = $_POST['pass'];

if ($user == 'bianca' && $pass == '123'){

   session_start();
   $_SESSION['user'] = 'Bianca';
   
    header('location:boasvindas.php');
    die;
 } else{
    header('location:login.php?erro=1');
    die;
 }
