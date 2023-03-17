<?php

require('verifica_login.php');
require('twig_carregar.php');
require('pdo.inc.php');

$sql = $pdo->query('SELECT * FROM usuarios WHERE ativo = 1');
$usuarios = $sql->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('usuarios.html', [ 'usuarios' => $usuarios, ]);