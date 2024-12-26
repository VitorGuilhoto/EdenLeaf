<?php 
   // mostra erros do php
   ini_set ( 'display_errors' , 1); 
   error_reporting (E_ALL);   

   // inicia a sessao
   session_start(); 
   
   include("util.php");

   echo "<html>";   
   
   // seu css
   echo "<head>
         <link rel='stylesheet' type='text/css' 
          href='nome_do_seu_css.css'>
         <script></script> 
         </head>";

   echo "<body>";

   //include ('cabecalho.php');

   // faz conexao 
   $conn = conecta(); 
   
   /* 
   
    aqui vc coloca td que tera na homepage 
    
   */

  /////////////////////////////////////////////////////////////// 
  //////////GRIDE DE PRODUTOS 
  /////////////////////////////////////////////////////////////// 
  $select = $conn->query(" select * from tbl_produto
                           where excluido_produto!=true
                           order by descricao_produto ");

  $card = 0;
  echo "<table border='1'>";
  
  while ($linha = $select->fetch()) {
      $codigoProduto = $linha['cod_produto'];
      $descricao     = $linha['descricao_produto'];
      $valor         = $linha['preco_produto'];
  
      if ($card == 0) { // nova linha !!
          echo "<tr>";      
      } 

      $card++;
      echo "<td>
             <center> 
              <img src='imagens/$codigoProduto.jpg' width=50><br>
              <strong>$descricao</strong><br>
              <i>$valor</i><br>
              <a href='carrinho.php?operacao=incluir&codigoProduto=$codigoProduto'>Comprar</a>
             </center>
            </td>
            <tr> 
                <td> 
                <a href='formProdutos.php?codProduto=$codigoProduto'>Atualizar</a>
                <a href='excluirProduto.php?codProduto=$codigoProduto'>Excluir</a>
                </td>
            </tr>";

      if ($card == 4) { // fecha linha
          $card = 0;
          echo "</tr>"; 
      }
  }

  echo" <tr> 
            <td> 
            <a href='formProdutos.php'>Adicionar</a>
            </td>
        </tr>";

  echo "</table>";
 ////////////////////////////////////////////////////////////////////

  echo "</body></html>";
?>