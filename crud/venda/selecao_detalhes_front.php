<!DOCTYPE html>
<html lang="pt-br">
<?session_start();?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    <title>Detalhes do Produto</title>
</head>

<!-- Recuperando as informações do produto -->

    <body>
        
    <div class=fixada>
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

            <!-- Recuperando as informações do produto -->
            <?php
                $id_produto = $_GET["id"]; //tem que deixar id nao tira 
                include "../cadastros/cad_getinfo_produto_back.php"; 
            ?>

            <div class="detalhe">
                <h1><?php echo $linha['nome']; ?></h1>
                <div class="det_img">
                    <?php echo "<img src=".$linha['imagem']." width='300px'>"; ?>
                </div>
                <br><br>
                <!-- Código do produto:<?php echo $linha['id_produto']; ?>
                <br><br> -->
                Descrição: <?php echo $linha['descricao']; ?>
                <br><br>
                Estoque: <?php echo $linha['estoque']; ?>
                <br><br>
                Preço: R$ <?php echo number_format($linha['preco'], 2, ',', '.'); ?>
                <br><br>
                <div class="det_fim">
                <?php
                    if($linha['estoque'] >0 )
                    {
                ?>
                <a href='carrinho_front.php?acao=add&id_produto=<?php echo $id_produto; ?>' class="submit2">Comprar</a>
                <?php } ?>
                &nbsp;<a href="selecao_produtos_front.php" class="submit2">Voltar</a></div>
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

