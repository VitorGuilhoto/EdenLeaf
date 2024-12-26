<?php
    include "../utils/conexao.php"; 
    
    // Recuperação de dados
    $nome=$_POST['nome'];
    $descricao=$_POST['descricao'];
    $preco=$_POST['preco'];
    $codigo_visual=$_POST['codigo_visual'];
    $preco_fab=$_POST['preco_fab'];
    $lucro_num=$_POST['lucro_num'];
    $estoque=$_POST['estoque'];
    $icms=$_POST['icms'];
    $imagem=$_FILES['imagem'];
    $tipo=$_POST['tipo'];

  
    //passa a imagem para o ftp
    move_uploaded_file($imagem['tmp_name'],'/home/projetoscti/www/projetoscti18/extras/crud/imagem_produto/'.$imagem['name']); //nao mudar o caminho do site pq vai ter que mudar tudo

    //passa o link da imagem do ftp para o banco de dados
    $img_link = 'http://projetoscti.com.br/projetoscti18/extras/crud/imagem_produto/'.$imagem['name'];

    // move_uploaded_file($imagem['tmp_name'],'/home/projetoscti/www/projetoscti18/crud_carrinho_0809/crud/imagem_produto/'.$imagem['name']); //nao mudar o caminho do site pq vai ter que mudar tudo

    // //passa o link da imagem do ftp para o banco de dados
    // $img_link = 'http://projetoscti.com.br/projetoscti18/crud_carrinho_0809/crud/imagem_produto/'.$imagem['name'];


    // Inserção
    $sql="INSERT INTO produto(id_produto,nome,descricao,preco,codigo_visual,preco_fab,lucro_num,estoque,icms,imagem)
    VALUES(DEFAULT,'$nome','$descricao','$preco','$codigo_visual','$preco_fab','$lucro_num','$estoque','$icms','$img_link','$tipo');";
    
    // Execução
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);

    if ($qtde > 0)
    {
        echo '<script language="javascript">';
        echo "alert('Produto salvo com sucesso!')";
        echo '</script>';	

        header("Location: cad_novo_produtos_front.php");
    }   
    else
    {
        echo '<script language="javascript">';
        echo "alert('Erro na gravação do produto!')";
        echo '</script>';	
    }

    // Fecha a conexão com o PostgreSQL
    pg_close($conecta);
?>  