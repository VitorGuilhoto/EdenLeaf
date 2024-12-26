<!DOCTYPE html>
<html lang="pt-br">
<?php session_start();?>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="./imagem/favicon.ico" type="image/x-icon">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    <title>Finalização</title>
</head>

    <body>
	<div class=fixada>
			<div class="logo"><a href="../index.php"><img src="../imagem/logo_cor.svg" width="90"></a></div>

		<div class="btns">

			<a class="btnTopo" href="../index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btnTopo" href="selecao_produtos_front.php">Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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

        <?php
            // session_start();
            $id_usuario = $_SESSION['usuariologado']['id_usuario'];  

            include "finalizacao_compra_back.php";

            // echo "<h1>Compra Finalizada com Sucesso!!!</h1>";
        ?>
        <div class="body5">
            <div class="card_home">
                <img title="Miçanguita" src="../imagem/mascote.png" >
                <h4>Obrigade pela preferência! </h4>
                <p>A miçangato LTDA agradece a sua escolha</p>
                <br>
                <a href="selecao_produtos_front.php" class="final_login">Voltar ao menu</a>
            </div>
        </div>


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