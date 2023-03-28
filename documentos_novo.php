<?php

require('twig_carregar.php');
require('func/sanitize_filename.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'&& !$_FILES['arquivo']['error']){

    $arquivo = sanitize_filename($_FILES['arquivo']['name']);

    move_uploaded_file($_FILES['arquivo']['tmp_name'], 'uploads/' . $arquivo);

}

echo $twig->render('documentos_novo.html');