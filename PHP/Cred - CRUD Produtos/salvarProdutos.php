<?php
    ini_set ( 'display_errors' , 1); 
    error_reporting (E_ALL);

    include("util.php");

    $conn = conecta();

    $linha = ['cod_produto'  => $_POST['cod_produto'],
              'descricao'    => $_POST['descricao'],
              'valor'        => $_POST['valor'],
              'excluido'    => $_POST['excluido'] ];

    $sql = "update tbl_produto set 
             cod_produto      = :cod_produto, 
             descricao_produto        = :descricao,   
             preco_produto             = :valor,
             excluido_produto             = :excluido
           where cod_produto = :cod_produto "; 
    
    $update = $conn->prepare($sql); 
    $update->execute($linha);

    header('Location: index.php');  