<?php

//produtos.php

    require('twig_carregar.php');
    
    require('models/Model.php');
    require('models/Produto.php');
    
    $usr = new produto();
    $produtos = $prdt->getAll(['ativo' => 1]);
    
    echo $twig->render('produtos.html', [ 'produtos' => $produtos, ]);

