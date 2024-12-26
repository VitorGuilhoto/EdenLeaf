<!DOCTYPE html>
<html lang="pt-br">
<?php session_start();?>
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="../css/style.css">
	<link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/carrinho.css">
	<link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
    <title>Carrinho de Compras</title>
</head>

	<!-- Recuperando as informações do produto -->

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


		<!-- <div class="body5">
			<h1 class="indice">Carrinho</h1>    
		</div> -->

		<div class="mae">
			<?php
            	session_start();

				if (isset($_SESSION['usuariologado']))
				{
					$acao = $_GET['acao'] ?? '';
					$id_produto = $_GET['id_produto'] ?? 0;
					$id_usuario = $_SESSION['usuariologado']['id_usuario'];

					if ($acao=='up') {
						if (is_array($_POST['prod']))
							$prods = $_POST['prod'];
						else
							$prods = array();
					}

					include "carrinho_back.php";
				}
				else{
					echo '<script language="javascript">';
					echo "alert('Você deve fazer login para iniciar as compras!')";
					echo '</script>';
					echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=../login/login_front.php'>";
				}
			?>

			
				<div class='table'>
					<div class='row'>
						<div class='cell nome'>
							Nome
						</div>
						<div class='cell preco'>
							Preço
						</div>
						<div class='cell quantidade'>
							Qtde.
						</div>
						<div class='cell subtotal'>
							Subtotal
						</div>
						<div class='cell fim'>
							&nbsp;
						</div>
					</div>

					<form action="?acao=up" method="post">

						<?php
					$total = 0.0;

					if($resultado_lista)
					// Criar linhas com os dados dos produtos
					foreach ($resultado_lista as $linha)
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
								<?php
									if($linha['quantidade']>1){
										echo "<a class='excluir' href='?acao=del1&id_produto=".$id_produto."'>&nbsp;-&nbsp;</a>";
									}
									else{
										echo "&nbsp;&nbsp;&nbsp;";
									}
								?>
								<?php
									echo $linha['quantidade'];
								?>
								<?php
									if($linha['quantidade']<$linha['estoque']){
										echo "<a class='excluir' href='?acao=add1&id_produto=".$id_produto."'>&nbsp;+&nbsp;</a>";
									}
									else{
										echo "&nbsp;&nbsp;&nbsp;";
									}
								?>
							</div>


							<div class='cell subtotal'>
								<?php echo $linha['subtotal']; ?>
							</div>
							<div class='cell fim'>
								<a class='excluir' href='?acao=del&id_produto=<?php echo $id_produto; ?>'>Excluir</a>
							</div>
						</div>
						<?php 
					}  
					echo "<h3>Total da compra: R$ ".number_format($total, 2, ',', '.');".</h3>";
					?>
					<!-- <br><input class="button" type="submit" value="Atualizar Carrinho" />&nbsp;&nbsp; -->
				</div>
			

				<div class="baixo">
					<br><br>
					<a class="btns_fim" href="selecao_produtos_front.php">Continuar Comprando</a>&nbsp;&nbsp;
					<a class="noHover btns_fim" href="">||</a>&nbsp;&nbsp; 
					<a class="btns_fim" href="confirmacao_compra_front.php">Finalizar Compra</a>
				</div>
				</form>
				<div class="imagem_media">
					<img title="Miçanguita" src="../imagem/mascote.png">
					<p>Não deixe para amanhã o que você pode comprar hoje!!</p>
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