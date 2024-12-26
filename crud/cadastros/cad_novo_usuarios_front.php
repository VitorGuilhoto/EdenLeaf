<!DOCTYPE html>
<html lang="pt-br">
<?php session_start();?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/senha.css">
    <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="../validadorsenha.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
    <title>Formulário de Cadastro de Usuários - Tabela Usuários CRUD</title>
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
					echo "<a class='btnTopo' href='cad_pesq_produtos_front.php'>Cad. Produtos</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					echo "<a class='btnSelecionado' href='cad_pesq_usuarios_front.php'>Cad. Pessoas</a>";
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
						echo "<a class='btnSelecionado' href='../login/login_front.php' title='Login'><i
						class='fa-solid fa-user'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
				?>
					
				<a class='btnTopo' href='../venda/carrinho_front.php' title='Carrinho'><i class='fa-solid fa-cart-shopping'></i></a>&nbsp;
		</div>
	</div>

    <div class="bloco_cad">
        <form class="meio_cad" action="cad_novo_usuarios_back.php" method="post">
            <div class="titulo_cad">
                <h2>Cadastro de Usuários</h2>
            </div>
            <div class="interno_cad">
                <div class="forma_cad">
                    <label for="nome">Nome*</label>
                    <input type="text" name="nome" id="nome" autocomplete="off" required>
                </div>
                <div class="forma_cad">
                    <label for="telefone">Telefone*</label>
                    <input type="text" name="telefone" id="telefone" autocomplete="off" required>
                </div>
                <div class="forma_cad">
                    <label for="email">Email*</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="forma_cad">
                    <label for="senha">Senha*</label>
                    <input type="password" class="form-control" name="senha" id="senha" autocomplete="off" required><br>
                    <div id="medidor" class="medidor"></div>
                </div>
                <div class="forma_cad">
                    <label for="conf_senha">Confirmar senha*</label>
                    <input type="password" name="conf_senha" id="conf_senha" autocomplete="off" required>
                </div>
                <div class="forma_cad">
                    <label for="cidade">Cidade*</label>
                    <input type="text" name="cidade" id="cidade" autocomplete="off" required>
                </div>
            </div>
            <div class="fim_cad">
                <input type="submit" class="submit" value="Enviar" />
                <a href='cad_pesq_usuarios_front.php' class="final_login">Voltar</a><br><br>
                
                <!-- <a href="#" class="recuperar_senha">Esqueceu a senha?</a> -->
            </div>
            <script src="../mask.js"></script>
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