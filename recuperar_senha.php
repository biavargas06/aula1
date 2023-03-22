<?php
require('twig_carregar.php');
require('pdo.inc.php');
require('mailer.inc.php');

//Msg de erro
$msg= '';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'] ?? false;

    $sql = $pdo->prepare('SELECT * FROM usuarios WHERE username = ?');
    $sql->execute([$username]);

    //se encontrou user
    if  ($sql->rowCount()){
        $usuario = $sql->fetch(PDO::FETCH_ASSOC);
        //rotina de recuperar senha
        $token = uniqid(null, true) . bin2hex(random_bytes(16));

        $sql = $pdo->prepare('UPDATE usuarios SET recupera_token = :token WHERE id= :id_usr');
        $sql->execute([
            ':token' => $token,
            ':id_usr' => $usuario['id'],
        ]);
        $msg = 'Vai lá olhar o teu e-mail';

        echo $twig->render('email_recupera_senha.html',[
            'token' => $token
        ]);

    } else {
      $msg = 'eita, o usuário não existe, seu burro!!';
    }
    }

echo $twig->render('recuperar_senha.html', ['msg' => $msg,]);