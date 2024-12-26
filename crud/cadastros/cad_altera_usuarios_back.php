<?php
    include "../utils/conexao.php"; 

    //dados enviados do script altera_prod_lista.php
    $id_usuario=$_POST['id_usuario'];
    $nome=$_POST['nome'];
    $telefone=$_POST['telefone'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    $cidade=$_POST['cidade'];

    $sql="UPDATE usuario 
            SET nome='$nome',
            telefone='$telefone',
            email='$email',
            senha='$senha',
            cidade='$cidade'
    WHERE id_usuario = $id_usuario;";
    
    $resultado=pg_query($conecta,$sql);
    $qtde=pg_affected_rows($resultado);

    if ($qtde > 0)
        echo "<script type='text/javascript'>alert('Gravação OK !!!')</script>";
    else	
        echo "<script type='text/javascript'>alert('Erro na Gravação !!!')</script>";

    echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=cad_pesq_usuarios_front.php'>";

    // Fechando conexão com o Banco de Dados
    pg_close($conecta);
?>