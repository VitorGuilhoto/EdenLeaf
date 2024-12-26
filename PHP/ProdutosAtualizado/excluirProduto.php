<?php 
   // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);

   include("util.php");
   
   // pra nao ter que em todo arquivo colocar a mesma linha de conexao
   // manda vazio e no util.php deixa fixa 
   $conn = conecta();

   // nem precisava testar pq a unica forma de chegar aqui 
   // eh no link excluir
   
       $linha = [ 'codProduto' => $_GET['codProduto'] ];
       $codProduto = $_GET['codProduto']; 

       $sql = " update tbl_produto set excluido_produto = true
                where cod_produto =:codProduto"; 

       // prepara!
       $update = $conn->prepare($sql); 
       $update->execute($linha);
   

   // volta pra home 
   header('Location: crudprodutos.php');     

?>