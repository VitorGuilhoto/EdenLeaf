<!DOCTYPE html>
<html lang="pt-br">
<?php session_start();?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    <title>Formulário de Exclusão de Usuários</title>
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
						echo "<a class='btnTopo' href='../login/login_front.php' title='Login'><i
						class='fa-solid fa-user'></i></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
				?>
					
				<a class='btnTopo' href='../venda/carrinho_front.php' title='Carrinho'><i class='fa-solid fa-cart-shopping'></i></a>&nbsp;
		</div>
	</div>

              <?php
                     $id_usuario = $_GET["id_usuario"];
                     include "cad_getinfo_usuario_back.php"; 
              ?>

              <div class="bloco_cad">
                     <form class="meio_cad" action="cad_exclui_usuarios_back.php" method="post">
                     <div class="titulo_cad">
                            <h2>Exclusão de Usuários</h2>
                     </div>
                     <div class="interno_cad">
                            <div class="forma_cad">
                            <label for="id_usuario">Código do Usuário</label>
                            <input type="text" name="id_usuario" id="id_usuario" autocomplete="off"
                                   value="<?php echo $linha['id_usuario']; ?>" readonly>
                            </div>
                            <div class="forma_cad">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" autocomplete="off" value="<?php echo $linha['nome']; ?>">
                            </div>
                            <div class="forma_cad">
                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" autocomplete="off"
                                   value="<?php echo $linha['telefone']; ?>" readonly>
                            </div>
                            <div class="forma_cad">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" autocomplete="off"
                                   value="<?php echo $linha['email']; ?>" readonly>
                            </div>
                            <div class="forma_cad">
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" autocomplete="off"
                                   value="<?php echo $linha['senha']; ?>" readonly>
                            </div>
                            <div class="forma_cad">
                            <label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" autocomplete="off"
                                   value="<?php echo $linha['cidade']; ?>" readonly>
                            </div>
                     </div>
                     <div class="fim_cad">
                            <input type="submit" class="submit" value="Confirmar">
                            <input type="button" class="submit" value="Editar"  onclick="location.href='cad_altera_usuarios_front.php?id_usuario=<?php echo $id_usuario ?>';">
                            <a href='cad_pesq_usuarios_front.php' class="final_login">Voltar</a><br><br>
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