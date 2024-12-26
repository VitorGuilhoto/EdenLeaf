<?php

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    session_start();

    include ("util.php");

    $conn = conecta();

    echo"
    <!DOCTYPE html>
    <html lang='pt-br'>
    <head>
        <title>Catálogo</title>        
        <link rel='stylesheet' type='text/css' href='css/header.css'>
        <link rel='stylesheet' type='text/css' href='css/catalogo_e-commerce.css'>
    </head>
    <body>
        <a name='top'></a>  
        <div class='pai'>
        <!--Header-->
        <div class='menu'>
            <div class='logo'><img src='imagens/logoEdenLeaf.png'></div>
            <div class='home'><a href='home.html'><img src='imagens/casa.png'></div></a>
            <div class='barrinha'><a href='pesquisa.html'><img src='imagens/barra.png'></div></a>
            <div class='produtos'><a href='produtos.php'>Produtos</a></div>
            <div class='devs'><a href='desenvolvedores.html'>Devs</a></div>
            <div class='perfil'><a href='perfil.html'>Perfil</a></div>
            <div class='sobre'><a href='sobre.html'>Sobre</a></div>
            <div class='carrinho'><a href='carrinho.php'><img src='imagens/carrinho.png'></a></div>
            <div class='login'><a href='login.html'><img src='imagens/login.png'></a></div>
        </div>
    <!--Fim Header-->
    <br><br><br><br><br>

        <div class='divmaior'>
            <br><br><br>";

    $sql = " select cod_produto,
                    nome_produto,
                    descricao_produto, 
                    preco_produto
            from tbl_produto 
            where excluido_produto=false";
    
    $select = $conn->query($sql);

    while ( $linha = $select->fetch() ) {      
        $codigo       = $linha['cod_produto'];
        $nome         = $linha['nome_produto'];
        $desc         = $linha['descricao_produto'];
        $preco        = $linha['preco_produto'];

        echo" 
        <div class='produto1'>
            <img src='imagens/Rectangle_35.jpg'> 
            <div class='p1'><pre>R$$preco                    <strong>$nome</strong></pre></div>
            <div class='p3'>$desc</div>
            <a href='carrinho.php?operacao=incluir&codigoProduto=$codigo'><img src='imagens/Carrinho.jpg' id='img2'></img></a>
        </div>

        <br><br><br>";
    }
    
    echo"
        </div>
            
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
            <!--Fim Footer-->
        </div>
    </body>
    </html>";

?>