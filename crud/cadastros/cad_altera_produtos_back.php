<?php
    include "../utils/conexao.php"; 

    //dados enviados do script altera_prod_lista.php
    $id_produto=$_POST['id_produto'];
    $nome=$_POST['nome'];
    $descricao=$_POST['descricao'];
    $preco=$_POST['preco'];
    $codigo_visual=$_POST['codigo_visual'];
    $preco_fab=$_POST['preco_fab'];
    $lucro_num=$_POST['lucro_num'];
    $estoque=$_POST['estoque'];
    $icms=$_POST['icms'];
    $imagem=$_POST['imagem'];
    $tipo=$_POST['tipo'];

    $sql="UPDATE produto 
            SET nome='$nome',
            descricao='$descricao',
            preco='$preco',
            codigo_visual='$codigo_visual',
            preco_fab='$preco_fab',
            lucro_num='$lucro_num',
            estoque='$estoque',
            icms='$icms',
            imagem='$imagem',
            tipo='$tipo'
    WHERE id_produto = $id_produto;";
    
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);

    if ($qtde > 0)
        echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
    else	
        echo "<script type='text/javascript'>alert('Erro na Gravação !!!')</script>";

    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cad_pesq_produtos_front.php'>";

    // Fechando conexão com o Banco de Dados
    pg_close($conecta);
?>