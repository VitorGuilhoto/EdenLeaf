<!DOCTYPE html>
<html lang="pt-br">
<?php session_start();?>
<head>
    <meta charset="utf-8" />
    <title>Exclusão de Produtos</title>
    <link rel="stylesheet" href="../css/tabela-produto.css">
    <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
</head>

<body>
<div class=fixada>
			<div class="logo"><a href="../index.php"><img src="../imagem/logo_cor.svg" width="90"></a></div>

		<div class="btns">

			<a class="btnTopo" href="../index.php">Home</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a class="btnTopo" href="../venda/selecao_produtos_front.php">Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<?php
				if(isset($_SESSION['isadm']) && $_SESSION['isadm'] == 't')
				{
					echo "<a class='btnSelecionado' href='cad_pesq_produtos_front.php'>Cad. Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<a class='btnTopo' href='cad_pesq_usuarios_front.php'>Cad. Pessoas</a>";
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
					
				<a class='btnTopo' href='../venda/carrinho_front.php' title='Carrinho'><i class='fa-solid fa-cart-shopping'></i></a>&nbsp;
		</div>
	</div>

    <?php
       $id_produto = $_GET["id_produto"];
       include "cad_getinfo_produto_back.php"; 
       ?>

    <div class="bloco_cad">
        <form class="meio_cad" action="cad_exclui_produtos_back.php" method="post">
            <div class="titulo_cad">
                <h2>Exclusão de Produtos</h2>
            </div>
            <div class="interno_cad">
               <div class="forma_cad">
                    <label for="id_produto">Código do Produto</label>
                    <input type="text" id="id_produto" name="id_produto" autocomplete="off" value="<?php echo $linha['id_produto']; ?>"
                        readonly>
                </div>
                <div class="forma_cad">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" autocomplete="off" value="<?php echo $linha['nome']; ?>"
                        readonly>
                </div>
                <div class="forma_cad">
                    <label for="descricao">Descricao</label>
                    <input type="text" id="descricao" name="descricao" autocomplete="off"
                        value="<?php echo $linha['descricao']; ?>" readonly>
                </div>
                <div class="forma_cad">
                    <label for="preco">Preco</label>
                    <input type="text" id="preco" name="preco" autocomplete="off" value="<?php echo $linha['preco']; ?>"
                        readonly>
                </div>
                <div class="forma_cad">
                    <label for="estoque">Estoque</label>
                    <input type="text" id="estoque" name="estoque" autocomplete="off"
                        value="<?php echo $linha['estoque']; ?>" readonly>
                </div>
            </div>
            <div class="fim_cad">
                <input type="submit" value="confirmar exclusão" class="submit">
                <input type="button" value="editar" class="submit"
                    onclick="location.href='cad_altera_produtos_front.php?id_produto=<?php echo $id_produto ?>';">
                <a href='cad_pesq_produtos_front.php' class="final_login">voltar</a><br><br>
                <!-- <a href="#" class="recuperar_senha">Esqueceu a senha?</a> -->
            </div>
        </form>
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