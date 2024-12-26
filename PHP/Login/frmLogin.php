<?php
  // mostra erros do php
  ini_set ( 'display_errors' , 1); 
  error_reporting (E_ALL);   

  // se nao estiver conectado vai pedir o login
  if (isset($_SESSION['sessaoConectado'])) {
      $sessaoConectado = $_SESSION['sessaoConectado'];
  } else { 
    $sessaoConectado = false; 
  }

  // se sessao nao conectada ...
  if (!$sessaoConectado) { 
     
     $loginCookie = '';

     // recupera o valor do cookie com o usuario    
     if (isset($_COOKIE['loginCookie'])) {
        $loginCookie = $_COOKIE['loginCookie']; 
     }

     $stringLogin= "
     <!DOCTYPE html>
<html lang='pt-br'>
<head>
    <meta charset='UTF-8'>
    <title>Login</title>
    <link rel='stylesheet' type='text/cs'  href='css/style_css.css'>
    <link rel='stylesheet' type='text/css'  href='css/header.css'>
    <link rel='stylesheet' type='text/css'  href='css/login.css'>
</head>
<body>
    <a name='top'></a>  
    <div class='pai'>
    <!--Header-->
        <div class='menu'>
            <div class='logo'><img src='imagens/logoEdenLeaf.png'></div>
            <div class='home'><a href='home.html'><img src='imagens/casa.png'></div></a>
            <div class='barrinha'><a href='pesquisa.html'><img src='imagens/barra.png'></div></a>
            <div class='produtos'><a href='produtos.html'>Produtos</a></div>
            <div class='dev'><a href='desenvolvedores.html'>Devs</a></div>
            <div class='perfil'><a href='perfil.html'>Perfil</a></div>
            <div class='sobre'><a href='sobre.html'>Sobre</a></div>
            <div class='carrinho'><a href='carrinho.html'><img src='imagens/carrinho.png'></a></div>
            <div class='login'><a href='login.html'><img src='imagens/login.png'></a></div>
        </div>
    <!--Fim Header-->

    <center> 
        <div class='body'>
        <form method='post' action='LoginPHP.php'>
            <div class='logins'>
                <img class='usuario' alt='usuario' src='imagens/usuario.png' >
                <h1>Login</h1><br>
                <img alt='email'  src='imagens/usuario_nome.png'> &nbsp<input type='text' id='email' placeholder='Email' name='email_usuario'>
                <br><br>
                <img alt='senha'  src='imagens/usuario_senha.png'> &nbsp<input type='password' id='senha' placeholder='Senha' name='senha_usuario'>
                <br><br>
                <input type='checkbox'> &nbspLembrar-me &nbsp <a href='nova_senha.html'>Esqueceu a senha?</a>
                <br><br>
                <a href='LoginPHP.php'><button>Login</button></a>
                <br><br>
                ou
                <br><br>
                <a href='cadastro.html'>Cadastre-se</a>
            </div>
        </form>
    </div>
       
    </center>
        
    <!--Footer-->
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
                          <li><a href='produtos.html' title='Produtos'>Produtos Disponíveis</a></li>
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
    <!--Fim Header-->    
</body>
</html>
     ";
     echo $stringLogin;
  }
?>