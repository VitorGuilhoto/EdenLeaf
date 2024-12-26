<!DOCTYPE html>
<html lang="pt-br">
<?php session_start()?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="shortcut icon" href="./imagem/favicon.ico" type="image/x-icon">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    <title>Miçangato - Home</title>
</head>

<body>
    <div class="fixada">
        <div class="logo"><a href="index.php"><img src="imagem/logo_cor.svg" width="90"></a></div>

        <div class="btns">

            <a class="btnSelecionado" href="index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a class="btnTopo" href="./venda/selecao_produtos_front.php">Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        
            <?php
                if(isset($_SESSION['isadm']) && $_SESSION['isadm'] == 't')
                {
                    echo "<a class='btnTopo' href='./cadastros/cad_pesq_produtos_front.php'>Cad. Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<a class='btnTopo' href='./cadastros/cad_pesq_usuarios_front.php'>Cad. Pessoas</a>";
                }
                else
                {
                    echo "<a class='btnTopo' href='estatistica.php'>Estatisticas</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    echo "<a class='btnTopo' href='devs.php'>Devs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
            ?>
            
        </div>
            <div class='icones'>
                <?php
                    if (isset($_SESSION['usuariologado']))
                    {
                        echo "<a href='./login/logoff_back.php' title='Logoff'> <span class='material-symbols-outlined'>logout</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                    else
                    {
                        echo "<a class='btnTopo' href='./login/login_front.php' title='Login / Cadastro'><i
                        class='fa-solid fa-user'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                ?>
                    
                <a class='btnTopo' href='./venda/carrinho_front.php' title='Carrinho'><i class='fa-solid fa-cart-shopping'></i></a>&nbsp;
        </div>
    </div>

    <!-- <div class="costas_slides"> -->

    

    <!-- <div class="body5">
        <h1 class="indice">Homepage</h1>    
    </div> -->
    <div class="body"> <!-- body do carrossel -->
        
    

    <div class="slider"> <!-- parte da apresentação do carrossel -->
            
            <div class="slides">
                <!--Aqui vai ficar os Radio Buttons de passar a imagem-->
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <!--Fim dos botões de passar a imagem-->

                <!--Slide das imagens-->
                <div class="slide first">
                    <img src="imagem/ivarios.jpeg" alt="imagem 1">
                </div>
                <div class="slide">
                    <img src="imagem/cintilantes.jpeg" alt="imagem 2">
                </div>
                <div class="slide">
                    <img src="imagem/fpequeno.jpeg" alt="imagem 3">
                </div>
                <div class="slide">
                    <img src="imagem/transp.jpeg" alt="imagem 4">
                </div>
                <!--Fim da disposição das imagens-->

                <!--Setas de navegação-->
                <div class="navigation-auto">
                    <div class="auto-btn1"></div>
                    <div class="auto-btn2"></div>
                    <div class="auto-btn3"></div>
                    <div class="auto-btn4"></div>
                </div>
            </div>

            <div class="manual-navigation">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
            </div>
        
        </div>
        </div>   
        </div>
        <div class="aboutus">
            <h3>Sobre nós</h3>
            <br>
            <p>A Miçangato Ltda. é uma empresa de artesanato voltada para fabricação de produtos utilizando miçangas para fazer arte. Criamos conexão, estilo e qualidade!!! </p>
        </div>

     
        <div class="cardes_home">
            
            <div class="card_home">
            <a href="./venda/selecao_produtos_front.php" class="link_compra"><img src="./imagem/ainfo.jpeg" ></a>
                <h4>Marca Página Informática</h4>
                <p>Modelos únicos de miçanga</p>
                <a href="./venda/selecao_produtos_front.php" class="link_compra">Comprar</a>
            </div>

            <div class="card_home">
            <a href="./venda/selecao_produtos_front.php" class="link_compra"><img src="./imagem/ppg.jpeg" ></a>
                <h4>Trio Pulseiras PPG</h4>
                <p>Temática de Meninas Superpoderosas</p>
                <a href="./venda/selecao_produtos_front.php" class="link_compra">Comprar</a>
            </div>

            <div class="card_home">
            <a href="./venda/selecao_produtos_front.php" class="link_compra"><img src="./imagem/gheart.jpeg" ></a>
                <h4>Marca Página Heartstopper</h4>
                <p>Modelos únicos de miçanga</p>
                <a href="./venda/selecao_produtos_front.php" class="link_compra" >Comprar</a>
            </div>
        </div>
        
        <div class="video_tudo">
            <div class="texto_engloba">
                <p class="texto_vid">No vídeo ao lado segue uma breve apresentação de quais são os produtos, <span class="cor">as pulseiras e marca páginas</span>, que são principalmente compostos por <span class="cor">miçangas</span> de variados formatos e cores!!</p>
                <p class="texto_vid">Visamos entregar os artesanatos na maior <span class="cor">qualidade e apresentação</span> aos nossos clientes!!</p>
                <img title="Miçanguita" src="./imagem/mascote_home.png" width="90">
            </div>
            <div class="video_engloba">
                    <iframe class="videozinho" width="560" height="315" src="https://www.youtube.com/embed/-V1mu1a8fxk" title="Miçangato" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <!-- <iframe class="videozinho" width="560" height="315" src="https://www.youtube.com/embed/J6QNB6Q-d0E" title="Miçangas" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
            </div>
        </div>
        

    
    </div> <!--mae body-->
    

    <div class="footer">
        
       <div class="lista_devs">
            <ul>
                <li>13 - Gustavo Rocha</li>
                <li>16 - Karine Bertuzzo</li>
                <li>18 - Laura Russo</li>
                <li>30 - Rayssa Mauricio</li>
                <li>32 - Sarah Rezende</li>
            </ul>
       </div>
       <div class="logo_footer"><a href="index.php"><img src="./imagem/logotipo_preta.png" title="Home" width="250"></a></div>
        <div class="icones">
        <?php
                if (isset($_SESSION['usuariologado']))
                {
                    echo "<a href='./login/logoff_back.php' title='Logoff'> <span class='material-symbols-outlined'>logout</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                else
                {
                    echo "<a class='btnTopo' href='./login/login_front.php' title='Login / Cadastro'><i
                    class='fa-solid fa-user'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
            ?>
            <a href="#" title="Voltar ao topo"><span class="material-symbols-outlined">arrow_upward</span>
            </div>
    </div>


    <script src="script.js"></script>

</body>

</html>