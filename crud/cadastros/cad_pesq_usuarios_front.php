<!DOCTYPE html>
<html lang="pt-br">
<?php session_start();?>
<head>
    <meta charset="utf-8" />
    <title>Pesquisa de Usuários</title>
    <link rel="stylesheet" href="../css/tabela-usuario.css">
    <link rel="shortcut icon" href="../imagem/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link  rel="stylesheet"  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://kit.fontawesome.com/cae157d5c6.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- <a href='../index.php' class="novo_us">Home</a> -->

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
    <!-- <div class="body5">
            <h1 class="indice">Cadastro de usuários</h1>    
    </div> -->

    <?php
    include "cad_pesq_usuarios_back.php";

    if ($qtde == 0) {
        echo "Não foi encontrado nenhum usuário!!!<br><br>";
        return;
    }

    // Começar tabela e criar o cabeçalho
    echo "
    <div class='table'>
        <div class='row'>
            <div class='cell cod-usuario'>
                Cód. Usuário
            </div>
            <div class='cell nome'>
                Nome
            </div>
            <div class='cell telefone'>
                Telefone
            </div>
            <div class='cell email'>
                Email
            </div>
            <div class='cell cidade'>
                Cidade
            </div>
        </div>";
        include "../utils/conexao.php";
        // Criar linhas com os dados dos produtos
        foreach ($resultado_lista as $linha)
        {
            echo "
            <div class='row'>
                <div class='cell cod-usuario'>
                    ".$linha['id_usuario']."
                </div>

                <div class='cell nome'>
                    ".$linha['nome']."
                </div>

                <div class='cell telefone'>
                    ".$linha['telefone']."
                </div>

                <div class='cell email'>
                    ".$linha['email']."
                </div>

                <div class='cell cidade'>
                    ".$linha['cidade']."
                </div>
    
                <div class='cell'>
                    <a class='novo_us' href='cad_altera_usuarios_front.php?id_usuario=".$linha['id_usuario']."'> Alterar</a>&nbsp;
                    <a class='novo_us' href='cad_exclui_usuarios_front.php?id_usuario=".$linha['id_usuario']."'> Excluir</a>&nbsp;
                </div>

            </div> "; 
        } 
    // Fechando a tag da tabela
    echo "</div>";
?>

<center><br><br><a href='cad_novo_usuarios_front.php' class="novo_us">+ Novo usuário</a><br><br></center>
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