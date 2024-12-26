<?php
    ini_set ( 'display_errors' , 1); 
    error_reporting (E_ALL);

    include("util.php");

    $conn = conecta();

    if (isset($_GET['codProduto'])) {
        $codProduto = $_GET['codProduto']; 
    } else {
        $codProduto = ""; 
    }

    if ($codProduto <> "") {
      
        $sql = "select * from tbl_produto 
                where cod_produto=$codProduto";
        
        // faz um select basico
        $select = $conn->query($sql)->fetch();
  
        $IncluiOuAtualiza = "salvarProdutos.php";
  
        $varCod       = $select['cod_produto'];
        $varNome      = $select['nome_produto'];
        $varDescricao = $select['descricao_produto'];
        $varValor     = $select['preco_produto'];
        $varExcluido     = $select['excluido_produto'];
    }

    else {

        $IncluiOuAtualiza = "IncluirProdutos.php";
  
        $varCod       = "";
        $varNome      = "";
        $varDescricao = "";
        $varValor     = "";
        $varExcluido     = "";
  
    }

    $varHTML = "
    <html><head>
    <meta charset='UTF-8'>
    <title>Form Produtos</title>
    <link rel='stylesheet'
    type='text/css'
    href='formproduto.css'>
  <link rel='stylesheet' type='text/css' href='css/header.css'>
     </head>
     <body>
     <a name='top'></a>  
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
      </div>
      <div class='principal'><center>
       <form action='".$IncluiOuAtualiza."' method='post'>
         <input type='hidden'  name='cod_produto'   value = '$varCod'>
         <br>Nome<br>
         <input type='text'    name='nome'     value = '$varNome'>
         <br><br>Descrição<br>
         <input type='text'    name='descricao'     value = '$varDescricao'>
         <br><br>Valor<br>
         <input type='text'    name='valor'         value = '$varValor'>
         <br><br>Excluído<br>
         <input type='text'    name='excluido'         value = '$varExcluido'><br><br>
         <input class='enviar'type='submit' value='Salvar'>
       </form></center>
       </div>
       <div class='banner'>
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
   </div>
   </body>
   </html>
     ";
     
   echo $varHTML;
   
?>
