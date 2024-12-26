<?php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

   include("util.php");

   $conn = conecta();

   $linha = [ 'descricao'    => $_POST['descricao'],
              'valor'        => $_POST['valor'],
              'excluido'    => $_POST['excluido'] ];

   $sql = " insert into tbl_produto (descricao_produto,preco_produto,excluido_produto)  
            values (:descricao,:valor,:excluido) ";

   // prepara!
   $update = $conn->prepare($sql); 
   $update->execute($linha);

   // volta pra usuarios
   header('Location: index.php'); 