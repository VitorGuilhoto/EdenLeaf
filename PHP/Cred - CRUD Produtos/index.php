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
   <meta charset='UTF-8'>
   <title>Document</title>
   <link rel='stylesheet'
   type='text/css'
   href='produtosphp.css'>
    </head>";

   echo "<body>";
   // faz conexao 
   $conn = conecta(); 
   
   echo "<a name='top'></a>  
   <div class='pai'>
       <div class='menu'>
           <div class='logo'><img src='imagens/logoEdenLeaf.png'></div>
           <div class='home'><a href='home.html'><img src='imagens/casa.png'></div></a>
           <div class='barrinha'><a href='pesquisa.html'><img src='imagens/barra.png'></div></a>
           <div class='produtos'><a href='produtos.html'>Produtos</a></div>
           <div class='devs'><a href='desenvolvedores.html'>Devs</a></div>
           <div class='perfil'><a href='perfil.html'>Perfil</a></div>
           <div class='sobre'><a href='sobre.html'>Sobre</a></div>
           <div class='carrinho'><a href='carrinho.html'><img src='imagens/carrinho.png'></a></div>
           <div class='login'><a href='login.html'><img src='imagens/login.png'></a></div>
       </div>";

  /////////////////////////////////////////////////////////////// 
  //////////GRIDE DE PRODUTOS 
  /////////////////////////////////////////////////////////////// 
  $select = $conn->query(" select * from tbl_produto
                           where excluido_produto!=true
                           order by descricao_produto ");

  $card = 0;
  echo "<div class='principal'>
  <table border='1'>";
  
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
                <center>
                <a href='formProdutos.php?codProduto=$codigoProduto'><img src='alterar.png' width='50'></img></a>
                <a href='excluirProduto.php?codProduto=$codigoProduto'><img src='excluir.png' width='50'></img></a>
                </center>
                </td>
            </tr>";

      if ($card == 4) { // fecha linha
          $card = 0;
          echo "</tr>"; 
      }
  }

  echo" <tr> 
            <td> 
            <center>
            <a href='formProdutos.php'><img src='adicionar.png' width='50'></img></a>
            </center>
            </td>
        </tr>";

  echo "</table>
  </div>";


echo"<div class='banner'>
<div class='footer-arrow'>
    <svg data-name='Layer 1' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1200 120' preserveAspectRatio='none'>
        <path d='M649.97 0L550.03 0 599.91 54.12 649.97 0z' class='shape-fill'></path>
    </svg>
</div>

<footer class='main_footer container'>
    
    <div class='content'>
        
        <div class='colfooter'>
            
            <h4 class='titleFooter'> Navegação </h4>
            
            <ul>
            
              <li><a href='home.html' title='Home'>Página Inícial</a></li>
              <li><a href='produto.html' title='Produtos'>Produtos Disponíveis</a></li>
              <li><a href='perfil.html' title='Perfil'>Perfl do Usuário</a></li>
              <li><a href='sobre.html' title='Sobre'>Sobre a Empresa</a></li>
            
            </ul>
        
        </div>    
        
        <div class='colfooter'>
           
           <h4 class='titleFooter'>Contato</h4>
           <p><i class='icon icon-mail'></i> edenleaf1@gmail.com</p>
        
        </div>
        
        <div class='colfooter'>
           
            <a href='desenvolvedores.html'><h4 class='titleFooter'> Desenvolvedores</h4></a>
            
            <p><span> 26 - Rafael Said Jannini</span></p>            
            <p><span> 27 - Raphael Willians Fardin Júnior</span></p>            
            <p><span> 28 - Rodrigo Akira Mada</span></p>            
            <p><span> 29 - Sofia Ayumi Hirata Isozaki</span></p>  
            <p><span> 30 - Vitor Hugo Guilhoto</span></p>  
        
        </form>
        
        </div>
        
        <div class='clear'></div>
    
    </div>
    
    <div class='main_footer_copy'>
        
        <p class='m-b-footer'><a href= '#top'>Voltar ao topo</a> </p> 
    
    </div>
    </footer>
    </div>";
  echo "</body></html>";
?>