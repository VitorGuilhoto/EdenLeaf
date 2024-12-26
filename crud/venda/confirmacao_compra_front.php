<!DOCTYPE html>
<?php session_start(); ?>
<html lang="pt-br">

	<head>
		<meta charset="utf-8" />
		<title>Confirmação Compra</title>
		<link rel="stylesheet" href="../css/tabela-confirma.css">
		<link rel="stylesheet" href="../css/style.css">
		<link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
		<link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
		<script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
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
					
				<a class='btnSelecionado' href='carrinho_front.php' title='Carrinho'><i class='fa-solid fa-cart-shopping'></i></a>&nbsp;
		</div>
	</div>


		<div class="mae">
			<?php
				// session_start();
				$id_usuario = $_SESSION['usuariologado']['id_usuario']; 
				include "confirmacao_compra_back.php";

				?>


			<div class="espaco"><h2>Resumo da compra</h2></div>



			<div class='table'>
				<div class='row'>
					<div class='cell nome'>
						<p>Nome do Produto</p>
					</div>
					<div class='cell preco'>
						<p>Preço</p>
					</div>
					<div class='cell quantidade'>
						<p>Quantidade</p>
					</div>
					<div class='cell subtotal'>
						<p>Subtotal</p>
					</div>
				</div>

				<?php
					$total = 0.0;
						if($resultado_lista)
						// Criar linhas com os dados dos produtos
						foreach ($resultado_lista as $linha)
						{ 
							if ($linha['quantidade'] <= $linha['estoque'])
								{   
							$id_produto = $linha['id_produto'];
							$total += floatval($linha['subtotal']);
					?>
							<div class='row'>
								<div class='cell nome'>
									<?php echo $linha['nome']; ?>
								</div>
								<div class='cell preco'>
									<?php echo $linha['preco']; ?>
								</div>
								<div class='cell quantidade'>
									<?php echo $linha['quantidade']; ?>
								</div>
								<div class='cell subtotal'>
									<?php echo $linha['subtotal']; ?>
								</div>
							</div>		
					
					<?php 
								}
								else  
								{
									echo '<script language="javascript">';
									echo "alert('Não há produtos suficientes, você pediu: ".$linha['quantidade']. ", mas temos disponível no estoque: ".$linha['estoque'].".')";
									echo '</script>';
									echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=selecao_produtos_front.php'>";
									exit;
								}
						}  
						echo "<h3>Total: R$ ".number_format($total, 2, ',', '.');".</h3>";

			?></div>
				<br><br>
				

				<h3>Deseja confirmar?</h3>
				<div class="baixo">
					<a class="btns_fim" href="finalizacao_compra_front.php">Finalizar</a>&nbsp;&nbsp;
					<a class="noHover btns_fim" href="">||</a>&nbsp;&nbsp;
					<a class="btns_fim" href="carrinho_front.php">Cancelar</a>
				</div>
			<!-- <div class="imagem_media">
					<img src="../imagem/mascote.png">
					<p>Apenas um passo para finalizar!!</p>
			</div> -->
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