<!DOCTYPE html>
<html lang="pt-br">
<?php session_start()?>
    <head>
        <meta charset="utf-8" />
        <title>Produtos</title>
        <link rel="stylesheet" href="../css/style.css">
        <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
        <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
        <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    </head>
<body>
<div class="fixada">
            <div class="logo"><a href="../index.php"><img src="../imagem/logo_cor.svg" width="90"></a></div>

            <div class="btns">

                <a class="btnTopo" href="../index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btnSelecionado" href="selecao_produtos_front.php">Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            
                <?php
                    if(isset($_SESSION['isadm']) && $_SESSION['isadm'] == 't')
                    {
                        echo "<a class='btnTopo' href='../cadastros/cad_pesq_produtos_front.php'>Cad. Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<a class='btnTopo' href='../cadastros/cad_pesq_usuarios_front.php'>Cad. Pessoas</a>";
                    }
                    else
                    {
                        echo "<a class='btnTopo' href='../estatistica.php'>Estatisticas</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo "<a class='btnTopo' href='../devs.php'>Devs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    }
                ?>
                
            </div>
                <div class='icones'>
                    <?php
                        if (isset($_SESSION['usuariologado']))
                        {
                            echo "<a href='../login/logoff_back.php' title='Logoff'> <span class='material-symbols-outlined'>logout</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                        else
                        {
                            echo "<a class='btnTopo' href='../login/login_front.php' title='Login'><i
                            class='fa-solid fa-user'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                    ?>
                        
                    <a class='btnTopo' href='carrinho_front.php' title='Carrinho'><i class='fa-solid fa-cart-shopping'></i></a>&nbsp;
            </div>
        </div>



        <!-- <div class="body5">
            <h1 class="indice">Nossos produtos</h1>    
        </div> -->

    <?php 
        include "selecao_produtos_back.php";

        // <!--<img src='img/".$linha['imagem']."' height=250 width=250>-->

        if ($qtde == 0) {
            echo "Não foi encontrado nenhum produto !!!<br><br>";
            return;
        }

        echo "<div class = 'mae_selecao'>";

        // Criar linhas com os dados dos produtos
        foreach ($resultado_lista as $linha)
        {
            $preco= number_format($linha['preco'], 2, ',', '.'); // o id da linha 36 não muda é id msm

            echo "
            <div class='card_selecao'>
                <div>
                    <br>
                    <a href='selecao_detalhes_front.php?id=".$linha['id_produto']."'> 
                        <img src=".$linha['imagem']." width='100px'/>
                    </a>
                </div>

                <div>
                    <div><p>".$linha['nome']."</p></div>
                    <div>R$ ".$preco."</div>";

                    if ($linha['estoque']<=0)
                    {
                        echo "
                        <div><span>Produto esgotado</span></div>";
                    }
                    else
                    {
                        echo "
                        <div>".$linha['estoque']." em estoque</div>";
                        echo "<a class='comprar_selecao' href='carrinho_front.php?acao=add&id_produto=".$linha['id_produto']."'>Comprar</a>";
                    }

                echo "</div><br>";
            echo "</div>";
        }

        echo "</div>";

    ?>
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
        <div class="logo_footer"><a href="../index.php"><img src="../imagem/logotipo_preta.png" title="Home" width="250"></a></div>
         <div class="icones">
         <?php
                if (isset($_SESSION['usuariologado']))
                {
                    echo "<a href='../login/logoff_back.php' title='Logoff'> <span class='material-symbols-outlined'>logout</span></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
                else
                {
                    echo "<a class='btnTopo' href='../login/login_front.php' title='Login'><i
                    class='fa-solid fa-user'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                }
            ?>
             <a href="#" title="Voltar ao topo"><span class="material-symbols-outlined">arrow_upward</span>
             </div>
     </div>
 
</body>
 
</html>